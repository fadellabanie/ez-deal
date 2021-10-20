<?php

namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Traits\Pay;
use Illuminate\Http\Request;
use App\Models\PaymentReport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        $payment = PaymentReport::where('payment_id', $data[0])->select('user_id')->first();

        $user = User::find($payment->user_id);

        $title = __("Payment");
        $body = __("Payment Successfully");
        $this->send($user->device_token, $title, $body);
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
}
