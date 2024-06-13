<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    public function index(Request $request)
    {
		$category_id = [1, 2, 3];

		$products= Product::with('category')->whereHas('category', function ($query) use ($category_id) {
			$query->where('id', $category_id);
		})->get();

		$categories= Category::all();

		return view ('index', compact('products','categories'));
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
