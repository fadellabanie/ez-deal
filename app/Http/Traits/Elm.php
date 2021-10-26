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

        $currenTime = new \DateTime("now", new \DateTimeZone("Asia/Riyadh"));
        $maxAge = $currenTime->getTimestamp();
        $client_id = "16371621";
        $redirect_uri = "https://ezdeal.net/api/v1/home";
        $nonce = uniqid();
        $ui_locales = "ar";

        $content = "https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&nonce=" . $nonce . "&ui_locales=" . $ui_locales . "&prompt=login&max_age=" . $maxAge;
        $path = file_get_contents(base_path() . '/certificate.pfx');
        $certPassword = '16371621';

        openssl_pkcs12_read($path, $certs, $certPassword);


        $privateKey = openssl_pkey_get_private($certs["pkey"]);
        openssl_sign($content, $state, openssl_pkey_get_private($privateKey), 'RSA-SHA256');

        $newState = base64_encode($state);
        //save state to use later
        $savedState=base64_encode(hash('sha256',$newState,true));
        //  $user=  Auth::user();
        //$this->repo->createActivation($user,$savedState);
        //return the url
       // return response()->json(['state' => $savedState, "url" => $content . "&state=" . //urlencode($newState)]);
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $content);
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

        ##############################################################
        /*
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
           dd( $code);
           $state = base64_encode($code);
           //step 3  encode url  from step 2 
        $requestUrl = 'https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=16371621&redirect_uri=https://ezdeal.net/api/v1/home&nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time . '&state=' . $state;
        dd($requestUrl);
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
        */
    }
}
