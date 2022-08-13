<?php

namespace App\Http\Requests;

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
            // user_id
            'user_id' => 'required|exists:users,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|integer',
            'payment_status' => 'required|string',
        ];
    }
}