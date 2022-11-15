<?php

namespace App\Listeners;

use Faker\Factory;
use Faker\Provider\Person;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateTeamPlayers
{
    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle($event)
    {
        $countryCodeToLocale = config('manager.country_code_to_locale');

        $locale = $countryCodeToLocale[$event->team->country] ?? 'en_US';
        $person = Factory::create($locale);

        $players = [];
        for ($i = 0; $i < 25; $i++) {

            $players[] = [
                'name' => $person->firstName . ' ' . $person->lastName,
                'age' => $person->numberBetween(16, 32),
                'city' => $person->city,
                'country' => $event->team->country,
            ];
        }

        $event->team->players()->createMany($players);
    }
}
