<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\CompetitionsCollection;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        return new CompetitionsCollection(Competition::paginate());
    }

    public function show(Competition $competition)
    {
        return CompetitionResource::make($competition);
    }
}
