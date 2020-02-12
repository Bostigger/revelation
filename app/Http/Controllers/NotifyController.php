<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KtResident;

class NotifyController extends Controller
{
    //
    public function sendCodes()
    {
        $kt_residents = KtResident::all(['id','name','code','contact_no'])->sortBy('name');
        //dd($kt_residents);
        $sendNow = false;
        /*
        foreach ($kt_residents as $kt_resident) {
            if($kt_resident->contact_no && strlen($kt_resident->contact_no)===9 && $sendNow===true) {
                $url = 'http://api.smsonlinegh.com/sendsms.php';
                $params = '?user=clementsam75%40gmail.com';
                $params .= '&password=clems%26norb1';
                $params .= '&destination=' . urlencode('233'.$kt_resident->contact_no);
                $params .= '&sender=' . urlencode('KTH-JCR');
                $params .= '&type=0';
                $params .= '&message=' . urlencode('KT Awards night comes off on Saturday, 7th March, 2020. You are entreated to join the award nomination exercise by using the access code ' . $kt_resident->code . ' to nominate members for the various categories. Visit http://bit.ly/umat-kth-awards to vote now. Thank you.');
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
                echo 'Message sent to ' . $kt_resident->name.' with respose: '.$result.'<br/>';
                curl_close($ch);
            }
            if ($kt_resident->id==322) {
                $sendNow = true;
            }
        }
        */
    }
}
