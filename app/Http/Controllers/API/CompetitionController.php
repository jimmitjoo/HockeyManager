<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CompetitionsCollection;
use App\Models\Competition;

class CompetitionController extends Controller
{
    public function index()
    {
        return CompetitionsCollection::make(Competition::paginate());
    }
}
