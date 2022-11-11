<?php

namespace App\Statuses;

enum GameStatus: int
{
    case NotStarted = 0;
    case FirstPeriod = 10;
    case FirstPeriodEnded = 11;
    case SecondPeriod = 20;
    case SecondPeriodEnded = 21;
    case ThirdPeriod = 30;
    case ThirdPeriodEnded = 31;
    case Overtime = 40;
    case OvertimeEnded = 41;
    case Penalties = 50;
    case Ended = 60;
}
