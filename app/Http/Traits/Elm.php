<?php

namespace App\Http\Traits;

use Log;
use App\Models\User;
use App\Models\NotificationUser;
use Illuminate\Support\Facades\Hash;

trait Elm
{
  
    private function login($fields)
    {
        $data = json_encode($fields);

        $headers = array('Content-Type: application/json');
      

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://iam.elm.sa/authservice/authorize?
        scope=YCGSmmnz7eWXV9dK
        &response_type= id_token
        &response_mode=form_post
        &client_id=16371621
        &redirect_uri=http://ezdeal.net 
        &nonce='.Hash::make(time()).'
        &ui_locales=ar
        &prompt=login
        &max_age='.time().'
        &state=done'
    );
   
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        curl_close($ch);

        
        return($result);
    }
}
