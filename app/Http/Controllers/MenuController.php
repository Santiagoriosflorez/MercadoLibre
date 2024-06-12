<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
		$products = Product::with('category')->get();
		$categories = Category::all();
		return view('index' , compact('products','categories'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {

    }


    public function show( Request $request,)
    {

    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {

    }
    public function destroy(Request $request)
    {
		//
    }
}
