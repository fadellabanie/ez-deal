<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Hash;

trait Elm
{
    private function login()
    {
        $nonce = rand(1000, 9999) . '-' . rand(1000, 9999);
        $time = time();

        $file = base_path() . '/iamtest.spname.key';  ## File generate from commend documentation
        $privateKey = file_get_contents($file);       ## Get content for file

        $url = ('https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type= id_token
        &response_mode=form_post&client_id=16371621&redirect_uri=http://ezdeal.net/api/v1/home
        &nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time);

        $state = hash_hmac('sha256', $url, 'PKCS12_DhRJLb5utiylvK3'); ## Hash url use privatekey
       
        $ch = curl_init();                              ## Send request in state hash of url
        curl_setopt(
            $ch,
            CURLOPT_URL,
            'https://iambeta.elm.sa/authservice/authorize?
        scope=openid
        &response_type= id_token
        &response_mode=form_post
        &client_id=16371621
        &redirect_uri=http://ezdeal.net/api/v1/home
        &nonce=b55224f7-e83d-' . $nonce . '-451d32666e59
        &ui_locales=ar
        &prompt=login
        &max_age=' . $time . '
        &state=' . $state
        );
      //dd($ch);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
      
        return $result;
    }
}
