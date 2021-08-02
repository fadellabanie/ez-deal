<?php

namespace App\Http\Controllers\API\V1\Favorites;

use App\Models\Favorite;
use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Api\RealEstates\StoreRequest;
use App\Http\Resources\RealEstates\RealEstateCollection;
use App\Http\Resources\RealEstates\RealEstateLargeResource;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
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
    public function unFavorite(Request $request)
    {
        Favorite::where([
            'real_estate_id' => $request->real_estate_id,
            'user_id' => Auth::id(),
        ])->delete();
        
        return $this->successStatus(__("Unfavorite success"));
    }
}
