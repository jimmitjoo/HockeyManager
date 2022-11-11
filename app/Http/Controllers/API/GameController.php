<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\GameResource;
use App\Http\Resources\GamesCollection;
use App\Models\Game;

class GameController extends Controller
{
    public function index(): GamesCollection
    {
        return GamesCollection::make(Game::latest()->paginate());
    }

    public function show(Game $game): GameResource
    {
        return GameResource::make($game);
    }
}
