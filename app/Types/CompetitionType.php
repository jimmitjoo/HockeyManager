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
}
