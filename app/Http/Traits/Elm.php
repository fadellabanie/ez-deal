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
       
        
      

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://iam.elm.sa/authservice/authorize?
        scope=openid
        &response_type= id_token
        &response_mode=form_post
        &client_id=16371621
        &redirect_uri=http://ezdeal.net 
        &nonce=b55224f7-e83d-4250-aa4a-'.Hash::make(time()).'
        &ui_locales=ar
        &prompt=login
        &max_age='.time().'
        &state='.Hash::make(time())
    );
   
        curl_setopt($ch, CURLOPT_POST, true);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        
        return($result);
    }
}
