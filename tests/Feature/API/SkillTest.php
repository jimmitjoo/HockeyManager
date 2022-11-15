<?php

use App\Models\Person;

test('Skills has a faceoff skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->face_offs);

});

test('Skills has a defend neutral zone skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->defend_neutral_zone);

});

test('Skills has a attack neutral zone skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->attack_neutral_zone);

});

test('Skills has a defend in zone skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->defend_in_zone);

});

test('Skills has a attack in zone skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->attack_in_zone);

});


test('Skills has a shooting skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->shooting);

});


test('Skills has a goaltending skill', function() {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills->goaltending);

});
