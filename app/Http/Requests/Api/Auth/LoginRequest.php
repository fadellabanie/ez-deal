<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\APIRequest;
use App\Rules\Phone;

class LoginRequest extends APIRequest
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
            'mobile' =>  ['required','unique:users,mobile',new Phone],
            'password' => 'required|min:8|max:15',
        ];
    }
}
