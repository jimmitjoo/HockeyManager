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

test('Create a league with 24 teams', function () {

    $competition = \App\Models\Competition::factory()->create([
        'starts_at' => now()->subMonths(2),
        'ends_at' => now()->addMonths(2),
        'type' => \App\Types\CompetitionType::League,
        'max_teams' => 24,
    ]);

    $this->assertEquals(\App\Statuses\CompetitionStatus::NotStarted, $competition->status);
    $this->assertEquals(24, $competition->teams()->count());
    $this->assertEquals(552, $competition->games()->count());
});
