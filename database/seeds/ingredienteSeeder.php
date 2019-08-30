<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ingredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ingredientes')->insert([
        'nombre' => 'Queso'
      ]);

      DB::table('ingredientes')->insert([
        'nombre' => 'Jamon'
      ]);

      DB::table('ingredientes')->insert([
        'nombre' => 'Maiz'
      ]);

      DB::table('ingredientes')->insert([
        'nombre' => 'Pollo'
      ]);

      DB::table('ingredientes')->insert([
        'nombre' => 'Piña'
      ]);
    }
}
