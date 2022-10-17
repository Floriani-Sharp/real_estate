<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file_path  = public_path('/files/world.sql');
        $sql        = file_get_contents($file_path); 
        DB::unprepared($sql);
    }
}
