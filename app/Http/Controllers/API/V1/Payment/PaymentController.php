<?php

namespace App\Http\Controllers\API\V1\Payment;

use App\Models\User;
use App\Http\Traits\Pay;
use Illuminate\Http\Request;
use App\Models\PaymentReport;
use App\Mail\AdvertisementEmail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    use Pay;

    public function pay(Request $request)
    {
        $response = $this->paymentOnline($request->all());

        if ($response['status'] == 2) {
            return $this->errorStatus($response['errorText'] . '-' . $response['error'] . '-' . $response['status']);
        } else {
            return $this->respondWithItemName('url', "https://securepayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=" . $response['PaymentID']);
        }
    }
    public function success(Request $request)
    {
        $bodyContent = $request->getContent();
        $content =  json_encode($bodyContent);
        $data = explode("&", $content);
        $payment_id = explode("=", $data[0]);
        $trandata_respond = explode("=", $data[3]);

        //dd($data);

        DB::table('payment_reports')->where('payment_id', $payment_id[1])->update([
            'trandata_respond' => $trandata_respond[1]
        ]);

        $decryptResponse = $this->decrypt($trandata_respond[1], '12762428866412762428866412762428');
        $response = json_decode($decryptResponse)[0];
        //  dd($response);
        if (isset($response->errorText)) {
            DB::table('payment_reports')->where('payment_id', $payment_id[1])->update([
                'trandata_respond' => $trandata_respond[1],
                'trans_id' => $response->trackId,
                'payment_id' => $response->paymentId,
                'result' => $response->errorText,
                'payment_timestamp' => $response->paymentTimestamp,
            ]);
            return '!ERROR!-IPAY0100265-PARes status not sucessful..';

        } else {
            DB::table('payment_reports')->where('payment_id', $payment_id[1])->update([
                'trandata_respond' => $trandata_respond[1],
                // 'date' => $response->date,
                // 'trans_id' => $response->transId,
                'trans_id' => $response->trackId,
                'card_type' => $response->cardType,
                'result' => $response->result,
                'ref' => $response->ref,
                'fc_cust_id' => $response->fcCustId,
                'payment_timestamp' => $response->paymentTimestamp,
            ]);
        }

        $paymentReport = PaymentReport::with('package', 'user')->where('payment_id', $payment_id[1])->first();

        $user = User::find($paymentReport->user_id);

        $title = __("Payment");
        $body = __("Payment Successfully");
        $this->send($user->device_token, $title, $body);

        Mail::to($user->email)->send(new AdvertisementEmail($paymentReport));

        return 'Done';
        // return $this->successStatus('Payment Successfully');
    }
    public function failure(Request $request)
    {
        $bodyContent = $request->getContent();
        $content =  json_encode($bodyContent);
        $data = explode("&", $content);
        $trandata_respond = explode("=", $data[3]);

        //dd($trandata_respond);

        DB::table('payment_reports')->where('payment_id', $data[0])->update([
            'trandata_respond' => $trandata_respond[1]
        ]);

        $decryptResponse = $this->decrypt($trandata_respond[1], '12762428866412762428866412762428');
        $response = json_decode($decryptResponse)[0];

        DB::table('payment_reports')->where('payment_id', $data[0])->update([
            'trandata_respond' => $trandata_respond[1],
            'data' => $response->data,
            'transId' => $response->transId,
            'card_type' => $response->cardType,
            'result' => $response->result,
            'ref' => $response->ref,
            'fc_cust_id' => $response->fcCustId,
            'payment_timestamp' => $response->paymentTimestamp,
        ]);

        return 'Payment have error';
    }

    public function checkPay(Request $request)
    {
        $paymentReport = PaymentReport::where('track_id', $request->track_id)->first();
    
        return $this->successStatus($paymentReport->result);
    }
}
