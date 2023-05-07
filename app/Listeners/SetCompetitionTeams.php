<?php

namespace App\Listeners;

use App\Events\CompetitionCreated;
use App\Models\Competition;
use App\Types\CompetitionType;
use Faker\Factory;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SetCompetitionTeams
{
    /**
     * Handle the event.
     *
     * @param CompetitionCreated $event
     * @return void
     */
    public function handle(CompetitionCreated $event)
    {
        if ($event->competition->type === CompetitionType::LeagueQualification) {
            return;
        }

        if ($previousEdition = Competition::query()
            ->where('name', $event->competition->name)
            ->where('country', $event->competition->country)
            ->where('edition', $event->competition->edition - 1)
            ->first()
        ) {
            // Get the teams from the previous edition that was not promoted or relegated
            $lastSeasonTeamIds = $previousEdition->leagueTable->take($previousEdition->max_teams - $previousEdition->relegation);
            $lastSeasonTeamIds = $lastSeasonTeamIds->reverse()->take($previousEdition->max_teams - $previousEdition->relegation - $previousEdition->promotion)->pluck('team_id');
            $event->competition->teams()->attach($lastSeasonTeamIds);

            // Get all promoted teams from lower tier
            $lowerTier = Competition::query()
                ->where('country', $event->competition->country)
                ->where('edition', $event->competition->edition - 1)
                ->where('tier', $event->competition->tier + 1)
                ->where('promotion', '>', 0)
                ->get();

            $higherTier = Competition::query()
                ->where('country', $event->competition->country)
                ->where('edition', $event->competition->edition - 1)
                ->where('tier', $event->competition->tier - 1)
                ->where('relegation', '>', 0)
                ->get();

            // Get all teams on current tier to prevent duplicate promotions
            $sameTier = Competition::query()
                ->where('name', $event->competition->name)
                ->where('country', $event->competition->country)
                ->where('edition', $event->competition->edition)
                ->where('tier', $event->competition->tier)
                ->where('relegation', '>', 0)
                ->get();

            $sameTierTeamIds = $sameTier->map(function ($competition) {
                return $competition->leagueTable->pluck('team_id');
            })->flatten();

            $relegationTeamPot = $higherTier->map(function ($competition) {
                return $competition->relegatedTeams->pluck('team_id');
            })->flatten()->toArray();

            $promotionTeamPot = [];
            foreach ($lowerTier as $competition) {
                // if not in $sameTierTeamIds, add to $teamPot
                $promotionTeamPot = array_merge($promotionTeamPot, $competition->promotedTeams->pluck('team_id')->filter(function ($teamId) use ($sameTierTeamIds) {
                    return !$sameTierTeamIds->contains($teamId);
                })->toArray());

                // if in $sameTierTeamIds, add to $rekegationTeamPot
                $relegationTeamPot = array_merge($relegationTeamPot, $competition->relegatedTeams->pluck('team_id')->filter(function ($teamId) use ($sameTierTeamIds) {
                    return !$sameTierTeamIds->contains($teamId);
                })->toArray());
            }

            shuffle($promotionTeamPot);
            shuffle($relegationTeamPot);

            $event->competition->teams()->attach(array_slice($promotionTeamPot, 0, $event->competition->relegation));
            $event->competition->teams()->attach(array_slice($relegationTeamPot, 0, $event->competition->promotion));
            return;
        }

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
