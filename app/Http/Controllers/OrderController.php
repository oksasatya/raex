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
use App\UserPayemnt;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PDO;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(8);
        $total = 0;
        foreach ($orders as $order) {
            $total +=  $order->total_price;
        }
        return view('user.product.order.index', compact('orders', 'total'));
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
    public function store(StoreOrderRequest $storeOrderRequest)
    {
        $storeOrderRequest->store();
        return response()->json([
            'message' => 'success',
        ]);
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


    public function uploadImage(Request $request)
    {
        $user_payment = new UserPayemnt();
        $user_payment->order_id = $request->order_id;
        $user_payment->user_id = Auth::user()->id;
        $user_payment->image = $request->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $user_payment->order_id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image/payment') . $imageName);
            $user_payment->image = $imageName;
            $user_payment->save();
        }

        return redirect()->route('order.index')->with('success', 'Terimakasih Telah Melakukan Pembayaran, Kami Akan Mengecek Pembayaran Anda maksimal 1x24 jam');
    }
}