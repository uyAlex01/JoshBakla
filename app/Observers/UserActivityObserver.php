<?php

namespace App\Observers;

use App\Models\UserActivity;

class UserActivityObserver
{
    /**
     * Handle the UserActivity "created" event.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return void
     */
    public function created(UserActivity $userActivity)
    {
        //
    }

    /**
     * Handle the UserActivity "updated" event.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return void
     */
    public function updated(UserActivity $userActivity)
    {
        //
    }

    /**
     * Handle the UserActivity "deleted" event.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return void
     */
    public function deleted(UserActivity $userActivity)
    {
        //
    }

    /**
     * Handle the UserActivity "restored" event.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return void
     */
    public function restored(UserActivity $userActivity)
    {
        //
    }

    /**
     * Handle the UserActivity "force deleted" event.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return void
     */
    public function forceDeleted(UserActivity $userActivity)
    {
        //
    }
}
