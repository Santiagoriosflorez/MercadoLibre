<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Trolley;
use Illuminate\Http\Request;

class TrolleyController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$trolley = $user->trolley;
		$cartItems = $trolley ? $trolley->shopping_cart : [];

		return view('cart.index', compact('trolley', 'cartItems'));
	}

	public function create(Request $request)
	{
		$user = $request->user();

		if ($user->trolley) {
			return response()->view('cart.index', ['message' => 'El usuario ya tiene un carrito asociado'], 400);
		}

		$trolley = new Trolley();
		$user->trolley()->save($trolley);

		return response()->json(['message' => 'Carrito creado exitosamente', 'trolley' => $trolley], 200);
	}

	public function addToCart(Request $request, $product_id)
	{
		$user = Auth::user();
		$trolley = $user->trolley;

		if (!$trolley) {
			// Si no hay carrito, crear uno
			$this->create($request);
			$trolley = $user->trolley;
		}

		try {
			// Buscar el producto usando su ID
			$product = Product::findOrFail($product_id);

			// Verificar si el producto ya está en el carrito
			$cartItem = $trolley->shopping_cart()->where('product_id', $product_id)->first();

			if ($cartItem) {
				// Incrementar la cantidad si ya está en el carrito
				$cartItem->stock += 1;
				$cartItem->save();
			} else {
				// Crear un nuevo elemento de carrito si no está en el carrito
				$trolley->shopping_cart()->create([
					'product_id' => $product_id,
					'stock' => 1
				]);
			}

			return redirect(route('cart.index'));
		} catch (\Exception $e) {
			return response()->json(['message' => 'Error al agregar producto al carrito'], 500);
		}
	}

	public function removeFromCart(Request $request, $product_id)
	{
		$user = Auth::user();
		$trolley = $user->trolley;

		if (!$trolley) {
			return response()->json(['message' => 'No hay carrito asociado'], 400);
		}

		try {
			$cartItem = $trolley->shopping_cart()->where('product_id', $product_id)->first();

			if ($cartItem) {
				$cartItem->delete();
				return response()->json(['message' => 'Producto eliminado del carrito'], 200);
			}

			return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
		} catch (\Exception $e) {
			return response()->json(['message' => 'Error al eliminar producto del carrito'], 500);
		}
	}
}
