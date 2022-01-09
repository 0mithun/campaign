<?php

namespace Database\Factories;

use App\Models\CampaignDay;
use App\Models\Template;
use Illuminate\Database\Eloquent\Factories\Factory;

class DayScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'day_id'        =>  CampaignDay::inRandomOrder()->first()->id,
            'template_id'   =>  Template::inRandomOrder()->first()->id,
            'time'          =>  $this->faker->time()
        ];
    }
}
