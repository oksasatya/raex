<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChartController extends Controller
{
    public function addtochart(Request $request)
    {
        $chart = new chart();
        $chart->product_id = $request->product_id;
        $chart->user_id = auth()->user()->id;
        $chart->quantity = $request->quantity;
        $chart->save();
        return redirect()->back()->with('success', 'Product berhasil ditambahkan');
    }

    public function index()
    {
        $charts = chart::where('user_id', auth()->user()->id)->get();
        $total = 0;
        foreach ($charts as $chart) {
            $total += $chart->product->price * $chart->quantity;
        }
        $data = [
            'charts' => $charts,
            'total' => $total,
        ];
        return view('user.product.cart.index', $data);
    }


    // cek ongkir raja ongkir
    // cek ongkir
    public function cost(Request $request)
    {
        $origin = $request->origin;
        $destination = $request->destination;
        $weight = $request->weight;
        $courier = $request->courier;
        // server key from env
        $server_key = env('RAJA_ONGKIR_SERVER_KEY');
        $url = 'http://api.rajaongkir.com/starter/cost';
        $data = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier,
            'server_key' => $server_key,
        ];
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, [
            'form_params' => $data,
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }
}