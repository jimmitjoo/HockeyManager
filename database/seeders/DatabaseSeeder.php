<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Competition;
use App\Types\CompetitionType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // if env is staging, set duration to 48 hours
        // if env is production, set duration to 3 months
        if (config('app.env') === 'staging') {
            $duration = now()->addHours(48);
        } else if (config('app.env') === 'production') {
            $duration = now()->addMonths(3);
        } else {
            $duration = now()->addHours(24);
        }

        \App\Models\User::factory()->create([
            'name' => 'Jimmie Johansson',
            'email' => 'jimmitjoo@gmail.com',
            'password' => bcrypt('password'),
        ]);

        /*Competition::factory()->create([
            'name' => 'España',
            'country' => 'ES',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'max_teams' => 8,
            'meetings' => 2,
        ]);

        Competition::factory()->create([
            'name' => 'Ligue',
            'country' => 'FR',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'max_teams' => 8,
            'meetings' => 2,
        ]);

        Competition::factory()->create([
            'name' => 'Liga',
            'country' => 'DE',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'max_teams' => 8,
            'meetings' => 2,
        ]);

        Competition::factory()->create([
            'name' => 'League',
            'country' => 'US',
            'type' => CompetitionType::League,
            'starts_at' => now(),
            'ends_at' => now()->addMonth(),
            'max_teams' => 8,
            'meetings' => 2,
        ]);*/
    }
}
