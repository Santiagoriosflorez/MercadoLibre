<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
	protected $model = Product::class;

	public function categoryId($category)
	{
		return $this->state([
			'category_id' => $category->id
		]);
	}

	public function definition()
	{
		return [
			'category_id' => $this->faker->randomElement([1, 2, 3]),
			'name' => $this->faker->sentence(),
			'stock' => $this->faker->randomDigit(),
			'worth' => $this->faker->randomFloat(3,100,1000), // 495.000
			'description' => $this->faker->paragraph()
		];
	}


	public function configure()
	{
		return $this->afterCreating(function (Product $product) {
			$file = new File(['route' => '/storage/images/product/Adidas.png']);
			$product->file()->save($file);
		});
	}
}
