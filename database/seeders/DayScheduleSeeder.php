<?php

namespace Database\Seeders;

use App\Models\DaySchedule;
use Illuminate\Database\Seeder;

class DayScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DaySchedule::factory(20)->create();
    }
}
