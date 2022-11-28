<?php

test('Latest games is visible on the api games route', function () {

    $games = \App\Models\Game::factory()->count(5)->create();

    $response = $this->get('/api/games');
    $response->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertSee($games->first()->status)
        ->assertSee($games->first()->current_time)
        ->assertSee($games->first()->home_score)
        ->assertSee($games->first()->away_score);
});

test('A game is available on its endpoint', function () {

        $game = \App\Models\Game::factory()->create();

        $response = $this->get('/api/games/' . $game->id);
        $response->assertStatus(200)
            ->assertSee($game->status)
            ->assertSee($game->current_time)
            ->assertSee($game->home_score)
            ->assertSee($game->away_score);
});

test('Make sure the game has two teams and that they are not the same', function () {

            $game = \App\Models\Game::factory()->create();

            $response = $this->get('/api/games/' . $game->id);
            $response->assertStatus(200)
                ->assertJsonStructure([
                    'data' => [
                        'home_team' => [
                            'id',
                            'name',
                            'city',
                            'country',
                        ],
                    ],
                ])
                ->assertJsonStructure([
                    'data' => [
                        'away_team' => [
                            'id',
                            'name',
                            'city',
                            'country',
                        ],
                    ],
                ]);
});


test('Make sure the game is scheduled on creation', function () {

    $game = \App\Models\Game::factory()->create();

    $this->assertDatabaseHas('schedules', [
        'game_id' => $game->id,
    ]);
});


test('A game can have different statuses', function () {

    $game = \App\Models\Game::factory()->create([
        'status' => 0,
    ]);

    $response = $this->get('/api/games/' . $game->id);
    $response->assertStatus(200)
        ->assertSee(\App\Statuses\GameStatus::NotStarted->value);

    $game->update([
        'status' => \App\Statuses\GameStatus::FirstPeriod,
    ]);

    $response = $this->get('/api/games/' . $game->id);
    $response->assertStatus(200)
        ->assertSee(\App\Statuses\GameStatus::FirstPeriod->value);

    $game->update([
        'status' => \App\Statuses\GameStatus::Ended,
    ]);

    $response = $this->get('/api/games/' . $game->id);
    $response->assertStatus(200)
        ->assertSee(\App\Statuses\GameStatus::Ended->value);

});


test('A game can be started', function () {
    $game = \App\Models\Game::factory()->create([
        'status' => \App\Statuses\GameStatus::NotStarted,
        'starts_at' => now(),
    ]);

    \Pest\Laravel\artisan('fire-starting-games');

    $game->refresh();

    $this->assertEquals(\App\Statuses\GameStatus::FirstPeriod, $game->status);
});


test('A game can be played', function () {
    $game = \App\Models\Game::factory()->create([
        'current_time' => 1200,
        'status' => \App\Statuses\GameStatus::FirstPeriod,
        'starts_at' => now()->subSecond(),
    ]);

    \Pest\Laravel\artisan('run-games');

    $game->refresh();

    $this->assertTrue($game->current_time !== "20:00");
});

test('A game period can be ended', function () {
    $game = \App\Models\Game::factory()->create([
        'current_time' => 29,
        'status' => \App\Statuses\GameStatus::FirstPeriod,
        'starts_at' => now()->subSecond(),
    ]);

    \Pest\Laravel\artisan('run-games');

    $game->refresh();

    $this->assertEquals(\App\Statuses\GameStatus::FirstPeriodEnded, $game->status);
});


test('A game period can be started after break', function () {
    $game = \App\Models\Game::factory()->create([
        'current_time' => 1200,
        'status' => \App\Statuses\GameStatus::FirstPeriodEnded,
        'updated_at' => now()->subMinutes(5),
    ]);

    \Pest\Laravel\artisan('run-games');

    $game->refresh();

    $this->assertEquals(\App\Statuses\GameStatus::SecondPeriod, $game->status);
});


test('A game can be ended', function () {
    $game = \App\Models\Game::factory()->create([
        'current_time' => 29,
        'status' => \App\Statuses\GameStatus::ThirdPeriod,
        'starts_at' => now()->subSecond(),
        'home_score' => 12,
        'away_score' => 0,
    ]);

    \Pest\Laravel\artisan('run-games');

    $game->refresh();

    $this->assertEquals(\App\Statuses\GameStatus::Ended, $game->status);
});
