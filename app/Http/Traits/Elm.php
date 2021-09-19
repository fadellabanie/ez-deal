<?php

namespace App\Http\Traits;

use App\Models\User;
use App\Models\NotificationUser;
use Log;

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
        &nonce=b55224f7-e83d-4250-aa4a-451d32666e59
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
