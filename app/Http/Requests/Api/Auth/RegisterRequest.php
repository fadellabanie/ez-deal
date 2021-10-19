<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\Phone;
use App\Http\Requests\Api\APIRequest;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends APIRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|min:4|max:100',
            'type' =>  'required|in:personal,company',
            'email' =>  'required|unique:users,email',
            'mobile' =>  ['required','unique:users,mobile'],
            'password' => 'required|min:8|max:15',
            'device_token' => 'required',
            'country_code' => 'required',
            'device_type' => 'required|in:android,ios',
            'device_id' => 'required',
            'city_id' => 'required',
        ];
    }
}
