<?php

namespace App\Actions;

use App\DataTranserObjects\TeamData;
use App\Models\Team;

class CreateTeamAction
{
    public function execute(TeamData $teamData): Team
    {
        return Team::create([
            'name' => $teamData->name,
            'city' => $teamData->city,
            'state' => $teamData->state,
            'country' => $teamData->country,
        ]);
    }
}
