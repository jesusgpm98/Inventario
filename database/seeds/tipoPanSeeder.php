<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class tipoPanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos_panes')->insert([
          'nombre' => 'Tradicional',
          'precio' => '1000'
        ]);

        DB::table('tipos_panes')->insert([
          'nombre' => 'Romana',
          'precio' => '2000'
        ]);

        DB::table('tipos_panes')->insert([
          'nombre' => 'Chicago',
          'precio' => '3000'
        ]);
    }
}
