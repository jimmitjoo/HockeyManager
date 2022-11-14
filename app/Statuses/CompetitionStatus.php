<?php

namespace App\Statuses;

enum CompetitionStatus: int
{
    case NotStarted = 0;
    case InProgress = 10;
    case Ended = 20;
}
