<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
    {
        return [
            'invoice_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'customer_name' => $this->faker->company(),
            'customer_number' => $this->faker->unique()->numberBetween(1000, 9999),
            'fiscal_data' => $this->faker->address(),
            'order_date' => $this->faker->dateTimeThisYear(),
            'delivery_address' => $this->faker->address(),
            'notes' => $this->faker->sentence(),
            'status_id' => OrderStatus::inRandomOrder()->first()->id, // Random status
            'user_id' => User::inRandomOrder()->first()->id, // Random user (salesperson)
        ];
    }
}

