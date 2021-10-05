<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Hash;

trait Elm
{
    private function login()
    {
        $nonce = rand(1000, 9999) . '-' . rand(1000, 9999);
        $time = time();

        $file = base_path() . '/certificate.pfx';  ## File generate from commend documentation
        $pfxContent = file_get_contents($file);       ## Get content for file
        $certPassword = '16371621';
        $key = openssl_pkcs12_read($pfxContent, $certs, $certPassword);

        $url = ('https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type= id_token
        &response_mode=form_post&client_id=16371621&redirect_uri=http://ezdeal.net/api/v1/home
        &nonce=b55224f7-e83d-' . $nonce . '-451d32666e59&ui_locales=ar&prompt=login&max_age=' . $time);


        if (!openssl_pkcs12_read($pfxContent, $x509certdata, $certPassword)) {
            dd("error");
        } else {

            $CertPriv   = array();
            $CertPriv   = openssl_x509_parse(openssl_x509_read($x509certdata['cert']));

            $PrivateKey = $x509certdata['pkey'];
            //  dd($PrivateKey);
            $pub_key = openssl_pkey_get_public($x509certdata['cert']);
            $keyData = openssl_pkey_get_details($pub_key);

            $PublicKey  = $keyData['key'];



            $state = hash_hmac('sha256', $url, $PrivateKey); ## Hash url use privatekey

        }
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
