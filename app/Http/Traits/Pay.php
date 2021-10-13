<?php

namespace App\Http\Traits;


use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

trait Pay
{
    public function encryptx($str, $key)
    {
        $blocksize = openssl_cipher_iv_length("AES-256-CBC");
        $pad = $blocksize - (strlen($str) % $blocksize);
        $str = $str . str_repeat(chr($pad), $pad);
        $encrypted = openssl_encrypt($str, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $encrypted = base64_decode($encrypted);
        $encrypted = unpack('C*', ($encrypted));
        $chars = array_map("chr", $encrypted);
        $bin = join($chars);
        $encrypted = bin2hex($bin);
        $encrypted = urlencode($encrypted);
        return $encrypted;
    }
    public function pay()
    {
        $id = Hash::make(now());
      
        $encrypted = $this->encryptx(json_encode([
            'amt' => "150",
            'action' => "1",
            'password' => 'G6q5!#YqM1e$v1G',
            'id' => $id,
            'currencyCode' => "682",
            'trackId' => "1",
            'responseURL' => URL::to('/api/v1/response/success'),
            'errorURL' => URL::to('/api/v1/response/failure')
        ]), 'test');
       
        $response = Http::acceptJson()
            ->withBody(json_encode([
                'id' => $id,
                'trandata' => [$encrypted],
                'responseURL' => URL::to('/api/v1/response/success'),
                'errorURL' => URL::to('/api/v1/response/failure'),
            ]), 'application/json')
            ->post('https://securepayments.alrajhibank.com.sa/pg/payment/hosted.htm');

        return $response;
    }
}
