<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Types\CompetitionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SwedishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (config('app.env') === 'staging') {
            $duration = now()->addHours(48);
        } else if (config('app.env') === 'production') {
            $duration = now()->addMonths(3);
        } else {
            $duration = now()->addHours(24);
        }

        Competition::factory()->create([
            'name' => 'Elitserien',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 16,
            'meetings' => 2,
            'tier' => 1,
            'recurring' => true,
            'promotion' => 0,
            'relegation' => 4,
        ]);

        Competition::factory()->create([
            'name' => 'Allsvenskan A',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 2,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 3,
        ]);

        Competition::factory()->create([
            'name' => 'Allsvenskan B',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 2,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 3,
        ]);

        Competition::factory()->create([
            'name' => 'Ettan A',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 3,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 0,
        ]);

        Competition::factory()->create([
            'name' => 'Ettan B',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 3,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 0,
        ]);

        Competition::factory()->create([
            'name' => 'Ettan C',
            'country' => 'SE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 3,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 0,
        ]);
    }
}
