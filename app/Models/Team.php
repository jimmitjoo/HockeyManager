<?php

namespace App\Models;

use App\Events\TeamCreated;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Team extends Model
{
    use HasFactory;

    protected $dispatchesEvents = [
        'created' => TeamCreated::class,
    ];

    protected $fillable = [
        'name',
        'city',
        'state',
        'country',
    ];

    public function manager(): HasOneThrough
    {
        return $this->hasOneThrough(
            User::class,
            TeamManager::class,
            'team_id',
            'id',
            'id',
            'manager_id',
        )->whereNull('team_managers.resigned_at');
    }

    public function homeGames(): HasMany
    {
        return $this->hasMany(Game::class, 'home_team_id');
    }

    public function awayGames(): HasMany
    {
        return $this->hasMany(Game::class, 'away_team_id');
    }

    public function schedule()
    {
        $homeGames = $this->homeGames();
        $awayGames = $this->awayGames();

        return $homeGames->union($awayGames)->orderBy('starts_at');
    }

    public function competitions(): BelongsToMany
    {
        return $this->belongsToMany(Competition::class);
    }

    public function players(): BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }

    public function tactic(): HasOne
    {
        return $this->hasOne(Tactic::class);
    }
}
