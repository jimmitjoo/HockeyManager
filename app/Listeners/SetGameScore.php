<?php

namespace App\Listeners;

use App\Events\GoalScored;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetGameScore
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(GoalScored $event)
    {
        $scorer = $event->game->homeTeam->players->find($event->scorer->id);
        if (!$scorer) {
            $event->game->update([
                'away_score' => $event->game->away_score + 1,
            ]);
        } else {
            $event->game->update([
                'home_score' => $event->game->home_score + 1,
            ]);
        }
    }
}
