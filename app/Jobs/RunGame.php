<?php

namespace App\Jobs;

use App\Events\EndPeriod;
use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class RunGame implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Game $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $currentTime = explode(':', $this->game->current_time);
        $time = ((int)$currentTime[0] * 60) + (int)$currentTime[1];

        $timeElapse = rand(30, 90);

        if ($time - $timeElapse < 0) {
            // End period
            event(new EndPeriod($this->game));

            $this->game->current_time = 1200;
        } else {
            $this->game->current_time = $time - $timeElapse;
        }

        $this->game->save();
    }
}
