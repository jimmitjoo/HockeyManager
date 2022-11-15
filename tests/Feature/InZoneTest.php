<?php

use App\Models\Person;

test('A persons defend in zone skills can be calculated', function () {

    $person = Person::factory()->create();
    $person->skills->update([
        'defenseAwareness' => 100,
        'aggressiveness' => 100,
        'shotBlocking' => 100,
        'stickChecking' => 100,
        'discipline' => 100,
        'bodyChecking' => 100,
    ]);
    $skill = $person->skills;

    $this->assertEquals(100, $skill->defend_in_zone);

    $person->skills->update([
        'defenseAwareness' => 12,
        'aggressiveness' => 29,
        'shotBlocking' => 29,
        'discipline' => 22,
        'stickChecking' => 45,
        'bodyChecking' => 75,
    ]);
    $skill2 = $person->skills;

    $this->assertEquals(32, $skill2->defend_in_zone);
});


test('A persons attack in zone skills can be calculated', function () {

    $person = Person::factory()->create();
    $person->skills->update([
        'offensiveAwareness' => 100,
        'aggressiveness' => 100,
        'puckControl' => 100,
        'agility' => 100,
        'passing' => 100,
        'vision' => 100,
    ]);
    $skill = $person->skills;

    $this->assertEquals(100, $skill->attack_in_zone);

    $person->skills->update([
        'offensiveAwareness' => 12,
        'aggressiveness' => 17,
        'puckControl' => 17,
        'agility' => 22,
        'passing' => 33,
        'vision' => 44,
    ]);
    $skill2 = $person->skills;

    $this->assertEquals(22, $skill2->attack_in_zone);
});
