<?php

namespace App\Console\Commands;

use App\Events\StartPeriod;
use App\Jobs\RunGame;
use App\Models\Game;
use App\Statuses\GameStatus;
use Illuminate\Console\Command;

class RunGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run games';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $activeGames = Game::query()
            ->where('status', GameStatus::FirstPeriod)
            ->orWhere('status', GameStatus::SecondPeriod)
            ->orWhere('status', GameStatus::ThirdPeriod)
            ->orWhere('status', GameStatus::Overtime)
            ->orWhere('status', GameStatus::Penalties)
            ->get();

        foreach ($activeGames as $game) {
            dispatch(new RunGame($game));
        }

        $pausedGames = Game::query()
            ->where(function ($query) {
                $query->where('status', GameStatus::FirstPeriodEnded)
                    ->orWhere('status', GameStatus::SecondPeriodEnded)
                    ->orWhere('status', GameStatus::ThirdPeriodEnded)
                    ->orWhere('status', GameStatus::OvertimeEnded);
            })
            ->where('updated_at', '<=', now()->subMinutes(5))
            ->get();

        foreach ($pausedGames as $game) {
            event(new StartPeriod($game));
        }

        return Command::SUCCESS;
    }
}
