<?php

namespace App\GameEngine;

use App\Events\GoalScored;
use App\Models\Game;
use App\Models\Person;
use App\Models\Team;

class Shot
{
    /**
     * @var mixed|\TValue
     */
    public Person $shooter;

    public function __construct(
        public Game $game,
        public Team $attackers,
        public Team $defenders,
        public int  $attackingLine,
        public int  $defendingLine,
    ) {
        $this->attackingPlayers = collect([
            $this->attackers->tactic->{'line' . $this->attackingLine . 'LeftForward'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'Center'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'RightForward'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'LeftDefender'},
            $this->attackers->tactic->{'line' . $this->attackingLine . 'RightDefender'},
        ]);

        $this->goalkeeper = $this->defenders->tactic->goalkeeper;
        $this->defendingPlayers = collect([
            $this->defenders->tactic->{'line' . $this->defendingLine . 'LeftForward'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'Center'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'RightForward'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'LeftDefender'},
            $this->defenders->tactic->{'line' . $this->defendingLine . 'RightDefender'},
        ]);

        $this->setShooter();

        $this->calculateProbabilities();

        $this->run();
    }

    private function setShooter()
    {
        $positionShooter = rand(1,100);
        $leftOrRight = rand(0,1);
        if ($positionShooter < 50) {
            // forward
            if ($leftOrRight === 0) {
                $this->shooter = $this->attackingPlayers->get(0);
            } else {
                $this->shooter = $this->attackingPlayers->get(2);
            }
        } elseif ($positionShooter < 85) {
            // defender
            if ($leftOrRight === 0) {
                $this->shooter = $this->attackingPlayers->get(3);
            } else {
                $this->shooter = $this->attackingPlayers->get(4);
            }
        } else {
            // center
            $this->shooter = $this->attackingPlayers->get(1);
        }
    }

    private function calculateProbabilities()
    {
        $attackingSkills = $this->shooter->skills->shooting;
        $defendingSkills = $this->goalkeeper->skills->goaltending;

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

            $assists = rand(0,2);
            $this->attackingPlayers->shuffle();
            $this->assisters = $this->attackingPlayers->take($assists);

            // fire goal event
            event(new GoalScored(
                $this->game,
                $this->shooter,
                $this->assisters,
            ));
        }
    }
}
