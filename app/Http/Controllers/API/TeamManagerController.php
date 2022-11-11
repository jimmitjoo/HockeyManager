<?php

namespace App\Http\Controllers\API;

use App\Events\UserBecameManagerOfTeam;
use App\Http\Controllers\Controller;
use App\Http\Requests\BecomeManagerRequest;
use App\Models\Team;
use App\Models\TeamManager;

class TeamManagerController extends Controller
{
    public function store(BecomeManagerRequest $request)
    {
        TeamManager::create([
            'team_id' => $request->team_id,
            'manager_id' => auth()->id(),
        ]);

        $team = Team::find($request->team_id);

        event(new UserBecameManagerOfTeam(auth()->user(), $team));

        return [
            __('You are now the manager of :team', ['team' => $team->name]),
        ];
    }
}
