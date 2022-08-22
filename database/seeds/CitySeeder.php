<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //raja ongkir get data url from env
        $url_city = 'https://api.rajaongkir.com/starter/city?key=18aba37f5dfeeb41e7a90773b9c1c44b';
        $json_str = file_get_contents($url_city);
        $json_obj = json_decode($json_str);
        $cities = [];

        foreach ($json_obj->rajaongkir->results as $city) {
            $cities[] = [
                'id' => $city->city_id,
                'province_id' => $city->province_id,
                'city' => $city->city_name,
                'type' => $city->type,
                'postal_code' => $city->postal_code
            ];
        }

        DB::table('cities')->insert($cities);
    }
}