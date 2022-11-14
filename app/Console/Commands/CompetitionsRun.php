<?php

namespace App\Console\Commands;

use App\Events\CompetitionEnded;
use App\Events\CompetitionStarted;
use App\Models\Competition;
use App\Statuses\CompetitionStatus;
use Illuminate\Console\Command;

class CompetitionsRun extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'competitions-run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run competitions†';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $shouldStart = Competition::query()
            ->where('status', CompetitionStatus::NotStarted)
            ->where('starts_at', '<=', now())
            ->get();

        foreach ($shouldStart as $competition) {
            event(new CompetitionStarted($competition));
        }


        $shouldEnd = Competition::query()
            ->where('status', CompetitionStatus::InProgress)
            ->where('ends_at', '<=', now())
            ->get();

        foreach ($shouldEnd as $competition) {
            event(new CompetitionEnded($competition));
        }

        return Command::SUCCESS;
    }
}
