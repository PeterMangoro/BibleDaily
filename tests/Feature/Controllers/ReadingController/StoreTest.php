<?php

it('stores a Reading', function () {
    login();
    $this->post(route('users.readings.store', [
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ]));
    $this->assertDatabaseHas('readings', [
        'verse' => '::read::',
    ]);
});

it('redirect to readings index page', function () {
    login();
    $this->post(route('users.readings.store', [
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ]))
        ->assertRedirect(route('users.readings.index'));
});

