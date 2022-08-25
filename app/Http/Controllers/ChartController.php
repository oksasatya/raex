<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;

use App\chart;
use App\Order;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Kodepandai\LaravelRajaOngkir\RajaOngkir;

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
        // $charts = chart::where('user_id', auth()->user()->id)->get();
        $charts = chart::all();
        $total = 0;
        foreach ($charts as $chart) {
            $total += $chart->product->price * $chart->quantity;
        }
        $data = [
            'charts' => $charts,
            'total' => $total,
            'order' => new Order()
        ];
        return view('user.product.cart.index', $data);
    }


    // cek ongkir raja ongkir
    // cek ongkir
    public function cost(Request $request)
    {
        $api_key = env('RAJA_ONGKIR_KEY');
        $curl = curl_init();
        $service = 'REG';
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POSTFIELDS => "origin=" . $request->origin . "&destination=" . $request->destination . "&weight=" . $request->weight . "&courier=" . $request->courier . "&service" . $request->service,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    // destroy
    public function destroy($id)
    {
        $chart = chart::find($id);
        $chart->delete();
        return redirect()->back()->with('success', 'Product berhasil dihapus');
    }

    // destroy all
    public function destroyall()
    {
        $charts = chart::where('user_id', auth()->user()->id)->get();
        foreach ($charts as $chart) {
            $chart->delete();
        }
        return response()->json(['success' => 'Order berhasil disimpan']);
    }
}