<?php

use App\Events\Create\CreatingTeaching;
use Illuminate\Support\Facades\Event;

//you cant test both at the same time.. i dont know why
test('CreatingTeaching Event is dispatched', function () {
    login();

    Event::fake();
    $this->post(route('users.teachings.store'), [
        'categories' => [1, 2],
        'title' => '::title->from_post',
        'read' => '::read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ])->assertRedirect(route('users.teachings.index'));

    Event::assertDispatched(CreatingTeaching::class);
});

test('CreatingTeaching Event adds a Teaching into Database', function () {
    login();

    $this->post(route('users.teachings.store'), [
        'categories' => [1, 2],
        'title' => '::title->from_post',
        'read' => '::read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ])->assertRedirect(route('users.teachings.index'));

    $this->assertDatabaseHas('teachings', ['title' => '::title->from_post']);
});
