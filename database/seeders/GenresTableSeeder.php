<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'genre_name' => '寿司'
        ];
        Genre::insert($param);

        $param = [
            'genre_name' => '焼肉'
        ];
        Genre::insert($param);

        $param = [
            'genre_name' => '居酒屋'
        ];
        Genre::insert($param);
        
        $param = [
            'genre_name' => 'イタリアン'
        ];
        Genre::insert($param);

        $param = [
            'genre_name' => 'ラーメン'
        ];
        Genre::insert($param);
    }
}
