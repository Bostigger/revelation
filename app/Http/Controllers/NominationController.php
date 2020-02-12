<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\KtResident;
use App\Models\Nomination;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class NominationController extends Controller
{
    public function index()
    {
        $categories = Category::all(['id', 'name'])->sortBy('name');
        $kt_residents = KtResident::all(['id','name'])->sortBy('name');
        return view('nomination', [
            'categories'=>$categories,
            'kt_residents'=>$kt_residents
        ]);
    }

    public function nominate(Request $request)
    {
        $validator = $request->validate([
            'category_id' => 'bail|required|integer|unique_with:nominations,code,category_id',
            'code' => 'bail|required|exists:kt_residents,code',
            'nominee_id' => 'bail|required|exists:kt_residents,id',
            'nominee2_id' => 'bail|required_if:category_id,11|required_if:category_id,16|'.(($request->input('nominee2_id'))?'exists:kt_residents,id':''),
        ]);

        $nomination = new Nomination;
        $nomination->code = $code = $request->input('code');
        $nomination->category_id = $request->input('category_id');
        $nomination->nominee_id = $request->input('nominee_id');
        $nomination->nominee2_id = $request->input('nominee2_id');
        if ($nomination->nominee2_id) {
            if ($nomination->nominee_id>$nomination->nominee2_id) {
                $nomination->nominee_id = $nomination->nominee2_id;
                $nomination->nominee2_id = $request->input('nominee_id');
            }
        }
        $nomination->save();

        $alt_nominee = ($request->input('nominee2_name') ? ' and '.$request->input('nominee2_name') : '');

        return Redirect::back()->with('success', 'You have successfully nominated '.$request->input('nominee_name').$alt_nominee.' as ' .$request->input('category'));
    }
}
