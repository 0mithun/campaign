<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TemplateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'   => User::inRandomOrder()->first()->id,
            'subject'   =>  $this->faker->sentence(3),
            'body'      =>  $this->faker->text()
        ];
    }
}
