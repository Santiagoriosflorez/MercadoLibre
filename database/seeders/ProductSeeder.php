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

// SQL

/* -------------------------------------------------   Calzado Deportivo  ----------------------------------------------------------------
INSERT INTO products (category_id, name, description, stock, worth,url_imagen) VALUES
(1, 'Zapatillas Running Hombre Adidas EnergyFalcon', 'Diseñadas para corredores, las Adidas EnergyFalcon ofrecen comodidad y soporte con su amortiguación Cloudfoam y suela Adiwear para durabilidad.', 15, 299.990,'/storage/images/product/Adidas.png'),
(1, 'Zapatillas Baloncesto Hombre Under Armour Curry Flow 8', 'Las Under Armour Curry Flow 8 ofrecen un agarre inigualable y una amortiguación UA Flow que elimina la necesidad de una suela de goma tradicional.', 15, 599.990,'https://underarmourcol.vtexassets.com/arquivos/ids/552725/3027416-100_022_1.png?v=638338634584930000'),
(1, 'Tenis Mujer Puma Flyer Runner', 'Los tenis Puma Flyer Runner para mujer son versátiles y cómodos, con una entresuela de espuma suave y un diseño elegante para el uso diario o el entrenamiento.', 30, 249.990,'/storage/images/product/Puma.png'),
(1, 'Zapatillas Trail Hombre Salomon Speedcross 4', 'Las Salomon Speedcross 4 son perfectas para terrenos difíciles, con un agarre agresivo y protección contra el barro y la humedad para trail running.', 18, 479.990,'/storage/images/product/Salomon.png'),
(1, 'Tenis Niños Lotto Megalight', 'Los tenis Megalight de Lotto para niños son ligeros y cómodos, ideales para actividades escolares y juegos en el parque con su diseño duradero.', 35, 199.990,'/storage/images/product/Lotto.png'),
(1, 'Zapatillas Ciclismo Hombre Spiuk Rodda Road', 'Las zapatillas Spiuk Rodda Road están diseñadas para ciclistas, con un ajuste preciso y una transmisión eficiente de la potencia al pedal.', 12, 349.990,'/storage/images/product/Zapatillas.png'),
(1, 'Tenis Casual Mujer Skechers Summits', 'Los Skechers Summits son tenis casuales para mujer que ofrecen confort todo el día con su plantilla Memory Foam y diseño flexible.', 40, 229.990,'/storage/images/product/Under.png'),
(1, 'Zapatillas Fitness Hombre Reebok Nano X', 'Los Reebok Nano X son ideales para el fitness, con una estabilidad robusta y flexibilidad para movimientos multidireccionales durante los entrenamientos.', 22, 399.990,'/storage/images/product/Reebok.png'),
(1, 'Botas Trekking Mujer Columbia Newton Ridge', 'Las botas de trekking Columbia Newton Ridge para mujer son resistentes e impermeables, diseñadas para senderismo con soporte y tracción avanzados.', 18, 499990,'/storage/images/product/Botas.png');
 */

 /*  ------------------------------------   Ropa deportiva  ------------------------------
INSERT INTO products (category_id, name, description, stock, worth, url_imagen) VALUES
(2, 'Jogger Deportivo GWF11001-1 LUX', 'Jogger deportivo para hombres, cómodo y con estilo.', 25, 119.800, 'https://colombiangymwear.com/jogger-gwf11001-1'),
(2, 'Buzo Deportivo GWF11325UQ-2 LUX', 'Buzo deportivo para hombres, ideal para entrenamientos o uso casual.', 20, 92.800, 'https://colombiangymwear.com/buzo-gwf11325uq-2'),
(2, 'Leggings Sin Costuras Azul', 'Leggings sin costuras en color azul, cómodos y elásticos.', 20, 112.800, 'https://colombiangymwear.com/leggings-800001az'),
(2, 'Leggings Deportivo GWF10726UQ-9 LUX', 'Leggings deportivos para hombres, con ajuste perfecto y comodidad.', 22, 122.800, 'https://colombiangymwear.com/leggings-gwf10726uq-9'),
(2, 'Short Seamless GF09Q124-S4LIL DFO', 'Short deportivo sin costuras en color lila, para entrenamientos intensos.', 30, 92.800, 'https://colombiangymwear.com/short-seamless-gf09q124-s4lil');

 */