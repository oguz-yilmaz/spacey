<?php

namespace Database\Factories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;


class EmployeeFactory extends Factory
{
    public function definition()
    {
        $provider = Provider::inRandomOrder()->first()->id ?? Provider::factory();

        return [
            'name' => $this->faker->name(),
            'provider_id' => $provider,
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ];
    }
}
