<?php

namespace App\Http\Controllers\API\V1\Packages;

use App\Models\Order;
use App\Models\Feature;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Orders\StoreRequest;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Requests\Api\Orders\UpdateRequest;
use App\Http\Resources\Orders\OrderLargeResource;
use App\Http\Resources\Features\FeatureCollection;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $features = Feature::active()->get();

        return new FeatureCollection($features);
    } 

}
