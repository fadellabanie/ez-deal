<?php

namespace App\Http\Controllers\API\V1\RealEstate;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Captains\Auth\StoreRequest;
use App\Http\Resources\RealEstates\RealEstateCollection;
use Illuminate\Support\Facades\Auth;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realEstates = RealEstate::owner()->active()->paginate();

        return new RealestateCollection($realEstates);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $request['user_id'] = Auth::id();

        RealEstate::create($request->all());

        return $this->successStatus(__("Add Real Estate Success"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RealEstate $realEstate)
    {
        $realEstate->delete();
        return $this->successStatus();
    }
}
