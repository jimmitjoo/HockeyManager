<?php

use App\Models\Person;

test('A persons defend neutral zone skills can be calculated', function () {

    $person = Person::factory()->create();
    $person->skills->update([
        'defenseAwareness' => 100,
        'dicipline' => 100,
        'endurance' => 100,
        'durability' => 100,
        'bodyChecking' => 100,
    ]);
    $skill = $person->skills;

    $this->assertEquals(100, $skill->defend_neutral_zone);

    $person->skills->update([
        'defenseAwareness' => 12,
        'dicipline' => 22,
        'endurance' => 45,
        'durability' => 23,
        'bodyChecking' => 75,
    ]);
    $skill2 = $person->skills;

    $this->assertEquals(29, $skill2->defend_neutral_zone);
});


test('A persons attack neutral zone skills can be calculated', function () {

    $person = Person::factory()->create();
    $person->skills->update([
        'offensiveAwareness' => 100,
        'puckControl' => 100,
        'speed' => 100,
        'passing' => 100,
        'endurance' => 100,
    ]);
    $skill = $person->skills;

    $this->assertEquals(100, $skill->attack_neutral_zone);

    $person->skills->update([
        'offensiveAwareness' => 12,
        'puckControl' => 22,
        'speed' => 45,
        'passing' => 23,
        'endurance' => 75,
    ]);
    $skill2 = $person->skills;

    $this->assertEquals(28, $skill2->attack_neutral_zone);
});
