<?php

namespace App\Statuses;

enum CompetitionStatus: int
{
    case NotStarted = 0;
    case InProgress = 10;
    case Ended = 20;

    // get label for status
    public function label(): string
    {
        return match ($this) {
            self::NotStarted => __('Not Started'),
            self::InProgress => __('In Progress'),
            self::Ended => __('Ended'),
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
