<?php

namespace App\Http\Controllers\API\V1\Stories;

use App\Models\Story;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Stories\StoreRequest;
use App\Http\Resources\Stories\StoryCollection;

class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::MyStory()->WhereDate('end_date','<=',now())->active()->get();

        return new StoryCollection($stories);
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        
        Story::create([
            'user_id' => Auth::id(),
            'city_id' => Auth::user()->city_id,
            'country_id' => getCountry(Auth::user()->city_id),
            'start_date' => now(),
            'end_date' => now(),
            'title' => $request->title,
            'image' => $request->image,
        ]);

        return $this->respondCreated();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
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
       
    }
}
