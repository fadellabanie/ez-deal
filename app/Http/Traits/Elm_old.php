<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

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
        //step 1  rsa with sha256
        openssl_sign($state, $code, $privateKey, 'sha256');
        //step 2  encode base_64  from step 1 
        $state = base64_encode($code);
        //step 3  encode url  from step 2 
        $requestUrl = 'https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=16371621&redirect_uri=https://ezdeal.net/api/v1/home&nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time . '&state=' . $state;
        // echo('<br/>');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $requestUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        //curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        //curl_setopt($ch, CURLOPT_PORT, 81);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        $responseData = curl_exec($ch);

        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }
}
