<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KtResident;
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
            $routeName = Route::currentRouteName();
            $categories = Category::all(['id', 'name'])->sortBy('name');
            $kt_residents = KtResident::all(['id','name','room','room_type','contact_no','course_year','code'])->sortBy('name');
            return view('dashboard',[
                'categories'=>$categories,
                'kt_residents'=>$kt_residents,
                'route_name'=>$routeName,
                'page_title'=>'KTH Residents'
            ]);
        }
        return Redirect::to('login')->withSuccess('Opps! You do not have access');
    }

    public function nomination($category_id)
    {

        if(Auth::check()){
            $routeName = Route::currentRouteName();
            $category_name = Category::findOrFail($category_id)->name;
            $categories = Category::all(['id', 'name'])->sortBy('name');

            if ($category_id==11 || $category_id==16) {
                $nominees = DB::table('nominations')
                    ->join('kt_residents', 'kt_residents.id', '=', 'nominations.nominee_id')
                    ->select('nominee_id', 'nominee2_id','kt_residents.name as student_name','room','course_year', DB::raw('count(*) as total_votes'))
                    ->where('category_id',$category_id)
                    ->groupBy('nominee_id','nominee2_id')
                    ->orderByDesc('total_votes')
                    ->get();
            }
            else {
                $nominees = DB::table('nominations')
                    ->join('kt_residents', 'kt_residents.id', '=', 'nominations.nominee_id')
                    ->select('nominee_id', 'kt_residents.name as student_name', 'room', 'course_year', DB::raw('count(*) as total_votes'))
                    ->where('category_id', $category_id)
                    ->groupBy('nominee_id')
                    ->orderByDesc('total_votes')
                    ->get();
            }
            return view('dashboard',[
                'categories'=>$categories,
                'nominees'=>$nominees,
                'route_name'=>$routeName,
                'page_title'=>'Nominations | '.($category_name??null)
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
