<?php

it('returns to the Reading Index page', function () {
    login();
    $response = $this->get(route('users.readings.index'));

    $response->assertStatus(200);
});

it('returns to the Reading Create page', function () {
    login();
    $response = $this->get(route('users.readings.create'));

    $response->assertStatus(200);
});
