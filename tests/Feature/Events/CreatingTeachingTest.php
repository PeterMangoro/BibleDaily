<?php

use App\Events\Create\CreatingTeaching;
use Illuminate\Support\Facades\Event;

#you cant test both at the same time.. i dont know why
test('CreatingTeaching Event is dispatched', function () {
    login();

    Event::fake();
    $response = $this->post(route('users.teachings.store'), [
        'title' => '$request->title->from_post',
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertRedirect(route('users.teachings.index'));

    Event::assertDispatched(CreatingTeaching::class);
});
 
test('CreatingTeaching Event adds a Teaching into Database', function () {
    login();

    // Event::fake();
    $response = $this->post(route('users.teachings.store'), [
        'title' => '$request->title->from_post',
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertRedirect(route('users.teachings.index'));

    $this->assertDatabaseHas('teachings', ['title' => '$request->title->from_post']);

});