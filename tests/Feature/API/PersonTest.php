<?php

use App\Models\Person;

test('A person has skills', function () {

    $person = Person::factory()->create();

    $this->assertNotNull($person->skills);

});
