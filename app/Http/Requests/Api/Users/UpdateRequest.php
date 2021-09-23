<?php

namespace App\Http\Requests\Api\Users;

use App\Rules\Phone;
use App\Http\Requests\Api\APIRequest;
use Illuminate\Support\Facades\Auth;

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
            'email' => 'nullable|string|email|unique:users,email,'.Auth::user()->id,
            'username' => 'nullable',
            'avatar' => 'nullable',
        ];
    }
}
