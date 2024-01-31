<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'date' => '2024-01-30',
            'work_start_time' => '09:00:00',
            'work_finish_time' => '18:00:00',
        ];
        DB::table('works')->insert($param);



    }
}
