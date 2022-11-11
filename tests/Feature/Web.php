<?php

namespace Tests\Feature;

test('We have no web route on the root.', function() {
    $response = $this->get('/');
    $response->assertStatus(404);
});
