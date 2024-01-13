<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'work_id' => '1',
            'rest_start_time' => '12:00:00',
            'rest_end_time' => '13:00:00',
        ];
        DB::table('rests')->insert($param);
    }
}
