<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KtResident;
use App\Models\Nominee;
use App\Models\Voting;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class VotingController extends Controller
{
    public function index() {
        $kth_id = Session::get('kth_id');
        $categories = DB::table('categories')
            ->leftJoin('votings', function($join) use ($kth_id) {
                $join->on('votings.category_id', '=', 'categories.id');
                $join->on(function($query) use ($kth_id) {
                    $query->on('votings.kt_resident_id', '=', DB::raw("'".$kth_id."'"));
                });
            })
            ->leftJoin('nominees','votings.nominee_id','=','nominees.id')
            ->select('categories.id as id', 'categories.name','votings.kt_resident_id','votings.nominee_id','nominees.name as nominee_name')
            ->orderBy('name')
            ->get();
        //$categories = Category::all()->sortBy('name');
        return view('votingindex', [
            'categories'=>$categories,
        ]);
    }

    public function byCategory($category_id) {
        $category = Category::query()->findOrFail($category_id);
        $nominees = Nominee::query()->where('category_id',$category_id)->get();
        //dd($nominees);
        return view('voting', [
            'imagePath'=>public_path().'/images/nominees/'.strtoupper($category->name),
            'imageUrl'=>url('images/nominees/'.strtoupper($category->name)),
            'category'=>$category,
            'nominees'=>$nominees
        ]);
    }

    public function login(Request $request) {
        request()->validate([
            'code' => 'required',
        ]);

        $user = KtResident::query()->where('code',$request->input('code'))->first()->id??null;
        if($user) {
            Session::put('kth_code', $request->input('code'));
            Session::put('kth_id', $user);
            // Authentication passed...
            return redirect()->back()->with('success','Logged in successfully');
        }
        return redirect()->back()->with('error', 'Oops! The access code you entered is incorrect');
    }

    public function logout() {
        Session::pull('kth_id');
        return redirect()->intended('vote');
    }

    public function vote(Request $request)
    {
        $customMessages = [
            'category_id.unique_with' => 'You have already voted for a candidate in this category.',
            'nominee_id.required'  => 'Please select your preferred candidate',
        ];
        $validator = $request->validate([
            'category_id' => 'bail|required|integer|unique_with:votings,kt_resident_id,category_id',
            'kt_resident_id' => 'bail|required|exists:kt_residents,id',
            'nominee_id' => 'bail|required|exists:nominees,id',
        ], $customMessages);

        $voting = new Voting;
        $voting->kt_resident_id = $kt_resident_id = $request->input('kt_resident_id');
        $voting->category_id = $request->input('category_id');
        $voting->nominee_id = $request->input('nominee_id');
        $voting->save();
        $nominee = Nominee::query()->find($request->input('nominee_id'));
        $nominee->votes++;
        $nominee->save();

        return redirect()->intended('vote');
    }
}
