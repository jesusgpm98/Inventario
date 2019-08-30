<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'name' => 'Jesus',
        'userName' => 'sadmin',
        'email' => 'jesusgabriel_98@hotmail.com',
        'password' => Hash::make('sadmin')
      ]);
    }
}
