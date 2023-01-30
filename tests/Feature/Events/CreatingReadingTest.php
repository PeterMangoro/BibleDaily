<?php

use App\Events\Create\CreatingReading;
use Illuminate\Support\Facades\Event;

#you cant test both at the same time.. i dont know why
test('CreatingReading Event is dispatched', function () {
    login();

    Event::fake();
    $response = $this->post(route('users.readings.store'), [
        'read' => '::read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ])->assertRedirect(route('users.readings.index'));

    Event::assertDispatched(CreatingReading::class);
});
 
test('CreatingReading Event adds a Reading into Database', function () {
    login();

    // Event::fake();
    $response = $this->post(route('users.readings.store'), [
        'read' => '::read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ])->assertRedirect(route('users.readings.index'));

    $this->assertDatabaseHas('readings', ['verse' => '::read->from_post']);

});