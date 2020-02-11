<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KtResident;

class NotifyController extends Controller
{
    //
    public function sendCodes()
    {
        $kt_residents = KtResident::all(['name','code','contact_no'])->sortBy('name');
        //dd($kt_residents);
        foreach ($kt_residents as $kt_resident) {
            //if($kt_resident->contact_no) {
                $message = 'KT Awards night comes off on Saturday, 7th March, 2020. You are entreated to join the award nomination exercise by using the access code ' . $kt_resident->code . ' to nominate members for the various categories.\nThank you.';
                $url = 'https://smartsmsgh.com/api/send';
                $tokenUsername = 'contact';
                $tokenPassword = 'adimcoam';
                $phoneNumber = '233558899735';
                $params = '?tokenUsername=' . $tokenUsername;
                $params .= '&tokenPassword=' . $tokenPassword;
                $params .= '&to=' . urlencode($phoneNumber);
                $params .= '&from=' . urlencode('Orokodo');
                $params .= '&content=' . urlencode($message);
                // Send through Curl
                $ch = curl_init();
                $headers = array('Content-Type: multipart/form-data');
                curl_setopt($ch, CURLOPT_URL, $url . $params);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_TIMEOUT, 3);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $result = curl_exec($ch);
                $error = curl_error($ch);
                echo "Message sent to " . $kt_resident->contact_no . ' ' . $result . '\n';
                curl_close($ch);
                break;
            //}
        }
        /*
        */
    }
}
