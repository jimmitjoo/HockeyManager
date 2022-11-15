<?php

namespace App\Listeners;

use App\Events\GameEnded;
use App\Models\CompetitionTeam;
use App\Types\CompetitionType;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class SetCompetitionPoints
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @param string $ending
     * @return void
     */
    public function handle(GameEnded $event)
    {
        $homeCompetitionTeam = CompetitionTeam::query()
            ->where('team_id', $event->game->home_team_id)
            ->where('competition_id', $event->game->competition_id)
            ->first();
        $awayCompetitionTeam = CompetitionTeam::query()
            ->where('team_id', $event->game->away_team_id)
            ->where('competition_id', $event->game->competition_id)
            ->first();

        if ($event->game->competition->type === CompetitionType::League) {

            if ($event->ending === 'overtime' || $event->ending === 'penalties') {
                $winPoints = 2;
                $losePoints = 1;
            } else {
                $winPoints = 3;
                $losePoints = 0;
            }

            if ($event->game->home_score > $event->game->away_score) {
                $homeCompetitionTeam->games_played += 1;
                $homeCompetitionTeam->wins += 1;
                $homeCompetitionTeam->goals_for += $event->game->home_score;
                $homeCompetitionTeam->goals_against += $event->game->away_score;
                $homeCompetitionTeam->points += $winPoints;
                $homeCompetitionTeam->save();

                $awayCompetitionTeam->games_played += 1;
                $awayCompetitionTeam->losses += 1;
                $awayCompetitionTeam->goals_for += $event->game->away_score;
                $awayCompetitionTeam->goals_against += $event->game->home_score;
                $awayCompetitionTeam->points += $losePoints;
                $awayCompetitionTeam->save();
            } else {
                $homeCompetitionTeam->games_played += 1;
                $homeCompetitionTeam->losses += 1;
                $homeCompetitionTeam->goals_for += $event->game->home_score;
                $homeCompetitionTeam->goals_against += $event->game->away_score;
                $homeCompetitionTeam->points += $losePoints;
                $homeCompetitionTeam->save();

                $awayCompetitionTeam->games_played += 1;
                $awayCompetitionTeam->wins += 1;
                $awayCompetitionTeam->goals_for += $event->game->away_score;
                $awayCompetitionTeam->goals_against += $event->game->home_score;
                $awayCompetitionTeam->points += $winPoints;
                $awayCompetitionTeam->save();
            }
        }
    }
}
