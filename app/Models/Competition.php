<?php

namespace App\Models;

use App\Events\CompetitionCreated;
use App\Statuses\CompetitionStatus;
use App\Types\CompetitionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Competition extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => CompetitionCreated::class,
    ];

    protected $casts = [
        'type' => CompetitionType::class,
        'status' => CompetitionStatus::class,
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'recurring' => 'boolean',
    ];

    protected $fillable = [
        'name',
        'country',
        'type',
        'tier',
        'status',
        'edition',
        'promotion',
        'relegation',
        'max_teams',
        'recurring',
        'starts_at',
        'ends_at',
    ];

    public function leagueTable(): HasMany
    {
        return $this->hasMany(CompetitionTeam::class)
            ->with('team')
            ->orderBy('points', 'desc')
            ->orderBy('goals_for', 'desc')
            ->orderBy('goals_against', 'asc');
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }

    public function getRelegatedTeamsAttribute()
    {
        return $this->leagueTable->reverse()->take($this->relegation);
    }

    public function getPromotedTeamsAttribute()
    {
        return $this->leagueTable->take($this->promotion);
    }
}
