<?php

it('returns to the Reading Create page', function () {
    login();
    $response = $this->get(route('users.readings.create'));

    $response->assertStatus(200);
});
