<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //raja ongkir get data url from env
        $url_cost = 'https://api.rajaongkir.com/starter/cost?key=d8534a79e5aaaf2b50cf311aea7a7c36';
        $json_str = file_get_contents($url_cost);
        $json_obj = json_decode($json_str);
        $costs = [];
        foreach ($json_obj->rajaongkir->results as $cost) {
            foreach ($cost->costs as $c) {
                $costs[] = [
                    'origin' => $cost->origin->city_id,
                    'destination' => $c->destination->city_id,
                    'weight' => $c->weight,
                    'courier' => $c->service,
                    'cost' => $c->cost[0]->value
                ];
            }
        }
        DB::table('costs')->insert($costs);
    }
}