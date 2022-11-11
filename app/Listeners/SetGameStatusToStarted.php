<?php

namespace App\Listeners;

use App\Events\StartGame;
use App\Statuses\GameStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetGameStatusToStarted
{
    /**
     * Handle the event.
     *
     * @param  StartGame $event
     * @return void
     */
    public function handle(StartGame $event)
    {
        $event->game->update([
            'status' => GameStatus::FirstPeriod,
        ]);
    }
}
