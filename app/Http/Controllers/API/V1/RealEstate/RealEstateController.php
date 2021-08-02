<?php

namespace App\Http\Controllers\API\V1\RealEstate;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\RealEstates\StoreRequest;
use App\Http\Resources\RealEstates\RealEstateCollection;
use App\Http\Resources\RealEstates\RealEstateLargeResource;

class RealEstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $realEstates = RealEstate::active()->paginate();

        return new RealestateCollection($realEstates);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listOnMap()
    {
        $realEstates = RealEstate::where('city_id', Auth::user()->city_id)->active()->get();

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

        $realEstate = RealEstate::create($request->all());
        foreach ($request->images as $key => $image) {
            DB::table('realestate_media')->insert([
                'realestate_id' => $realEstate->id,
                'image' => $image,
            ]);
        }
        $title = __("Create");
        $body = __("Create Real Estate Success wait for Active by Support");
        $this->send(Auth::user()->device_token, $title, $body);

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
        $realEstate = RealEstate::whereId($id)->active()->first();
        if (!$realEstate)  return $this->respondNoContent();

        $realEstate->increment('number_of_views', 1);

        return new RealEstateLargeResource($realEstate);
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

        $title = __("Delete");
        $body = __("Delete Real Estate Success");
        $this->send(Auth::user()->device_token, $title, $body);

        return $this->successStatus();
    }
}
