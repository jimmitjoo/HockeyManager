<?php

namespace App\Listeners;

use App\Events\StartPeriod;
use App\Statuses\GameStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetPeriodAsStarted
{
    /**
     * Handle the event.
     *
     * @param  StartPeriod  $event
     * @return void
     */
    public function handle(StartPeriod $event)
    {
        if ($event->game->status === GameStatus::FirstPeriodEnded) {
            $event->game->status = GameStatus::SecondPeriod;
        }

        if ($event->game->status === GameStatus::SecondPeriodEnded) {
            $event->game->status = GameStatus::ThirdPeriod;
        }

        if ($event->game->status === GameStatus::ThirdPeriodEnded) {
            $event->game->status = GameStatus::Overtime;
        }

        if ($event->game->status === GameStatus::OvertimeEnded) {
            $event->game->status = GameStatus::Penalties;
        }

        $event->game->save();
    }
}
