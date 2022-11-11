<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Team extends Model
{
    use HasFactory;

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

        return $homeGames->union($awayGames)->latest();
    }
}
