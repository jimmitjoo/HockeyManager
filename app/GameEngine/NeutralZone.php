<?php

namespace App\GameEngine;

use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

class NeutralZone
{
    public Collection $attackingPlayers;
    public Collection $defendingPlayers;
    /**
     * @var float[]|int[]
     */
    public array $probability;
    public int $winner;

    public function __construct(
        /* Attacking team */
        public Person $player1,
        public Person $player2,
        public Person $player3,
        public Person $player4,
        public Person $player5,

        /* Defending team */
        public Person $player6,
        public Person $player7,
        public Person $player8,
        public Person $player9,
        public Person $player10
    )
    {
        $this->attackingPlayers = collect([
            $player1,
            $player2,
            $player3,
            $player4,
            $player5,
        ]);
        $this->defendingPlayers = collect([
            $this->player6,
            $this->player7,
            $this->player8,
            $this->player9,
            $this->player10,
        ]);

        $this->calculateProbabilities();

        $this->run();
    }

    private function calculateProbabilities()
    {
        $defendingSkills = $this->defendingPlayers->each(function ($player) {
                return $player->skills->defend_neutral_zone;
            })->sum() / 5;

        $attackingSkills = $this->attackingPlayers->each(function ($player) {
                return $player->skills->attack_neutral_zone;
            })->sum() / 5;

        $total = $defendingSkills + $attackingSkills;

        $defendingProbability = $defendingSkills / $total;
        $attackingProbability = $attackingSkills / $total;

        $this->probability = [$defendingProbability * 100, $attackingProbability * 100];
    }

    public function run(): int
    {
        $randomize = rand(0, 100);

        if ($randomize <= $this->probability[0]) {
            return $this->winner = 0;
        }

        return $this->winner = 1;
    }
}
