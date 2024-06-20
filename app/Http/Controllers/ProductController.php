<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function page(Request $request)
	{
		$categoryId = $request->query('category_id');

		// Filtrar los productos según el ID de la categoría
		if ($categoryId) {
			$product = Product::where('category_id', $categoryId)->get();
		} else {
			$product = Product::with('category')->get();
		}

		return view('product.index', compact('product', 'categoryId'));
	}

	public function show($id)
	{
		$product = Product::findOrFail($id);
		return view('product.products', compact('product'));
	}
}
