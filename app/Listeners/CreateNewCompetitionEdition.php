<?php

namespace App\Listeners;

use App\Events\CompetitionEnded;
use App\Models\Competition;
use App\Statuses\CompetitionStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateNewCompetitionEdition
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function handle(CompetitionEnded $event)
    {
        if (!$event->competition->recurring) {
            return;
        }

        $duration = $event->competition->ends_at->diffInDays($event->competition->starts_at);

        if ($duration < 1) {
            $duration = 2;
        }

        Competition::create([
            'name' => $event->competition->name,
            'country' => $event->competition->country,
            'type' => $event->competition->type,
            'tier' => $event->competition->tier,
            'status' => CompetitionStatus::NotStarted,
            'edition' => $event->competition->edition + 1,
            'max_teams' => $event->competition->max_teams,
            'recurring' => $event->competition->recurring,
            'promotion' => $event->competition->promotion,
            'relegation' => $event->competition->relegation,
            'starts_at' => $event->competition->ends_at->addDay(),
            'ends_at' => $event->competition->ends_at->addDays($duration),
        ]);
    }
}
