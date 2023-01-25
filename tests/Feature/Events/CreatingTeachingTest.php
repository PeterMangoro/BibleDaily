<?php

use App\Events\Create\CreatingTeaching;
use Illuminate\Support\Facades\Event;

test('CreatingTeaching Event is dispatched', function () {
    login();

    Event::fake();
    $response = $this->post(route('users.teachings.store'), [
        'title'=> '$request->title->from_post',
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertSuccessful();

    Event::assertDispatched(CreatingTeaching::class);
});

test('CreatingTeaching Event adds a Teaching into database', function () {
    login();

    $response = $this->post(route('users.teachings.store'), [
        'title'=> '$request->title->from_post',
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertSuccessful();

    $this->assertDatabaseHas('teachings', ['title' => '$request->title->from_post']);

});
