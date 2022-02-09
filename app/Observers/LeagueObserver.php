<?php

namespace App\Observers;

use App\Models\League;

class LeagueObserver
{
    /**
     * Handle the League "created" event.
     *
     * @param  \App\Models\League  $league
     * @return void
     */
    public function created(League $league)
    {
        $league->seasons()->create(['year' => now()->format('Y')]);
    }

    /**
     * Handle the League "updated" event.
     *
     * @param  \App\Models\League  $league
     * @return void
     */
    public function updated(League $league)
    {
        //
    }

    /**
     * Handle the League "deleted" event.
     *
     * @param  \App\Models\League  $league
     * @return void
     */
    public function deleted(League $league)
    {
        $league->seasons()->delete();
    }

    /**
     * Handle the League "restored" event.
     *
     * @param  \App\Models\League  $league
     * @return void
     */
    public function restored(League $league)
    {
        //
    }

    /**
     * Handle the League "force deleted" event.
     *
     * @param  \App\Models\League  $league
     * @return void
     */
    public function forceDeleted(League $league)
    {
        //
    }
}
