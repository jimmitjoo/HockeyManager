<?php

use App\Models\Person;
use App\Models\Team;

test('A person has skills', function () {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills);

});

test('A person has a team', function () {

    $person = Person::factory()
        ->hasTeam(Team::factory())
        ->create();

    $this->assertNotNull($person->team);

});
