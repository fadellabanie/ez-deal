<?php

namespace App\Http\Controllers\API\V1\Payment;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Traits\Pay;

class PaymentController extends Controller
{
    use Pay;
  
    public function pay(Request $request)
    {
        $response = $this->pay($request);
    
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
    } 
    public function failure(Request $request)
    {
        $bodyContent = $request->json();
        $content =  json_encode($bodyContent);
        dd($bodyContent);
    }
}
