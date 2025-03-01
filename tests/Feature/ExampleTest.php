<?php

it('returns a successful response', function () {
    $response = $this->get('/up');

    $response->assertStatus(200);
});

it('returns a error in login', function () {
    $response = $this->json('POST', '/api/login', [], ['accept' => 'application/json']);

    $response->assertStatus(422);
});
