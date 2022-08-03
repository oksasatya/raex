<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|integer',
            'category' => 'required|string|max:255',
        ];
    }


    public function execute($id)
    {
        $product = Product::findorfail($id);
        $product->name = $this->name;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->category = $this->category;
        // handle image upload
        if ($this->hasFile('image')) {
            $image = $this->file('image');
            $imageName = $product->id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/products'), $imageName);
            $product->image = $imageName;
            $product->save();
        }
        // save product
        $product->save();
    }
}