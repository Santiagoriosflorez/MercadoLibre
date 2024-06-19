<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{

	public function run()
	{

		// Tenis deportivos -------------------------------------------
		$product = new Product([
			'category_id' => 1,
			'name' => 'Tennis Hombre Zapatos Tenis Profesionales Wilson Kaos Comp',
			'description' => 'Las zapatillas de tenis Wilson Kaos Comp son ultraligeras y flexibles1. Cuentan con las tecnologías 2D-Forefoot Support y Dynamic Fit para lograr una mayor capacidad de respuesta, estabilidad lateral y una agradable sensación acolchada en la pista',
			'stock' => 30,
			'worth' => 449.990,
			'url_imagen' => 'https://larrytennis.com/cdn/shop/files/WRS328760_3_Kaos_Comp_3_Mens_Black_Ebony_WilsonRed_300x.png?v=1704761124'
		]);

		$product->save();

		$product = new Product([
			'category_id' => 2,
			'name' => 'Camiseta',
			'description' => 'Camiseta deportiva para jugar futbolt',
			'stock' => 10,
			'worth' => 50.000,
			'url_imagen' => 'https://w7.pngwing.com/pngs/382/93/png-transparent-sports-football-tennis-polo-t-shirt-sporting-goods-text-t-shirt-design-tshirt-sporting-goods-active-shirt-thumbnail.png'
		]);
		$product->save();
	}
}
