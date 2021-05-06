<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'area_name' => '東京都'
        ];
        Area::insert($param);

        $param = [
            'area_name' => '大阪府'
        ];
        Area::insert($param);

        $param = [
            'area_name' => '福岡県'
        ];
        Area::insert($param);
    }
}
