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
        $redirect_uri = "http://ezdeal.net/api/v1/home";
        $nonce = uniqid();
        $ui_locales = "ar";

        $content = "https://iambeta.elm.sa/authservice/authorize?scope=openid&response_type=id_token&response_mode=form_post&client_id=" . $client_id . "&redirect_uri=" . $redirect_uri . "&nonce=" . $nonce . "&ui_locales=" . $ui_locales . "&prompt=login&max_age=" . $maxAge;

        $path = file_get_contents(base_path() . '/certificate.pfx');

        $certPassword = '16371621';
        openssl_pkcs12_read($path, $certs, $certPassword);
        $privateKey = openssl_pkey_get_private($certs["pkey"]);
        openssl_sign($content, $state, openssl_pkey_get_private($privateKey), 'RSA-SHA256');
        $newState = base64_encode($state);
        $savedState = base64_encode(hash('sha256', $newState, true));

        return response()->json([
            'state' => $savedState,
             "url" => $content . "&state=" . urlencode($newState)
        ]);
    }
}
