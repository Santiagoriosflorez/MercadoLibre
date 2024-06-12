<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\CategorySeeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call([
			UserSeeder::class,
			CategorySeeder::class,
		]);
		User::Factory(10)->create();
		Product::Factory(10)->create();
	}
}
