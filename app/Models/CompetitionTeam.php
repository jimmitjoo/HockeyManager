<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionTeam extends Model
{
    public $primaryKey = 'ct_id';
    public $timestamps = false;

    protected $table = 'competition_team';
}
