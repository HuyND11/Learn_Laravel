<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'description' => $this->faker->name(),
            'model' => $this->faker->name(),
            'produced_on' => $this->faker->date('Y_m_d'),
            'image' => ("images/car_".rand(1,4).".jpg"),
            'manufacturer_id'=> (rand(1,10)),
        ];
    }
}
