<?php

namespace App\Http\Requests\Api\RealEstates;

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
            'realestate_type_id' => 'required|exists:realestate_types,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'neighborhood_id' => 'required|exists:neighborhoods,id',
            'view_id' => 'required|exists:views,id',
            'species' => 'required',
            'price' => 'required|gt:0',
            'space' => 'required|gt:0',
            'number_building' => 'required|gt:0',
            'age_building' => 'required|gt:0',
            'street_width' => 'required|gt:0',
            'street_number' => 'required|gt:0',
            'city_id' => 'required',
            'country_id' => 'required',
            'elevator' => 'required|boolean',
            'parking' => 'required|boolean',
            'ac' => 'required|boolean',
            'furniture' => 'required|boolean',
            'note' => 'nullable',
            'type_of_owner' => 'required',
            'number_card' => 'required',
            'lat' =>  ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'lng' => ['required', 'regex:/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+))|180(\.0+)?)$/'],
            'address' => 'required|min:5',
            'name' => 'nullable|min:5',
            'images.*' => 'required',
        ];
    }
}
