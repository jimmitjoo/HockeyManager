<?php

namespace App\Types;

enum CompetitionType: int
{
    case League = 0;
    case LeagueQualification = 1;
    case CupPlayOffs = 10;
    case CupWithGroupsOf3 = 20;
    case CupWithGroupsOf4 = 21;
    case CupWithGroupsOf5 = 22;
    case Friendly = 30;

    // get label for status
    public function label(): string
    {
        return match ($this) {
            self::League => __('League'),
            self::LeagueQualification => __('League Qualification'),
            self::CupPlayOffs => __('Cup'),
            self::CupWithGroupsOf3 => __('Cup with groups of 3'),
            self::CupWithGroupsOf4 => __('Cup with groups of 4'),
            self::CupWithGroupsOf5 => __('Cup with groups of 5'),
            self::Friendly => __('Friendly'),
            default => throw new \Exception('Unexpected match value'),
        };
    }

    public static function toSelectOptions(): array
    {
        return [
            self::League->value => __('League'),
            self::LeagueQualification->value => __('League Qualification'),
            self::CupPlayOffs->value => __('Cup'),
            self::CupWithGroupsOf3->value => __('Cup with groups of 3'),
            self::CupWithGroupsOf4->value => __('Cup with groups of 4'),
            self::CupWithGroupsOf5->value => __('Cup with groups of 5'),
            self::Friendly->value => __('Friendly'),
        ];
    }
}
