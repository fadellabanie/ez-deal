<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\Phone;
use App\Http\Requests\Api\APIRequest;

class UpdateRequest extends APIRequest
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
            'email' => 'required|string|email|unique:users,email',
            'username' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }
}
