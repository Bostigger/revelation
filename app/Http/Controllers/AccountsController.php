<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    public function create(Request $request) {
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

    public function show($id) {

    }
}
