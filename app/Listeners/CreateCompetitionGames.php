<?php

namespace App\Listeners;

use App\Models\Competition;
use App\Types\CompetitionType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class CreateCompetitionGames
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->competition->type === CompetitionType::CupPlayOffs) {
            Log::debug('Creating cup games');
            $this->createKnockoutCup($event->competition);
        }

        if ($event->competition->type === CompetitionType::League) {
            Log::debug('Creating league games');
            $this->createLeague($event->competition);
        }

        Log::debug('Games created');
    }


    private function createKnockoutRound(int $teamAmount, Competition $competition, $roundStartsAt, $roundEndsAt, $round): int
    {
        $roundGamesCount = $teamAmount / 2;
        $meetingsInRound = config('manager.cups.meetings');
        $hoursBetweenGames = Carbon::make($roundStartsAt)->diffInHours($roundEndsAt) / $meetingsInRound;

        for ($i = 0; $i < $meetingsInRound; $i++) {
            $meetingStartsAt = Carbon::make($roundStartsAt)->addHours($i * $hoursBetweenGames)->format('Y-m-d H:i:s');

            for ($j = 0; $j < $roundGamesCount; $j++) {
                $competition->games()->create([
                    'round' => $round,
                    'starts_at' => $meetingStartsAt,
                ]);
            }
        }

        return $roundGamesCount;
    }

    /**
     * @param object $event
     * @param int $rounds
     * @return int
     */
    private function hoursBetweenRounds(Competition $competition, int $rounds): int
    {
        $competitionStartsAt = $competition->starts_at;
        $competitionEndsAt = Carbon::make($competition->ends_at);

        $competitionDuration = $competitionEndsAt->diffInHours($competitionStartsAt);

        // Days between rounds
        return floor($competitionDuration / $rounds);
    }

    /**
     * @param object $event
     * @return void
     */
    private function createKnockoutCup(Competition $competition): void
    {
        $knockOutTeamAmount = [2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096, 8192, 16384, 32768, 64536, 129072, 258144, 516288, 1032576];

        $teamAmount = collect($knockOutTeamAmount)->filter(function ($amount) use ($competition) {
            return $amount >= $competition->max_teams;
        })->first();

        // get index of value in $this->knockOutTeamAmount
        $roundsNeededIndex = array_search($teamAmount, $knockOutTeamAmount);

        $hoursBetweenRounds = $this->hoursBetweenRounds($competition, $roundsNeededIndex);

        for ($i = 0; $i <= $roundsNeededIndex; $i++) {
            $x = $i + 1;
            $roundStartsAt = $competition->starts_at->addHours((int)$i * $hoursBetweenRounds)->format('Y-m-d H:i:s');
            $roundEndsAt = $competition->starts_at->addHours((int)$x * $hoursBetweenRounds)->format('Y-m-d H:i:s');
            $teamAmount = $this->createKnockoutRound($teamAmount, $competition, $roundStartsAt, $roundEndsAt, $x);
        }
    }

    private function createLeague(Competition $competition)
    {
        Log::debug('Creating league games');
        $rounds = ($competition->max_teams - 1) * config('manager.leagues.meetings');
        $hoursBetweenRounds = $this->hoursBetweenRounds($competition, $rounds);

        $participants = $competition->teams()->pluck('id')->shuffle()->toArray();
        if (count($participants) % 2 !== 0) {
            $participants[] = null;
        }

        for ($i = 1; $i <= $rounds; $i++) {
            $startsAt = Carbon::make($competition->starts_at);
            $dateOfRound = $startsAt->addHours((int)($i - 1) * $hoursBetweenRounds)->format('Y-m-d H:i:s');

            $teamCount = count($participants);
            $gamesCount = ceil($competition->teams->count() / 2);
            for ($x = 1; $x <= $gamesCount; $x++) {
                $homeTeam = ($x == 1) ? 1 : (($i + $x - 2) % ($teamCount - 1) + 2);
                $awayTeam = ($teamCount - 1 + $i - $x) % ($teamCount - 1) + 2;

                if ($i % 2) {
                    $swap = $homeTeam;
                    $homeTeam = $awayTeam;
                    $awayTeam = $swap;
                }

                if ($participants[$homeTeam - 1] !== null && $participants[$awayTeam - 1] !== null) {
                    $competition->games()->create([
                        'round' => $i,
                        'starts_at' => $dateOfRound,
                        'home_team_id' => $participants[$homeTeam - 1],
                        'away_team_id' => $participants[$awayTeam - 1],
                    ]);
                }
            }
        }
    }
}
