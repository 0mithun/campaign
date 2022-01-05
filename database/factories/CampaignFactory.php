<?php

namespace Database\Factories;

use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $emails = [];
        for($i=0; $i<mt_rand(1, 5); $i++){
            $emails[] = $this->faker->safeEmail();
        }

        return [
            'user_id'       =>  User::inRandomOrder()->first()->id,
            'template_id'   =>  Template::inRandomOrder()->first()->id,
            'date'          => $this->faker->date(),
            'times'         => $this->faker->numberBetween(1,5),
            'emails'        =>  join(',', $emails)
        ];
    }
}
