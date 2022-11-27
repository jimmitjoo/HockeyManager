<?php

namespace App\Providers;

use App\Events\CompetitionCreated;
use App\Events\CompetitionEnded;
use App\Events\CompetitionStarted;
use App\Events\EndPeriod;
use App\Events\GameEnded;
use App\Events\GoalScored;
use App\Events\PersonCreated;
use App\Events\StartGame;
use App\Events\StartPeriod;
use App\Events\TeamCreated;
use App\Events\UserBecameManagerOfTeam;
use App\Listeners\CreateCompetitionGames;
use App\Listeners\CreateNewCompetitionEdition;
use App\Listeners\CreateTeamPlayers;
use App\Listeners\SetCompetitionPoints;
use App\Listeners\SetCompetitionStatusToEnded;
use App\Listeners\SetCompetitionStatusToInProgress;
use App\Listeners\SetCompetitionTeams;
use App\Listeners\SetDefaultTeamTactic;
use App\Listeners\SetGameScore;
use App\Listeners\SetGameStatusToStarted;
use App\Listeners\SetPeriodAsEnded;
use App\Listeners\SetPeriodAsStarted;
use App\Listeners\SetPersonSkills;
use App\Listeners\TestListener;
use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StartGame::class => [
            SetGameStatusToStarted::class,
        ],
        GameEnded::class => [
            SetCompetitionPoints::class,
        ],
        StartPeriod::class => [
            SetPeriodAsStarted::class,
        ],
        EndPeriod::class => [
            SetPeriodAsEnded::class,
        ],
        UserBecameManagerOfTeam::class => [
            //
        ],
        CompetitionCreated::class => [
            SetCompetitionTeams::class,
            CreateCompetitionGames::class,
        ],
        CompetitionStarted::class => [
            SetCompetitionStatusToInProgress::class,
        ],
        CompetitionEnded::class => [
            SetCompetitionStatusToEnded::class,
            CreateNewCompetitionEdition::class,
        ],
        TeamCreated::class => [
            CreateTeamPlayers::class,
            SetDefaultTeamTactic::class,
        ],
        PersonCreated::class => [
            SetPersonSkills::class,
        ],
        GoalScored::class => [
            SetGameScore::class,
        ],
    ];

    protected $observers = [
        Game::class => [
            \App\Observers\GameObserver::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
