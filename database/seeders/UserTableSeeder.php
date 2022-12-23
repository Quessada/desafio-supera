<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $types = [
            ['id' => 1, 'name' => 'Administrador', 'email' => 'admin@admin.com', 'password' => Hash::make('admin1234')],
        ];

        DB::table('users')->insert($types);
    }
}
