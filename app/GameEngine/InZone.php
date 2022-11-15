<?php

namespace App\GameEngine;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Support\Collection;

class InZone
{
    public Collection $attackingPlayers;
    public Collection $defendingPlayers;
    public array $probability;
    public Team $winner;
    public Team $loser;

    public function __construct(
        public Game $game,
        public Team $attackers,
        public Team $defenders,
        public int  $attackingLine,
        public int  $defendingLine,
    )
    {
        $this->attackingPlayers = collect([
            $this->attackers->tactic->{'line' . $this->attackingLine . 'LeftForward'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'Center'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'RightForward'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'LeftDefender'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'RightDefender'},
        ]);

        $this->defendingPlayers = collect([
            $this->defenders->tactic->{'line' . $this->defendingLine . 'LeftForward'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'Center'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'RightForward'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'LeftDefender'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'RightDefender'},
        ]);

        $this->calculateProbabilities();

        $this->run();
    }

    private function calculateProbabilities()
    {
        $defendingSkills = $this->defendingPlayers->pluck('skills.defend_in_zone')->sum() / 5;
        $attackingSkills = $this->attackingPlayers->pluck('skills.attack_in_zone')->sum() / 5;

        $total = $defendingSkills + $attackingSkills;

        $defendingProbability = $defendingSkills / $total;
        $attackingProbability = $attackingSkills / $total;

        $this->probability = [$defendingProbability * 100, $attackingProbability * 100];
    }

    private function run()
    {
        $randomize = rand(0, 100);

        if ($randomize <= $this->probability[0]) {
            $this->winner = $this->defenders;
            $this->loser = $this->attackers;
        } else {
            $this->winner = $this->attackers;
            $this->loser = $this->defenders;
        }
    }
}
