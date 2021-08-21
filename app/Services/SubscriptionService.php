<?php

namespace App\Services;

use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SubscriptionService
{

    /**
     * Create new row.
     * @param  array $data 
     * @return mixed
     */
    public static function subscription($data)
    {
        DB::beginTransaction();

        $response['success'] = true;

        try {
            $package = Package::with('attributes')->whereId($data['package_id'])->first();
          
            $user = User::whereId($data['user_id'])->first();
           
            $user->update([
                'package_id' => $data['package_id'],
                'subscribe_to' => now()->addDays($package->days),
            ]);

            $attributes = $package->attributes()->pluck('count', 'id')->toArray();
            foreach ($attributes as $id => $count) {
                DB::table('user_attribute')->insert([
                    'user_id' => $user->id,
                    'attribute_id' => $id,
                    'count' => $count,
                    'expiry_date' => now()->addDays($package->days),
                ]);
            }
            DB::commit();
            return $response;
        } catch (\Exception $exception) {
            DB::rollback();

            $response['success'] = false;
            $response['message'] = $exception->getMessage();
            return $response;
        }
    }
}
