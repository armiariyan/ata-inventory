<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'photo' => $this->faker->imageUrl(150, 150, 'machines', true),
            'name' => $this->faker->name(),
            'type' => $this->faker->colorName(),
            'notes' => $this->faker ->sentence(15),
        ];
    }
}
