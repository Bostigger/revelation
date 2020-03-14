<?php

namespace App\Http\Controllers;

use App\Models\NextOfKins;
use Illuminate\Http\Request;

class NextOfKinsController extends Controller
{
    public function index() {

    }

    public function create(Request $request) {
        $validator = $request->validate([
            'membership_id'=>'bail|required|exists:clients,membership_id',
            'first_name'=>'bail|required',
            'middle_name'=>'bail|sometimes|nullable',
            'last_name' => 'bail|required',
            'phone_number' => 'bail|required',
            'alternate_phone_number' => 'bail|required',
        ]);
        NextOfKins::query()->create($request->all());
        return redirect()->to('client/nextofkins')->with('success','Next of Kin Added ');
    }
}
