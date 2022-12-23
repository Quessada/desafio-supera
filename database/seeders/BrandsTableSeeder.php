<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->delete();

        $brands = [
            ['id' => 1, 'name' => 'Acura', 'code' => 'ACURA'],
            ['id' => 2, 'name' => 'Alfa Romeo', 'code' => 'ALFA'],
            ['id' => 3, 'name' => 'AMC', 'code' => 'AMC'],
            ['id' => 4, 'name' => 'Aston Martin', 'code' => 'ASTON'],
            ['id' => 5, 'name' => 'Audi', 'code' => 'AUDI'],
            ['id' => 6, 'name' => 'Avanti', 'code' => 'AVANTI'],
            ['id' => 7, 'name' => 'Bentley', 'code' => 'BENTL'],
            ['id' => 8, 'name' => 'BMW', 'code' => 'BMW'],
            ['id' => 9, 'name' => 'Buick', 'code' => 'BUICK'],
            ['id' => 10, 'name' => 'Cadillac', 'code' => 'CAD'],
            ['id' => 11, 'name' => 'Chevrolet', 'code' => 'CHEV'],
            ['id' => 12, 'name' => 'Chrysler', 'code' => 'CHRY'],
            ['id' => 13, 'name' => 'Daewoo', 'code' => 'DAEW'],
            ['id' => 14, 'name' => 'Daihatsu', 'code' => 'DAIHAT'],
            ['id' => 15, 'name' => 'Datsun', 'code' => 'DATSUN'],
            ['id' => 16, 'name' => 'DeLorean', 'code' => 'DELOREAN'],
            ['id' => 17, 'name' => 'Dodge', 'code' => 'DODGE'],
            ['id' => 18, 'name' => 'Eagle', 'code' => 'EAGLE'],
            ['id' => 19, 'name' => 'Ferrari', 'code' => 'FER'],
            ['id' => 20, 'name' => 'FIAT', 'code' => 'FIAT'],
            ['id' => 21, 'name' => 'Fisker', 'code' => 'FISK'],
            ['id' => 22, 'name' => 'Ford', 'code' => 'FORD'],
            ['id' => 23, 'name' => 'Freightliner', 'code' => 'FREIGHT'],
            ['id' => 24, 'name' => 'Geo', 'code' => 'GEO'],
            ['id' => 25, 'name' => 'GMC', 'code' => 'GMC'],
            ['id' => 26, 'name' => 'Honda', 'code' => 'HONDA'],
            ['id' => 27, 'name' => 'HUMMER', 'code' => 'AMGEN'],
            ['id' => 28, 'name' => 'Hyundai', 'code' => 'HYUND'],
            ['id' => 29, 'name' => 'Infiniti', 'code' => 'INFIN'],
            ['id' => 30, 'name' => 'Isuzu', 'code' => 'ISU'],
            ['id' => 31, 'name' => 'Jaguar', 'code' => 'JAG'],
            ['id' => 32, 'name' => 'Jeep', 'code' => 'JEEP'],
            ['id' => 33, 'name' => 'Kia', 'code' => 'KIA'],
            ['id' => 34, 'name' => 'Lamborghini', 'code' => 'LAM'],
            ['id' => 35, 'name' => 'Lancia', 'code' => 'LAN'],
            ['id' => 36, 'name' => 'Land Rover', 'code' => 'ROV'],
            ['id' => 37, 'name' => 'Lexus', 'code' => 'LEXUS'],
            ['id' => 38, 'name' => 'Lincoln', 'code' => 'LINC'],
            ['id' => 39, 'name' => 'Lotus', 'code' => 'LOTUS'],
            ['id' => 40, 'name' => 'Maserati', 'code' => 'MAS'],
            ['id' => 41, 'name' => 'Maybach', 'code' => 'MAYBACH'],
            ['id' => 42, 'name' => 'Mazda', 'code' => 'MAZDA'],
            ['id' => 43, 'name' => 'McLaren', 'code' => 'MCLAREN'],
            ['id' => 44, 'name' => 'Mercedes-Benz', 'code' => 'MB'],
            ['id' => 45, 'name' => 'Mercury', 'code' => 'MERC'],
            ['id' => 46, 'name' => 'Merkur', 'code' => 'MERKUR'],
            ['id' => 47, 'name' => 'MINI', 'code' => 'MINI'],
            ['id' => 48, 'name' => 'Mitsubishi', 'code' => 'MIT'],
            ['id' => 49, 'name' => 'Nissan', 'code' => 'NISSAN'],
            ['id' => 50, 'name' => 'Oldsmobile', 'code' => 'OLDS'],
            ['id' => 51, 'name' => 'Peugeot', 'code' => 'PEUG'],
            ['id' => 52, 'name' => 'Plymouth', 'code' => 'PLYM'],
            ['id' => 53, 'name' => 'Pontiac', 'code' => 'PONT'],
            ['id' => 54, 'name' => 'Porsche', 'code' => 'POR'],
            ['id' => 55, 'name' => 'RAM', 'code' => 'RAM'],
            ['id' => 56, 'name' => 'Renault', 'code' => 'REN'],
            ['id' => 57, 'name' => 'Rolls-Royce', 'code' => 'RR'],
            ['id' => 58, 'name' => 'Saab', 'code' => 'SAAB'],
            ['id' => 59, 'name' => 'Saturn', 'code' => 'SATURN'],
            ['id' => 60, 'name' => 'Scion', 'code' => 'SCION'],
            ['id' => 61, 'name' => 'smart', 'code' => 'SMART'],
            ['id' => 62, 'name' => 'SRT', 'code' => 'SRT'],
            ['id' => 63, 'name' => 'Sterling', 'code' => 'STERL'],
            ['id' => 64, 'name' => 'Subaru', 'code' => 'SUB'],
            ['id' => 65, 'name' => 'Suzuki', 'code' => 'SUZUKI'],
            ['id' => 66, 'name' => 'Tesla', 'code' => 'TESLA'],
            ['id' => 67, 'name' => 'Toyota', 'code' => 'TOYOTA'],
            ['id' => 68, 'name' => 'Triumph', 'code' => 'TRI'],
            ['id' => 69, 'name' => 'Volkswagen', 'code' => 'VOLKS'],
            ['id' => 70, 'name' => 'Volvo', 'code' => 'VOLVO'],
            ['id' => 71, 'name' => 'Yugo', 'code' => 'YUGO'],
        ];

        DB::table('brands')->insert($brands);
    }
}
