<?php

it('stores a Teaching', function () {
    login();
    $this->post(route('users.teachings.store', [
        'title' => '::title::',
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ]));
    $this->assertDatabaseHas('readings', [
        'verse' => '::read::',
    ]);
    $this->assertDatabaseHas('teachings', [
        'title' => '::title::',
    ]);
});

it('redirect to teachings index page', function () {
    login();
    $this->post(route('users.teachings.store', [
        'title' => '::title::',
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ]))
        ->assertRedirect(route('users.teachings.index'));
});

