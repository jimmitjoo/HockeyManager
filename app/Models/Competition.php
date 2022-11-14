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
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class);
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class);
    }
}
