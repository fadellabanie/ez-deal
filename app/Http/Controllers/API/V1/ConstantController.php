<?php

namespace App\Http\Controllers\API\V1;

use App\Models\City;
use App\Models\View;
use App\Models\Country;
use App\Models\StaticPage;
use App\Models\ContractType;
use App\Models\Neighborhood;
use Illuminate\Http\Request;
use App\Models\RealestateType;
use App\Http\Controllers\Controller;
use App\Http\Resources\Constants\CityResource;
use App\Http\Resources\Constants\ViewResource;
use App\Http\Resources\Constants\ConstResource;
use App\Http\Resources\Constants\CountryResource;
use App\Http\Resources\Constants\StaticPageResource;
use App\Http\Resources\Constants\ContractTypeResource;
use App\Http\Resources\Constants\NeighborhoodResource;
use App\Http\Resources\Constants\RealEstateTypeResource;

class ConstantController extends Controller
{

    const GOLD_PACKAGE = 'gold';
    const SILVER_PACKAGE = 'silver';
    const BRONZE_PACKAGE = 'bronze';
    const BROMO_PACKAGE = 'bromo';


    const ORDER = 'order';
    const SPECIAL = 'special';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRealEstateType()
    {
        $data = RealestateType::get();
     
        return $this->respondWithCollection(RealEstateTypeResource::collection($data));
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getContractType()
    {
        $data = ContractType::get();
       
        return $this->respondWithCollection(ContractTypeResource::collection($data));
    }/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCity()
    {
        $data = City::get();
     
        return $this->respondWithCollection(CityResource::collection($data));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCountry()
    {
        $data = Country::get();
     
        return $this->respondWithCollection(CountryResource::collection($data));
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNeighborhood(Request $request)
    {
        $data = Neighborhood::where('city_id',$request->city_id)->get();
     
        return $this->respondWithCollection(NeighborhoodResource::collection($data));
    } 
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getView()
    {
        $data = View::get();
     
        return $this->respondWithCollection(ViewResource::collection($data));
    } 
    
    /* Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beforeCreateRealState()
    {
        $data = StaticPage::where('type','before-create')->get();
     
        return $this->respondWithCollection(StaticPageResource::collection($data));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreationConst()
    {
        $data['views'] = View::get();
        $data['contract_type'] = ContractType::get();
        $data['cities'] = City::get();
        $data['realestate_type'] = RealestateType::get();

        //$data['neighborhoods'] = Neighborhood::get();

     
        return $this->respondWithCollection(new ConstResource($data));
    }

}
