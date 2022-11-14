<?php

namespace App\Listeners;

use App\Statuses\CompetitionStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompetitionStatusToInProgress
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $event->competition->status = CompetitionStatus::InProgress;
        $event->competition->save();
    }
}
