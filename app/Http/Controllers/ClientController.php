<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Client;
use App\Models\NextOfKins;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
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

    public function checkSession(){
        if (Session::get('client_id')) {
            //header('Location:'.url('client/dashboard'));
            return Redirect::to(url('client/dashboard'))->withSuccess('Opps! You do not have access');
        }
    }

    public function checkUserSession(){
        if (!Session::get('client_id')) {
            //header('Location:'.url('client/login'));
            return Redirect::to(url('client/login'))->withSuccess('Opps! You do not have access');
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
        return redirect()->back()->with('error', 'Incorrect login details');
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
        return redirect()->to('client/accounts')->with('success','Account Added');
    }

    public function editprofile(Request $request) {
        $validator = $request->validate([
            'first_name' => 'bail|required',
            'middle_name' => 'bail|required',
            'last_name' => 'bail|required',
            'email'=>'bail|required|email',
            'phone_number' => 'bail|required|min:10',
            'alternate_phone_number' => 'bail|required',
            'marital_status'=>'bail|required|in:SINGLE,MARRIED,WIDOWED,DIVORCED',
            'residential_address'=>'bail|sometimes|nullable',
            'occupation'=>'bail|sometimes|nullable',
            'relative_name'=>'bail|sometimes|nullable',
            'relative_phone_number'=>'bail|sometimes|nullable',
            'relation'=>'bail|sometimes|nullable'
        ]);
        $client = Client::query()->find(Session::get('client_id'));
        $client->email = $request->input('email');
        $client->phone_number = $request->input('phone_number');
        $client->alternate_phone_number = $request->input('alternate_phone_number');
        $client->first_name = $request->input('first_name');
        $client->middle_name = $request->input('middle_name');
        $client->last_name = $request->input('last_name');
        $client->marital_status = $request->input('marital_status');
        $client->residential_address = $request->input('residential_address');
        $client->occupation = $request->input('occupation');
        $client->relative_name = $request->input('relative_name');
        $client->relation = $request->input('relation');
        $client->relative_phone_number = $request->input('relative_phone_number');
        $client->relative2_name = $request->input('relative2_name');
        $client->relation2 = $request->input('relation2');
        $client->relative2_phone_number = $request->input('relative2_phone_number');
        $client->account_setup_complete = 1;
        $client->save();
        return redirect()->back()->with('success','Profile updated successfully');
    }
}
