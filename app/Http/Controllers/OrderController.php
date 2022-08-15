<?php

namespace App\Http\Controllers;

use App\City;
use App\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Cities;
use App\Http\Resources\Provinces;
use App\Product;
use App\Province;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            // select city and province
            'cities' => City::all(),
            'provinces' => Province::all(),
        ];
        return view('user.product.checkout.checkout', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->quantity = $request->quantity;
        $order->total_price = $request->total_price;
        $order->payment_status = $request->payment_status;
        $order->status = $request->status;
        return redirect()->route('user.product.checkout.checkout')->with('success', 'Product berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function provinces()
    {
        return new Provinces(Province::all());
    }

    public function cities()
    {
        return new Cities(City::all());
    }

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