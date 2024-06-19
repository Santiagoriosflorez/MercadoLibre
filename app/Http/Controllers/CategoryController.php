<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
	public function index(Request $request)
    {
		$product = Product::with('Category')->get();
		return view('category.index', compact('product'));
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
