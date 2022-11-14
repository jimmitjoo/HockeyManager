<?php

namespace App\Listeners;

use App\Events\CompetitionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompetitionTeams
{
    /**
     * Handle the event.
     *
     * @param  CompetitionCreated  $event
     * @return void
     */
    public function handle(CompetitionCreated $event)
    {
        for ($i = 0; $i < $event->competition->max_teams; $i++) {
            $event->competition->teams()->create([
                'name' => 'Team ' . ($i + 1),
                'city' => 'City ' . ($i + 1),
                'state' => 'State ' . ($i + 1),
                'country' => 'Country ' . ($i + 1),
            ]);
        }
    }
}
