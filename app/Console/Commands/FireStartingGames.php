<?php

namespace App\Console\Commands;

use App\Events\StartGame;
use App\Models\Game;
use App\Models\Schedule;
use App\Statuses\GameStatus;
use Illuminate\Console\Command;

class FireStartingGames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fire-starting-games';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Find games to start';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $gamesToStart = Game::query()
            ->where('status', GameStatus::NotStarted)
            ->where('starts_at', '<=', now())
            ->get();

        foreach ($gamesToStart as $game) {
            event(new StartGame($game));
        }

        return Command::SUCCESS;
    }
}
