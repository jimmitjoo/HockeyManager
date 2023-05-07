<?php

namespace Database\Seeders;

use App\Models\Competition;
use App\Types\CompetitionType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DanishSeeder extends Seeder
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
            'name' => 'Ligaen',
            'country' => 'DK',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 1,
            'recurring' => true,
            'promotion' => 0,
            'relegation' => 4,
        ]);

        Competition::factory()->create([
            'name' => '1. Division A',
            'country' => 'DK',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 2,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 0,
        ]);

        Competition::factory()->create([
            'name' => '1. Division B',
            'country' => 'DK',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => $duration,
            'max_teams' => 12,
            'meetings' => 2,
            'tier' => 2,
            'recurring' => true,
            'promotion' => 2,
            'relegation' => 0,
        ]);
    }
}
