<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotifyController extends Controller
{
    //
    public function index(Request $request)
    {
        $message = $request->input('message') ?? 'You have not logged into the app for a while now. You are being reminded to log in at least once every month. Thank you.';
        $phoneNumber = $request->input('phone_number');
        $phoneNumber = (strlen($phoneNumber)===9 || strlen($phoneNumber)===10) ? '233'.ltrim($phoneNumber, 0) : ltrim($phoneNumber, '+');
        if($message && $phoneNumber) {
            $url = 'http://api.smsonlinegh.com/sendsms.php';
            $params = '?user='.urlencode('tricksteck@gmail.com');
            $params .= '&password=REVELATION';
            $params .= '&destination=' . urlencode($phoneNumber);
            $params .= '&sender=' . urlencode('Santop');
            $params .= '&type=0';
            $params .= '&message=' . urlencode($message);
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
            if ($error) {
                echo $error;
                exit;
            }
            echo 'Message sent to '.$phoneNumber.' successfully\n';
            //echo 'Message sent to ' . $phoneNumber.' with respose: '.$result.'<br/>';
            curl_close($ch);
        }
        else {
            echo 'The phone number is required';
        }

    }

    public function notifyAll(Request $request){
      $inactiveUsers= DB::table('clients')->whereRaw('DATEDIFF(CURRENT_TIMESTAMP,last_login_date) >= 28')->get();
      foreach($inactiveUsers as $user){

        $message = $request->input('message') ?? 'You have not logged into the app for a while now. You are being reminded to log in at least once every week. Thank you.';
        $phoneNumber = $user->phone_number;
        $phoneNumber = (strlen($phoneNumber)===9 || strlen($phoneNumber)===10) ? '233'.ltrim($phoneNumber, 0) : ltrim($phoneNumber, '+');
        if($message && $phoneNumber) {
            $url = 'http://api.smsonlinegh.com/sendsms.php';
            $params = '?user='.urlencode('tricksteck@gmail.com');
            $params .= '&password=REVELATION';
            $params .= '&destination=' . urlencode($phoneNumber);
            $params .= '&sender=' . urlencode('Santop');
            $params .= '&type=0';
            $params .= '&message=' . urlencode($message);
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
            if ($error) {
                echo $error;
                exit;
            }
            echo 'Message sent to '.$phoneNumber.' successfully';
            //echo 'Message sent to ' . $phoneNumber.' with respose: '.$result.'<br/>';
            curl_close($ch);
        }
        else {
            echo 'The phone number is required';
        }
      }

    }
}
