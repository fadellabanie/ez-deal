<?php

namespace App\Http\Traits;

trait Sms
{
    public function sendSMS($to, $message)
    {
        
        $fields = 'message='.$message.'&numbers='.$to;
      
        return $this->sendPushSMS($fields);
    }

    private function sendPushSMS($fields)
    {
       
        $headers = array('Content-Type: application/json');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://4jawaly.net/api/sendsms.php?username=ezdeal&password=908070&{$fields}&sender=EZ-Deal&unicode=a&rmduplicated=1&return=string");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        //echo $result;
       
    }
}
