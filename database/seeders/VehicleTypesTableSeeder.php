<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicle_types')->delete();

        $types = [
            ['id' => 1, 'name' => 'Hatch'],
            ['id' => 2, 'name' => 'Sedan'],
            ['id' => 3, 'name' => 'MPV'],
            ['id' => 4, 'name' => 'SUV'],
            ['id' => 5, 'name' => 'Cross'],
            ['id' => 6, 'name' => 'Coupe'],
            ['id' => 7, 'name' => 'Conversível'],
        ];

        DB::table('vehicle_types')->insert($types);
    }
}
