<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class CategoryController extends Controller
{
	public function index(Request $request)
	{
		$categories = Category::get();
		$product = Product::with('Category')->get();
		return view('category.index', compact('product', 'categories'));
	}
	public function create()
	{
		//
	}
	public function store(CategoryRequest $request)
	{
		// Crear un nuevo producto
		$product = new Product();

		// Asignar directamente los valores del request
		$product->name = $request->input('name');
		$product->category_id = $request->input('category_id');
		$product->stock = $request->input('stock');
		$product->worth = $request->input('worth');

		// Guardar el producto en la base de datos
		$product->save();

		return response()->json(['message' => 'Producto creado con éxito'], 200);
	}

	public function show(Product $product,)
	{
		return response()->json(['product'=>'product'],204);
	}

	public function update(CategoryRequest $request, Product $product)
	{
		$product->update($request->all());
		return response()->json([],204);
	}
	public function destroy(product $product)
	{
		$product->delete();
		return response()->json([],204);
	}
}
