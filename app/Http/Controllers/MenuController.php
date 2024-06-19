<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;


class MenuController extends Controller
{
	public function index(Request $request)
	{
		$category_ids = [1, 2];

		$categories = Category::whereIn('id', $category_ids)->get();

		$categories->each(function ($category) {
			$category->products = $category->products()->take(4)->get();
		});
		return view('index', compact('categories'));
	}
	public function create()
	{
		//
	}
	public function store(Request $request)
	{
		//
	}

	public function show(Request $request,)
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
