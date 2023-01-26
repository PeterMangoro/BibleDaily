<?php

it('returns to the Teaching Index page', function () {
    login();
    $response = $this->get(route('users.teachings.index'));

    $response->assertStatus(200);
});

it('returns to the Teaching Create page', function () {
    login();
    $response = $this->get(route('users.teachings.create'));

    $response->assertStatus(200);
});
