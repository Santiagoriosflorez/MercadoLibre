<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function page(Request $request)
	{
		$product = Product::with('Category')->get();
		return view('product.index', compact('product'));
	}

	public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.products', compact('product'));
    }
}
