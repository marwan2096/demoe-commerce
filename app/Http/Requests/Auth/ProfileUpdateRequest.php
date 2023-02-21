<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Auth\ProfileUpdateRequest;

class ProfileUpdateRequest extends FormRequest
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
            'first_name'=>'required|max:50',
            'last_name'=>'required|max:50',
            'email'=>'required|unique:users,email,'.$this->user()->id,
            'phone'=>'sometimes|unique:users,phone|digits_between:10,20'.$this->user()->id,
            'password'=>'required|min:6',
            'gender'=>'sometimes|max:20'
        ];
    }
}
