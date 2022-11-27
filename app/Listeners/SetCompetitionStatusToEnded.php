<?php

namespace App\Listeners;

use App\Events\CompetitionEnded;
use App\Statuses\CompetitionStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompetitionStatusToEnded
{
    /**
     * Handle the event.
     *
     * @param  CompetitionEnded  $event
     * @return void
     */
    public function handle(CompetitionEnded $event)
    {
        $event->competition->status = CompetitionStatus::Ended;
        $event->competition->save();

        return;
    }
}
