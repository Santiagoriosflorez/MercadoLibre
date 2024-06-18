<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => fake()->name(),
			'last_name'=> fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
        ];
    }

	public function configure()
	{
		return $this->afterCreating(function (User $user) {
			$user->assignRole('user');
		});
	}
}
