<?php

namespace App\Nova;

use App\Nova\Filters\GameStatusFilter;
use App\Statuses\CompetitionStatus;
use App\Statuses\GameStatus;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Game extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Game>
     */
    public static $model = \App\Models\Game::class;

    public function title()
    {
        return $this->homeTeam->name . ' - ' . $this->awayTeam->name;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'homeTeam.name',
        'awayTeam.name',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Number::make(__('Round'), 'round'),
            BelongsTo::make(__('Competition'), 'competition', Competition::class),
            Text::make(__('Status'), fn() => $this->status->label()),
            Text::make(__('Starts At'), fn() => $this->starts_at->format('d/m H:i')),
            DateTime::make(__('Starts At'), 'starts_at')->onlyOnForms()->sortable(),
            BelongsTo::make(__('Home Team'), 'homeTeam', Team::class),
            BelongsTo::make(__('Away Team'), 'awayTeam', Team::class),
            Text::make(__('Score'), fn() => $this->home_score . ' - ' . $this->away_score),
            Text::make(__('Current Time'), 'current_time')->readonly(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
            new GameStatusFilter(),
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
