<?php

test('We can find a list of teams on teams index route', function () {

    $teams = \App\Models\Team::factory()->count(5)->create();

    $response = $this->get('/api/teams');
    $response->assertStatus(200)
        ->assertJsonCount(5, 'data')
        ->assertSee(e($teams->first()->name))
        ->assertSee(e($teams->first()->city))
        ->assertSee(e($teams->first()->state))
        ->assertSee(e($teams->first()->country));
});

test('We can see a single team on its route', function () {

        $team = \App\Models\Team::factory()->create();

        $response = $this->get('/api/teams/' . $team->id);
        $response->assertStatus(200)
            ->assertSee(e($team->name))
            ->assertSee(e($team->city))
            ->assertSee(e($team->state))
            ->assertSee(e($team->country));
});


test('We can see a teams schedule', function() {

        $team = \App\Models\Team::factory()->create();

        $games = \App\Models\Game::factory()->count(5)->create([
            'home_team_id' => $team->id,
        ]);

        $response = $this->get('/api/teams/' . $team->id . '/schedule');
        $response->assertStatus(200)
            ->assertJsonCount(5, 'data')
            ->assertSee($games->first()->status)
            ->assertSee($games->first()->current_time)
            ->assertSee($games->first()->home_score)
            ->assertSee($games->first()->away_score);
});

test('A use can become manager of a team', function () {

    $this->actingAs($user = \App\Models\User::factory()->create());

    $team = \App\Models\Team::factory()->create();

    $response = $this->post(route('api.teams.manager.store'), ['team_id' => $team->id]);

    $response->assertStatus(200)
        ->assertSee(__('You are now the manager of :team', ['team' => $team->name]));

    $this->assertDatabaseHas('team_managers', [
        'manager_id' => $user->id,
        'team_id' => $team->id,
    ]);

    $this->assertEquals($user->id, $team->manager->id);
});

test('A guest user cannot become manager of a team', function () {

    $team = \App\Models\Team::factory()->create();

    $response = $this->post(route('api.teams.manager.store', $team->id));

    $response->assertStatus(403);

    $this->assertDatabaseMissing('team_managers', [
        'team_id' => $team->id,
    ]);

    $this->assertNull($team->manager);
});


test('A team should get 25 players when it is created', function () {

        $team = \App\Models\Team::factory()->create();

        $this->assertEquals(25, $team->players->count());
});


test('A team should have a default tactic', function () {

    $team = \App\Models\Team::factory()->create();

    $this->assertNotNull($team->tactic);

});
