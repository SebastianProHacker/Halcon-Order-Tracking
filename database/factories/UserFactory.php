<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // Default password
            'role' => $this->faker->randomElement(['Admin', 'Sales', 'Purchasing', 'Warehouse', 'Route']),
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}

