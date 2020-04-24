<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EdificiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Edificio')->insert([
            'id' => Str::random(5),
            'nombre' => Str::rand(10),
            
        ]);
    }
}
