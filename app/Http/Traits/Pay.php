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
        $trackId = Hash::make(now());
        $id = '948e6Xe0cZMrGbA';
       
        $encrypted = $this->encryptx(json_encode([
            'amt' => "12.00",
            'action' => "1",
            'password' => 'G6q5!#YqM1e$v1G',
            'id' => $id,
            'currencyCode' => "682",
            'trackId' => $trackId,
            'responseURL' => URL::to('/api/v1/response/success'),
            'errorURL' => URL::to('/api/v1/response/failure')
        ]), '12762428866412762428866412762428');

        $response = Http::acceptJson()
            ->withBody(json_encode([
                'id' => $id,
                'trandata' => $encrypted,
                'responseURL' => URL::to('/api/v1/response/success'),
                'errorURL' => URL::to('/api/v1/response/failure'),
            ]), 'application/json')
            ->post('https://securepayments.alrajhibank.com.sa/pg/payment/hosted.htm');
               
        return $response;
    }
    
   public function decrypt($code, $key)
    {
        $string = hex2bin(trim($code));
        $code = unpack('C*', $string);
        $chars = array_map("chr", $code);
        $code = join($chars);
        $code = base64_encode($code);
        $decrypted = openssl_decrypt($code, "AES-256-CBC", $key, OPENSSL_ZERO_PADDING, "PGKEYENCDECIVSPC");
        $pad = ord($decrypted[strlen($decrypted) - 1]);
        if ($pad > strlen($decrypted)) {
            return false;
        }
        if (strspn($decrypted, chr($pad), strlen($decrypted) - $pad) != $pad) {
            return false;
        }
        return urldecode(substr($decrypted, 0, -1 * $pad));
    }
}
