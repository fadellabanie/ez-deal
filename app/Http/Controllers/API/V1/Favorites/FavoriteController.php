<?php

namespace App\Http\Controllers\API\V1\Favorites;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\Favorites\StoreRequest;
use App\Http\Resources\Favorites\FavoriteCollection;

class FavoriteController extends Controller
{

    public function myFavorite()
    {
        $favorites =  Favorite::with('realEstate')->Owner()->get();
       
        return new FavoriteCollection($favorites);
    } 

    public function addFavorite(StoreRequest $request)
    {
        $favorite = Favorite::firstOrCreate([
            'real_estate_id' => $request->real_estate_id,
            'user_id' => Auth::id(),
        ], [
            'real_estate_id' => $request->real_estate_id,
            'user_id' => Auth::id(),
        ]);

        return $this->successStatus(__("Add to favorite success"));

    } 
    public function unFavorite(StoreRequest $request)
    {
        Favorite::where([
            'real_estate_id' => $request->real_estate_id,
            'user_id' => Auth::id(),
        ])->delete();
        
        return $this->successStatus(__("Unfavorite success"));
    }
}
