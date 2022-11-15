<?php

namespace App\GameEngine;

use App\Models\Person;
use App\Models\Skills;
use Illuminate\Support\Facades\Log;

class FaceOff
{
    public $player1;
    public $player2;

    private $probability = [];

    public Person $winner;

    public function __construct(Skills $player1, Skills $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;

        $this->calculateProbabilities();

        $this->run();
    }

    private function calculateProbabilities(): void
    {
        $player1 = $this->player1->face_offs;
        $player2 = $this->player2->face_offs;
        $total = $player1 + $player2;
        $player1Probability = $player1 / $total;
        $player2Probability = $player2 / $total;

        $this->probability = [$player1Probability * 100, $player2Probability * 100];
    }

    private function run(): void
    {
        $randomize = rand(0, 100);

        if ($randomize <= $this->probability[0]) {
            $this->winner = Person::find($this->player1->person_id);
        } else {
            $this->winner = Person::find($this->player2->person_id);
        }
    }
}
