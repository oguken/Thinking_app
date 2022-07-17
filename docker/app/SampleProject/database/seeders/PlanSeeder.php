<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'plan' => '勉強する',
            'result'  => '無事に終えれた。',
            'thinking_id'  => '1',
        ]);
    }
}
