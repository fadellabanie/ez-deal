<?php

namespace App\Http\Controllers\API\V1\RealEstate;

use Carbon\Carbon;
use App\Models\Feature;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Upgrades\UpgradeFactory;
use App\Http\Requests\Api\RealEstates\StoreRequest;
use App\Http\Requests\Api\RealEstates\UpdateRequest;
use App\Http\Resources\RealEstates\RealEstateCollection;
use App\Http\Resources\RealEstates\RealEstateLargeResource;
use App\Http\Resources\RealEstatesMap\RealEstateMapCollection;

class RealEstateController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.user.limit.feature.attribute:RealEstate')->only('store');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $realEstates = RealEstate::when($request->filled('city_id'), function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            })->when($request->filled('realestate_type_id'), function ($q) use ($request) {
                $q->where('realestate_type_id', $request->realestate_type_id);
            })
            ->when($request->filled('contract_type_id'), function ($q) use ($request) {
                $q->where('contract_type_id', $request->contract_type_id);
            })
            ->when($request->filled('search'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            })
            ->active()->orderBy('type', 'DESC')->paginate();
           
        return new RealestateCollection($realEstates);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myRealEstate()
    {
        $realEstates = RealEstate::owner()->paginate();

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
     
        return new RealEstateMapCollection($realEstates);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upgrade(Request $request)
    {
        $realEstate = RealEstate::find($request->real_estate_id);
        if (!$realEstate)  return $this->respondNoContent();

        $feature = Feature::find($request->feature_id);

        $upgradeFactory = new UpgradeFactory();
        $upgrade = $upgradeFactory->initialize($feature->slug, $request->real_estate_id);

        $upgrade->upgrade();

        return $this->successStatus();
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
        $request['end_date'] = Carbon::now()->addDays(15);
        $request['type'] = $request->type;
        $request['is_active'] = true;

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

        return $this->respondWithItem(new RealEstateLargeResource($realEstate));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {

        $request['user_id'] = Auth::id();

        $realEstate = RealEstate::whereId($id)->where('user_id', Auth::id())->first();

        if (!$realEstate) return $this->errorNotFound();

        $realEstate->update($request->all());

        foreach ($request->images as $key => $image) {
            DB::table('realestate_media')->insert([
                'realestate_id' => $realEstate->id,
                'image' => $image,
            ]);
        }
        return $this->successStatus(__("Update Real Estate Success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $realEstate = RealEstate::whereId($id)->where('user_id', Auth::id())->first();
        if (!$realEstate) return $this->errorNotFound(__("Real Estate Not Found"));

        $realEstate->delete();

        $title = __("Delete");
        $body = __("Delete Real Estate Success");
        $this->send(Auth::user()->device_token, $title, $body);

        return $this->successStatus();
    }
}
