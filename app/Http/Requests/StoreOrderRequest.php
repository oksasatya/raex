<?php

namespace App\Http\Requests;

use App\Order;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'no_order' => 'required|integer',
            'province_origin' => 'required',
            'city_origin' => 'required',
            'province_destination' => 'required',
            'city_destination' => 'required',
            'weight' => 'required|integer',
            'courier' => 'required',
            'shipping_price' => 'required|integer',
            'total_price' => 'required|integer',
        ];
    }

    public function store()
    {
        $order  = new Order();
        $order->user_id = $this->user_id;
        $order->no_order = $this->no_order;
        $order->province_origin = $this->province_origin;
        $order->city_origin = $this->city_origin;
        $order->province_destination = $this->province_destination;
        $order->city_destination = $this->city_destination;
        $order->weight = $this->weight;
        $order->courier = $this->courier;
        $order->shipping_price = $this->shipping_price;
        $order->total_price = $this->total_price;
        $order->save();
    }
}