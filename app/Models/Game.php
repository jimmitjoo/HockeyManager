<?php

namespace App\Models;

use App\Casts\GameTime;
use App\Statuses\GameStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'away_score',
        'home_score',
        'current_time',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'status' => GameStatus::class,
        'current_time' => GameTime::class,
    ];

    public function homeTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam(): BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}
