<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //raja ongkir get data url from env
        $url_province = 'https://api.rajaongkir.com/starter/province?key=18aba37f5dfeeb41e7a90773b9c1c44b';
        $json_str = file_get_contents($url_province);
        $json_obj = json_decode($json_str);
        $provinces = [];

        foreach ($json_obj->rajaongkir->results as $province) {
            $provinces[] = [
                'id' => $province->province_id,
                'provinces' => $province->province,
            ];
        }

        DB::table('provinces')->insert($provinces);
    }
}