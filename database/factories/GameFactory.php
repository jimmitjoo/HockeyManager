<?php

namespace Database\Factories;

use App\Models\Competition;
use App\Models\Team;
use App\Statuses\GameStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $statuses = [
            GameStatus::NotStarted,
            GameStatus::FirstPeriod,
            GameStatus::FirstPeriodEnded,
            GameStatus::SecondPeriod,
            GameStatus::SecondPeriodEnded,
            GameStatus::ThirdPeriod,
            GameStatus::ThirdPeriodEnded,
            GameStatus::Overtime,
            GameStatus::OvertimeEnded,
            GameStatus::Penalties,
            GameStatus::Ended,
        ];
        shuffle($statuses);

        $homeTeam = Team::factory()->create();
        $awayTeam = Team::factory()->create();
        $competition = Competition::factory()->create();
        $competition->teams()->attach([$homeTeam->id, $awayTeam->id]);

        return [
            'status' => $statuses[0],
            'starts_at' => $this->faker->dateTimeBetween('now', '+4 weeks'),
            'current_time' => $this->faker->numberBetween(0, 1200),
            'home_score' => $this->faker->numberBetween(0, 10),
            'away_score' => $this->faker->numberBetween(0, 10),
            'home_team_id' => $homeTeam->id,
            'away_team_id' => $awayTeam->id,
            'competition_id' => $competition->id,
        ];
    }
}
