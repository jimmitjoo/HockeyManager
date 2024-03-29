<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionTeam extends Model
{
    public $primaryKey = 'ct_id';
    public $timestamps = false;

    protected $hidden = [
        'ct_id',
        'competition_id',
        'team_id',
    ];

    protected $table = 'competition_team';

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
