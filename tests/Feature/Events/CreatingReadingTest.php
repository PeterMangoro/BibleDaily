<?php

use App\Events\Create\CreatingReading;
use Illuminate\Support\Facades\Event;

#you cant test both at the same time.. i dont know why
test('CreatingReading Event is dispatched', function () {
    login();

    Event::fake();
    $response = $this->post(route('users.readings.store'), [
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertRedirect(route('users.readings.index'));

    Event::assertDispatched(CreatingReading::class);
});
 
test('CreatingReading Event adds a Reading into Database', function () {
    login();

    // Event::fake();
    $response = $this->post(route('users.readings.store'), [
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ])->assertRedirect(route('users.readings.index'));

    $this->assertDatabaseHas('readings', ['verse' => '$request->read->from_post']);

});