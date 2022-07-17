<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'status_name' => '実行中',
        ]);

        Status::create([
            'status_name' => '完了',
        ]);

        Status::create([
            'status_name' => '未完了',
        ]);
    }
}
