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
            'name'       =>  $this->faker->sentence(),
            'start_date'          => $this->faker->date(),
            'how_many_days'         => $this->faker->numberBetween(1,5),
            'emails'        =>  join(',', $emails)
        ];
    }
}
