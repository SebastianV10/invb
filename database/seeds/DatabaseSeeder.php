<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EdificiosTableSeeder::class);
        $this->call(SalonTableSeeder::class);
        $this->call(tipoEquipoTableSeeder::class);
        $this->call(tipoMarcaTableSeeder::class);
        
    }
}
