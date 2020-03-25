<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Category;
use App\Models\Client;
use App\Models\KtResident;
use App\Models\NextOfKins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Validator,Redirect,Response;
Use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('dashboard');
        }
        return Redirect::to('login')->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return Redirect::to('dashboard')->withSuccess('Great! You have Successfully loggedin');
    }

    public function dashboard()
    {

        if(Auth::check()){

            $pageData = [];
            $user = User::all();
            $pageData['nextOfKins'] = NextOfKins::all();
            $pageData['accounts'] = Accounts::all();
            $dateTimeToday = date('Y-m-d H:i:s');
            $pageData['recentLoginsCount'] = 0;
            //$pageData['inactiveUsersCount'] = Client::all()->where(DB::raw('DATEDIFF(last_login_date, '.$dateTimeToday.')'),'>',1)->count();
            $pageData['inactiveUsersCount'] = DB::table('clients')->whereRaw('DATEDIFF(CURRENT_TIMESTAMP,last_login_date) >= 28')->get()->count();
            $pageData['activeUsersCount'] = DB::table('clients')->whereRaw('DATEDIFF(CURRENT_TIMESTAMP,last_login_date) < 28')->get()->count();
            $pageData['activeUsers'] = DB::table('clients')->whereRaw('DATEDIFF(CURRENT_TIMESTAMP,last_login_date) < 28')->get();
            $pageData['inactiveUsers'] = DB::table('clients')->whereRaw('DATEDIFF(CURRENT_TIMESTAMP,last_login_date) >= 28')->get();
            $pageData['accounts'] = Accounts::all();
            $pageData['nextOfKinsCount'] = NextOfKins::all()->count();
            $pageData['accountsCount'] = Accounts::all()->count();
            $pageData['clientsCount'] = Client::all()->count();

            return \view('dashboard', [
                'user'=> $user,
                'page_title'=>'Admin Dashboard',
                'page_data'=> $pageData
            ]);
        }
        return Redirect::to('login')->withSuccess('Opps! You do not have access');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
