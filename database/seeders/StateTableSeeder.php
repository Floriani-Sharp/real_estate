<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path('/files/states.sql');
        $sql  = file_get_contents($file);
        DB::unprepared($sql);
    }
}
