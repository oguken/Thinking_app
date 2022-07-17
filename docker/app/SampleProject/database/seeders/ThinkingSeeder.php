<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Thinking;

class ThinkingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thinking::create([
            'thinking' => '思っていること',
            'user_id'  => '1',
            'admin_id'  => '1',
            'status_id'  => '1',
        ]);
    }
}
