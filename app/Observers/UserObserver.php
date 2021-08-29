<?php

namespace App\Observers;

use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {

        $package =  Package::whereId(4)->first(); ## bromo

        $attributes = $package->attributes()->pluck('count', 'id')->toArray();

        $user->update([
            'package_id' =>  4, ## BROMO_PACKAGE,
            'subscribe_to' => now()->addDays($package->days),
        ]);
        foreach ($attributes as $id => $count) {
            DB::table('user_attribute')->insert([
                'user_id' => $user->id,
                'attribute_id' => $id,
                'count' => $count,
                'expiry_date' => now()->addDays($package->days),
            ]);
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
