<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Client;
use App\Models\NextOfKins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function dashboard($page=null) {
        $this->checkUserSession();
        $client = Client::query()->find(Session::get('client_id'));
        //dd($client);
        if(!$client->account_setup_complete) {
            $page = 'editprofile';
        }
        else {
            $page = ($page ?? ($_GET['page'] ?? 'index'));
        }
        $pageData = null;
        $pageView = 'client.dashboard';
        $pageTitle = 'Dashboard';
        if ($page !== 'index') {
            if (trim($page) === 'accounts') {
                $pageData = Accounts::all()->where('client_id',Session::get('client_id'));
                //dd($pageData);
                $pageView = 'client.account';
                $pageTitle = 'Accounts';
            }
            elseif (trim($page)==='nextofkins') {
                $pageData = NextOfKins::all()->where('membership_id',Session::get('client_membership_id'));
                //dd($pageData);
                $pageView = 'client.nextofkin';
                $pageTitle = 'New Next Of Kins';
            }
            elseif (trim($page)==='newNextOfKin') {
                $pageData = NextOfKins::all()->where('membership_id',Session::get('client_membership_id'));
                //dd($pageData);
                $pageView = 'client.newNextOfKin';
                $pageTitle = 'New Next Of Kin';
            }
            elseif (trim($page)==='newAccount') {
                $pageData = NextOfKins::all()->where('membership_id',Session::get('client_membership_id'));
                //dd($pageData);
                $pageView = 'client.newAccount';
                $pageTitle = 'New Bank Account';
            }
            elseif (trim($page)==='editprofile') {
                $pageData = NextOfKins::all()->where('membership_id',Session::get('client_membership_id'));
                //dd($pageData);
                $pageView = 'client.editprofile';
                $pageTitle = 'Profile Setup';
            }
        }
        return \view($pageView, [
            'client'=> $client,
            'page_title'=>$pageTitle,
            'page_data'=> $pageData
        ]);
    }

    public function checkSession():void {
        if (Session::get('client_id')) {
            header('Location:'.url('client/dashboard'));
        }
    }

    public function checkUserSession():void {
        if (!Session::get('client_id')) {
            header('Location:'.url('client/login'));
        }
    }

    public function registration() {
        $this->checkSession();
        return view('client.register');
    }

    public function login() {
        $this->checkSession();
        return view('client.login');
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
        $client->last_login_date = date('Y-m-d H:i:s');
        $client->password = $request->input('password');
        do {
            try {
                $client->membership_id = random_int(1000000000, 9999999999);
            } catch (\Exception $e) {
            }
        } while(Client::query()->where('membership_id','=',$client->membership_id)->first() instanceof Client);
        $client->save();
        Session::put('client_id', $client->id??null);
        Session::put('client_membership_id', $client->membership_id??null);
        return redirect()->to('client/dashboard')->with('success','Logged in successfully');
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
            $client = Client::query()->find($client->id??null);
            $client->last_login_date = date('Y-m-d H:i:s');
            $client->save();
            // Authentication passed...
            return redirect()->to('client/dashboard')->with('success','Logged in successfully');
        }
        return redirect()->back()->with('error', 'Oops! The access code you entered is incorrect');
    }

    public function addAccount(Request $request) {
        $validator = $request->validate([
            'client_id'=>'bail|required|exists:clients,id',
            'next_of_kin_id'=>'bail|required|exists:next_of_kins,id',
            'bank_name'=>'bail|required',
            'bank_branch'=>'bail|required',
            'account_name' => 'bail|required',
            'account_number' => 'bail|required|unique:clients,account_number',
        ]);
        Accounts::query()->create($request->all());
        return redirect()->to('client/accounts')->with('success','Account Added ');
    }
}
