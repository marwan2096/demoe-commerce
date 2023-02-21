<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
                'name' => ['required', 'max:255'],
                'desc' => ['required'],
               'price'=>['required'],
                'category_id'=>['required'],
                'price' => ['required'],
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                 'imagepath' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                 

                
            ];
        
    }
}
