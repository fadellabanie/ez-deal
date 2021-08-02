<?php

namespace App\Http\Controllers\API\V1\RealEstate;

use App\Models\Order;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Requests\Api\Orders\StoreRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::active()->paginate();

        return new OrderCollection($orders);
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrder()
    {
        $orders = Order::owner()->active()->paginate();

        return new OrderCollection($orders);
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
      
        Order::create($request->all());

        $title = __("Create");
        $body = __("Create Order Success");
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

        $title = __("Delete");
        $body = __("Delete Your Order Success");
        $this->send(Auth::user()->device_token, $title, $body);

        return $this->successStatus();
    }
}
