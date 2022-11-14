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

    // get label for status
    public function label(): string
    {
        return match ($this) {
            self::NotStarted => __('Not Started'),
            self::FirstPeriod => __('First Period'),
            self::FirstPeriodEnded => __('First Period Ended'),
            self::SecondPeriod => __('Second Period'),
            self::SecondPeriodEnded => __('Second Period Ended'),
            self::ThirdPeriod => __('Third Period'),
            self::ThirdPeriodEnded => __('Third Period Ended'),
            self::Overtime => __('Overtime'),
            self::OvertimeEnded => __('Overtime Ended'),
            self::Penalties => __('Penalties'),
            self::Ended => __('Ended'),
            default => throw new \Exception('Unexpected match value'),
        };
    }
}
