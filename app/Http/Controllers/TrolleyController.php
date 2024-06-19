<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\shopping_cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Trolley;
use Illuminate\Http\Request;

class TrolleyController extends Controller
{
	public function index()
	{
		$user = Auth::user();
		$trolley = $user->trolley;
		$cartItems = $trolley ? $trolley->shopping_cart()->with('product')->get() : [];
		return view('cart.index', compact('cartItems'));
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

			$cartItem->subtotal= $cartItem->stock * $cartItem->worth;
			$cartItem->save();

			$trolley->total = $trolley->shopping_cart->sum('subtotal');
			$trolley->save();

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

	public function update(Request $request, $id)
	{
		try {
			// Obtener el carrito del usuario autenticado
			$trolley = $request->user()->trolley;

			// Buscar el elemento del carrito específico por su ID
			$cartItem = $trolley->shopping_cart()->where('id', $id)->first();

			if ($cartItem) {
				// Actualizar el stock del elemento del carrito
				$cartItem->stock = $request->input('stock'); // Asumiendo que 'stock' es el campo que quieres actualizar
				$cartItem->save();

				return response()->json(['message' => 'Producto actualizado en el carrito'], 200);
			}

			return response()->json(['message' => 'Producto no encontrado en el carrito'], 404);
		} catch (\Exception $e) {
			return response()->json(['message' => 'Error al actualizar producto en el carrito', 'error' => $e->getMessage()], 500);
		}
	}
}
