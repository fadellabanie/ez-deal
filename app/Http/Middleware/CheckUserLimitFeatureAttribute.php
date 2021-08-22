<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckUserLimitFeatureAttribute
{
    use ApiResponder;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$attribute_slug)
    {
        if($attribute_slug == 'RealEstate' && $request->type == 'normal'){
         
            $attribute =  Attribute::where('slug', 'normal-real-estate')->first();
        }elseif($attribute_slug == 'RealEstate' && $request->type == 'special'){
          
            $attribute =  Attribute::where('slug', 'special-real-estate')->first();
        }else{
         
            $attribute =  Attribute::where('slug', $attribute_slug)->first();
        }
      //dd($attribute);
        $user_attribute =  DB::table('user_attribute')
            ->where('user_id', Auth::id())
            ->where('attribute_id', $attribute->id)
            ->where('is_expiry', false)
            ->whereDate('expiry_date', '>', now())
            ->first();
            ## fadel edit fast
        if(Auth::user()->package_id == 4){
            DB::table('user_attribute')
            ->where('user_id', Auth::id())
            ->where('attribute_id', $attribute->id)
            ->decrement('count');
            return $next($request);
        }

        if (!$user_attribute || $user_attribute->count == 0) {
            DB::table('user_attribute')
                ->where('user_id', Auth::id())
                ->where('attribute_id', $attribute->id)
                ->update(['is_expiry' => true]);
            return $this->errorStatus('plz upgrade your account');
        }

        DB::table('user_attribute')
            ->where('user_id', Auth::id())
            ->where('attribute_id', $attribute->id)
            ->decrement('count');

        return $next($request);
    }
}
