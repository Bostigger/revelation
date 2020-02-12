<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category', $categories);
    }

    public function store($request)
    {
        $rules = [
            'name' => 'required',
            'gender' => 'required',
        ];
        $validator = Validator::make(request()->all(), $rules);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }
        (new Category)->save($request);

        return Redirect::home()->with('success', 'Category created!');
    }
}
