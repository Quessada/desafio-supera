<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $types = array(
          array('id' => 1, 'name' => 'Hatch', 'email' => 'teste@teste.com', 'password' => 'aaaaaaaa'),
          array('id' => 2, 'name' => 'Sedan', 'email' => 'teste2@teste.com', 'password' => 'aaaaaaaa'),
        );
        
        DB::table('users')->insert($types);
    }
}
