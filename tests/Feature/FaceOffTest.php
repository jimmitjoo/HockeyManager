<?php

use App\Models\Person;

test('A persons face off skills can be calculated', function () {

    $person = Person::factory()->create();
    $person->skills->update([
        'faceOffs' => 100,
        'aggressiveness' => 100,
        'strength' => 100,
        'balance' => 100,
        'agility' => 100,
    ]);
    $skill = $person->skills;

    // A faceoff is calculated by the skills in faceOffs, aggressiveness /2, strength/2, balance/2 and agility/3
    // So max is 100 + 50 + 50 + 50 + 33 = 283 , which means the skill is the sum divided by 2.83
    // 283 / 2.83 = 100
    $this->assertEquals(100, $skill->face_offs);

    $person->skills->update([
        'faceOffs' => 12,
        'aggressiveness' => 22,
        'strength' => 45,
        'balance' => 23,
        'agility' => 75,
    ]);
    $skill2 = $person->skills;

        // 12 + 11 + 22 + 11 + 25 = 81, which means the skill is the sum divided by 2.83
    // 81 / 2.83 = 28.6 - this rounds to 29

    $this->assertEquals(29, $skill2->face_offs);
});
