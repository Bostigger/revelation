<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ClientController extends Controller
{
    public function dashboard() {
        $this->checkUserSession();
        $client = Client::query()->find(Session::get('client_id'));
        //dd($client);
        return \view('clientdashboard', [
            'client'=> $client,
            'page_title'=>'Dashboard'
        ]);
    }

    public function checkSession() {
        if (Session::get('client_id')) {
            return header('Location:'.url('client/dashboard'));
        }
    }

    public function checkUserSession() {
        if (!Session::get('client_id')) {
            return header('Location:'.url('client/login'));
        }
    }

    public function registration() {
        $this->checkSession();
        return view('clientregister');
    }

    public function login() {
        $this->checkSession();
        return view('clientlogin');
    }

    public function register(Request $request) {
        $validator = $request->validate([
            /*'first_name' => 'bail|required',
            'middle_name' => 'bail|required',
            'last_name' => 'bail|required',*/
            'email'=>'bail|required|email|unique:clients,email',
            'phone_number' => 'bail|required|min:10|unique:clients,phone_number',
            'password' => 'bail|required|min:6',
        ]);
        $client = new Client;
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->password = $request->input('password');
        do {
            try {
                $client->membership_id = random_int(1000000000, 9999999999);
            } catch (\Exception $e) {
            }
        } while(Client::query()->where('membership_id','=',$client->membership_id)->first() instanceof Client);
        $client->save();
    }

    public function postLogin(Request $request) {
        $validator = $request->validate([
            'email'=>'bail|required',
            'password' => 'bail|required',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $client = (Client::query()->where(['email'=>$email, 'password'=>$password])
                ->orWhere(['membership_id'=>$email, 'password'=>$password])->first())??null;
        if($client->id??null) {
            Session::put('client_id', $client->id??null);
            Session::put('client_membership_id', $client->membership_id??null);
            // Authentication passed...
            return redirect()->to('client/dashboard')->with('success','Logged in successfully');
        }
        return redirect()->back()->with('error', 'Oops! The access code you entered is incorrect');
    }
}
