<?php

namespace App\Observers;

use App\Models\Game;
use App\Models\Schedule;

class GameObserver
{
    /**
     * Handle the Game "created" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function created(Game $game)
    {
        Schedule::create([
            'game_id' => $game->id,
            'starts_at' => $game->starts_at,
        ]);
    }

    /**
     * Handle the Game "updated" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function updated(Game $game)
    {
        $scheduledGame = Schedule::where('game_id', $game->id)->first();
        $scheduledGame->update([
            'starts_at' => $game->starts_at,
        ]);
    }

    /**
     * Handle the Game "deleted" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function deleted(Game $game)
    {
        $scheduledGame = Schedule::where('game_id', $game->id)->first();
        $scheduledGame->delete();
    }

    /**
     * Handle the Game "restored" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function restored(Game $game)
    {
        $scheduledGame = Schedule::where('game_id', $game->id)->first();
        $scheduledGame->restore();
    }

    /**
     * Handle the Game "force deleted" event.
     *
     * @param  \App\Models\Game  $game
     * @return void
     */
    public function forceDeleted(Game $game)
    {
        $scheduledGame = Schedule::where('game_id', $game->id)->first();
        $scheduledGame->forceDelete();
    }
}
