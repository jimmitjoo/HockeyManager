<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GamesCollection;
use App\Http\Resources\TeamResource;
use App\Http\Resources\TeamsCollection;
use App\Models\Team;

class TeamController extends Controller
{
    public function index(): TeamsCollection
    {
        return TeamsCollection::make(Team::latest()->paginate());
    }

    public function show(Team $team): TeamResource
    {
        return TeamResource::make($team);
    }

    public function schedule(Team $team): GamesCollection
    {
        return GamesCollection::make($team->schedule);
    }
}
