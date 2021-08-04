<?php

namespace App\Http\Requests\Api\Stories;

use App\Http\Requests\Api\APIRequest;

class StoreRequest extends APIRequest
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
            'realestate_type_id' => 'required|exists:realestate_types,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'price' => 'required|gt:0',
            'space' => 'required|gt:0',
            'number_building' => 'required|gt:0',
            'age_building' => 'required|gt:0',
            'street_width' => 'required|gt:0',
            'street_number' => 'required|gt:0',
            'view' => 'required',
            'city_id' => 'required',
            'country_id' => 'required',
            'elevator' => 'required|boolean',
            'parking' => 'required|boolean',
            'ac' => 'required|boolean',
            'furniture' => 'required|boolean',
            'note' => 'nullable',
            'lat' =>  ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => 'required',
            'images.*' => 'required',
        ];
    }
}
