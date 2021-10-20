<?php

namespace App\Http\Controllers\API\V1\Payment;

use App\Http\Traits\Pay;
use Illuminate\Http\Request;
use App\Models\PaymentReport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    use Pay;
  
    public function pay(Request $request)
    {
        $response = $this->paymentOnline($request->all());
    
        if($response['status'] == 2){ 
            return $this->errorStatus($response['errorText'].'-'.$response['error'].'-'.$response['status']);
        }else{
            return $this->respondWithItemName('url',"https://securepayments.alrajhibank.com.sa/pg/paymentpage.htm?PaymentID=".$response['PaymentID']);
        }
    }
    public function success(Request $request)
    {
        $bodyContent = $request->json();
        $content =  json_encode($bodyContent);
        dd($bodyContent);
      // PaymentReport::
     //  $this->sendNotificationToAllUser();
       return $this->successStatus('Payment Successfully');
    } 
    public function failure(Request $request)
    {
        $bodyContent = $request->json();
        $content =  json_encode($bodyContent);
       // dd($bodyContent);
       return $this->errorStatus('Payment have error');

    }
}
