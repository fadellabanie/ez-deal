<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\V1\ConstantController;
use App\Http\Traits\ApiResponder;

class CheckUserSubscribe
{
    use ApiResponder;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $package = Package::find(Auth::user()->package_id);
       
        if (!$package || $package->slug == ConstantController::SILVER_PACKAGE) {

            return $this->errorStatus('You are in SILVER PACKAGE please upgrade');
        }
        return $next($request);
    }
}
