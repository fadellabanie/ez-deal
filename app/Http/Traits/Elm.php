<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Hash;

trait Elm
{
    private function login()
    {
       $nonuce = rand(1000,9999).'-'.rand(1000,9999);
       $time = time();
       $timeHash = Hash::make(hash('sha256',time()));

        $url = Hash::make('https://iambeta.elm.sa/authservice/authorize?
        scope=openid
        &response_type= id_token
        &response_mode=form_post
        &client_id=16371621
        &redirect_uri=http://ezdeal.net/api/v1/home
        &nonce=b55224f7-e83d-'.$nonuce.'-451d32666e59
        &ui_locales=ar
        &prompt=login
        &max_age='.$time);

        $private_key = base_path().'';
        dd($private_key);
        openssl_sign(
            $url,
            $signature,
            $private_key,
            $algorithm = OPENSSL_ALGO_SHA1
        );
       
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 
        '
        https://iambeta.elm.sa/authservice/authorize?
        scope=openid
        &response_type= id_token
        &response_mode=form_post
        &client_id=16371621
        &redirect_uri=http://ezdeal.net/api/v1/home
        &nonce=b55224f7-e83d-'.$nonuce.'-451d32666e59
        &ui_locales=ar
        &prompt=login
        &max_age='.$time.'
        &state='.$url);
       

dd($ch);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return($result);
    }
}
