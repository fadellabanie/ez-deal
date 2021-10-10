<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;

trait Elm
{
    private function login()
    {
        $nonce = rand(1000, 9999) . '-' . rand(1000, 9999);
        $time = Carbon::now()->timestamp;

        $file = base_path() . '/certificate.pfx';  
        $pfxContent = file_get_contents($file);    
        $certPassword = '16371621';
        openssl_pkcs12_read($pfxContent, $certs, $certPassword);
        $privateKey = $certs['pkey'];

        $url = 'https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=16371621&redirect_uri=https://ezdeal.net/api/v1/home&nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time;

        $state = hash_hmac('sha256', $url, $privateKey);
          
        $requestUrl = 'https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=16371621&redirect_uri=https://ezdeal.net/api/v1/home&nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time . '&state=' . $state;
            
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
       // curl_setopt( $ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
         $responseData;
    }
}
