<?php

namespace App\Listeners;

use App\Events\CompetitionCreated;
use Faker\Factory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCompetitionTeams
{
    /**
     * Handle the event.
     *
     * @param  CompetitionCreated  $event
     * @return void
     */
    public function handle(CompetitionCreated $event)
    {
        $countryCodeToLocale = config('manager.country_code_to_locale');

        $locale = $countryCodeToLocale[$event->competition->country] ?? 'en_US';
        $faker = Factory::create($locale);

        for ($i = 0; $i < $event->competition->max_teams; $i++) {
            $city = $faker->city;

            $event->competition->teams()->create([
                'name' => $city,
                'city' => $city,
                'country' => $event->competition->country,
            ]);
        }
    }
}
