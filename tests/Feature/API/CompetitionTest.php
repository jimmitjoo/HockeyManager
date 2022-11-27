<?php

test('We can find a list of competitions on its index route', function () {

    $competitions = \App\Models\Competition::factory()->count(5)->create();

    $response = $this->get('/api/competitions');
    $response->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertSee(e($competitions->first()->name))
        ->assertSee(e($competitions->first()->state))
        ->assertSee(e($competitions->first()->country));
});


test('Competition started should update it to in progress when a competition starts', function () {

    $competition = \App\Models\Competition::factory()->create([
        'status' => \App\Statuses\CompetitionStatus::NotStarted->value,
        'starts_at' => now()->subMinutes(2),
        'ends_at' => now()->addMonths(2),
    ]);

    $this->artisan('competitions-run');

    $competition->refresh();

    $this->assertEquals(\App\Statuses\CompetitionStatus::InProgress, $competition->status);
});


test('Competition ended should update it to ended when a competition ends', function () {

    $competition = \App\Models\Competition::factory()->create([
        'status' => \App\Statuses\CompetitionStatus::InProgress,
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->subMinute(),
    ]);

    $this->artisan('competitions-run');

    $competition->refresh();

    $this->assertEquals(\App\Statuses\CompetitionStatus::Ended, $competition->status);
});


test('Create a cup with 8 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::CupPlayOffs,
        'max_teams' => 8,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(8, $competition->teams()->count());
    $this->assertEquals(14, $competition->games()->count());

});

test('Create a cup with 32 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::CupPlayOffs,
        'max_teams' => 32,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(32, $competition->teams()->count());
    $this->assertEquals(62, $competition->games()->count());

});


test('Create a league with 4 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::League,
        'max_teams' => 4,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(4, $competition->teams()->count());
    $this->assertEquals(12, $competition->games()->count());
});

test('Create a league with 14 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::League,
        'max_teams' => 14,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(14, $competition->teams()->count());
    $this->assertEquals(182, $competition->games()->count());
});

test('Create a league with 5 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::League,
        'max_teams' => 5,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(5, $competition->teams()->count());
    $this->assertEquals(16, $competition->games()->count());
});

test('A league can relegate teams', function () {
    $tierOneCompetition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'country' => 'SE',
        'ends_at' => now()->subMinute(),
        'type' => \App\Types\CompetitionType::League,
        'status' => \App\Statuses\CompetitionStatus::InProgress,
        'max_teams' => 4,
        'tier' => 1,
        'relegation' => 2,
        'recurring' => true,
    ]);

    $tierTwoCompetition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'country' => 'SE',
        'ends_at' => now()->subMinute(),
        'type' => \App\Types\CompetitionType::League,
        'status' => \App\Statuses\CompetitionStatus::InProgress,
        'max_teams' => 4,
        'tier' => 2,
        'promotion' => 1,
        'recurring' => true,
    ]);

    \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'country' => 'SE',
        'ends_at' => now()->subMinute(),
        'type' => \App\Types\CompetitionType::League,
        'status' => \App\Statuses\CompetitionStatus::InProgress,
        'max_teams' => 4,
        'tier' => 2,
        'promotion' => 1,
        'recurring' => true,
    ]);

    \Pest\Laravel\artisan('competitions-run');

    $tierOneCompetition->refresh();
    $tierTwoCompetition->refresh();

    $this->assertEquals(\App\Statuses\CompetitionStatus::Ended, $tierOneCompetition->status);
    $this->assertEquals(\App\Statuses\CompetitionStatus::Ended, $tierTwoCompetition->status);

    $relegatedTeamId = $tierOneCompetition->relegatedTeams->pluck('team_id')->toArray();
    $promotedTeamId = $tierTwoCompetition->promotedTeams->pluck('team_id')->toArray();

    $this->assertDatabaseHas('competitions', [
        'name' => $tierOneCompetition->name,
        'status' => \App\Statuses\CompetitionStatus::NotStarted,
        'edition' => $tierOneCompetition->edition + 1,
    ]);

    $newCompetition = \App\Models\Competition::query()
        ->where('name', $tierOneCompetition->name)
        ->where('status', \App\Statuses\CompetitionStatus::NotStarted)
        ->first();

    $newRelegationLeague = \App\Models\Competition::query()
        ->where('name', $tierTwoCompetition->name)
        ->where('status', \App\Statuses\CompetitionStatus::NotStarted)
        ->first();

    $this->assertDatabaseHas('competition_team', [
        'competition_id' => $newCompetition->id,
        'team_id' => $promotedTeamId,
    ]);

    $this->assertEquals(4, $newRelegationLeague->teams()->count());
});
