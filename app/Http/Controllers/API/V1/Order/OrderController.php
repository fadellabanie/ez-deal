<?php

namespace App\Http\Controllers\API\V1\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Orders\StoreRequest;
use App\Http\Resources\Orders\MyOrderCollection;
use App\Http\Resources\Orders\OrderCollection;
use App\Http\Requests\Api\Orders\UpdateRequest;
use App\Http\Resources\Orders\OrderLargeResource;
use App\Http\Interfaces\Senders\SenderFactory;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('check.user.subscribe')->only('index');
        //$this->middleware('check.user.limit.normal.order')->only('store');
        $this->middleware('check.user.limit.feature.attribute:order')->only('store');
    }
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
    public function indexGuest()
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
        $orders = Order::owner()->paginate();

        return new MyOrderCollection($orders);
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
        $request['is_active'] = true;

        Order::create($request->all());

        $title = __("Create");
        $body = __("Create Order Success");

        $senderFactory = new SenderFactory();
        $senderFactory->initialize('firebase-notification', Auth::user()->device_token, $body, $title);

        return $this->successStatus(__("Add Order Success"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::whereId($id)->active()->first();
        if (!$order)  return $this->respondNoContent();

        $order->increment('number_of_views', 1);

        return $this->respondWithItem(new OrderLargeResource($order));
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
        $order = Order::whereId($id)->where('user_id', Auth::id())->first();
        if (!$order) return $this->errorNotFound();

        Order::whereId($id)->update($request->all());


        return $this->successStatus(__("Update Order Success"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::whereId($id)->where('user_id', Auth::id())->first();
        if (!$order) return $this->errorNotFound(__("Order Not Found"));

        $order->delete();

        $title = __("Delete");
        $body = __("Delete Your Order Success");
        $this->send(Auth::user()->device_token, $title, $body);

        return $this->successStatus();
    }
}
