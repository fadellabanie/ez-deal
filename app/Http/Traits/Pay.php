<?php

namespace App\Http\Traits;

use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToArray;

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

    public function paymentOnline($request)
    {
        $package_id = $request['package_id'];
        unset($request['package_id']);
       // dd($request);
        $id = '948e6Xe0cZMrGbA';
        //dd($request);
        $encrypted = $this->encryptx(json_encode([$request]), '12762428866412762428866412762428');
        $row =  json_encode([[
            'id' => $id,
            'trandata' => $encrypted,
            'responseURL' => URL::to('/api/v1/response/success'),
            'errorURL' => URL::to('/api/v1/response/failure'),
        ]]);
        // dd($row);
        $response = Http::acceptJson()
            ->withBody($row, 'application/json')
            ->post('https://securepayments.alrajhibank.com.sa/pg/payment/hosted.htm');

        if ($response[0]['status'] == 2) {
            return $response[0];
        } else {
            $data['PaymentID'] =  strstr($response[0]['result'], ':', true);
            $data['status'] = strstr($response[0]['result'], ':');

            DB::table('payment_reports')->insert([
                'user_id' => Auth::id() ?? 1,
                'package_id' => Package::whereId($package_id)->pluck('id')->first(),
                'amount' => $request['amt'],
                'track_id' => $request['trackId'],
                'trandata_request' =>  $encrypted,
                'payment_id' =>  $data['PaymentID'],
                'created_at' =>  now(),
            ]);
            return ($data);
        }
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
