<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tamanoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('tamanos')->insert([
        'nombre' => 'Pequeña',
        'precio' => '7000'
      ]);

      DB::table('tamanos')->insert([
        'nombre' => 'Mediana',
        'precio' => '10000'
      ]);

      DB::table('tamanos')->insert([
        'nombre' => 'Grande',
        'precio' => '14000'
      ]);

      DB::table('tamanos')->insert([
        'nombre' => 'Familiar',
        'precio' => '20000'
      ]);
    }
}
