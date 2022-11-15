<?php

namespace App\Listeners;

use App\Events\EndPeriod;
use App\Events\GameEnded;
use App\Statuses\GameStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetPeriodAsEnded
{
    /**
     * Handle the event.
     *
     * @param  EndPeriod  $event
     * @return void
     */
    public function handle(EndPeriod $event)
    {
        if ($event->game->status === GameStatus::FirstPeriod) {
            $event->game->status = GameStatus::FirstPeriodEnded;
        }

        if ($event->game->status === GameStatus::SecondPeriod) {
            $event->game->status = GameStatus::SecondPeriodEnded;
        }

        if ($event->game->status === GameStatus::ThirdPeriod) {
            if ($event->game->home_score === $event->game->away_score) {
                // If the game is tied, go to overtime
                $event->game->status = GameStatus::ThirdPeriodEnded;
            } else {
                // If the game is not tied, end the game
                $event->game->status = GameStatus::Ended;

                event(new GameEnded($event->game, 'full-time'));
            }
        }

        if ($event->game->status === GameStatus::Overtime) {
            if ($event->game->home_score === $event->game->away_score) {
                // If the game is tied, go to penalties
                $event->game->status = GameStatus::OvertimeEnded;
            } else {
                // If the game is not tied, end the game
                $event->game->status = GameStatus::Ended;

                event(new GameEnded($event->game, 'overtime'));
            }
        }

        if ($event->game->status === GameStatus::Penalties) {
            // End the game if not tied
            if ($event->game->home_score !== $event->game->away_score) {
                $event->game->status = GameStatus::Ended;

                event(new GameEnded($event->game, 'penalties'));
            }
        }

        $event->game->save();
    }
}
