<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\category\CategoryUpdateRequest;
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


	public function store(CategoryRequest $request)
    {
        // Crear un nuevo producto
        $product = new Product($request->only(['name', 'category_id', 'stock', 'worth']));

        // Guardar la imagen si se proporciona
        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('images/product');
            $product->url_image = $path;
        }

        // Guardar el producto en la base de datos
        $product->save();

        return response()->json(['message' => 'Producto creado con éxito'], 200);
    }

	public function show(Product $product,)
	{
		return response()->json(['product'=> $product],204);
	}

	public function update(CategoryRequest $request, Product $product)
	{
		$product->update($request->only(['name', 'category_id', 'stock', 'worth']));

		if ($request->hasFile('file')) {
			if($product->url_image){
				Storage::delete($product->url_imagen);
			}

			$path = $request->file('file')->store('images/product');
			$product->url_imagen = $path;
			$product->save();
		}
		return response()->json([], 204);
	}

	public function destroy(product $product)
	{
		$product->delete();
		return response()->json([],204);
	}
}
