<?php

use Illuminate\Support\Facades\Event;
use App\Events\Create\CreatingReading;
use App\Listeners\Create\CreateReading;

test('CreateReading Listener is attached to CreatingReading Event', function () {
    Event::fake();
    Event::assertListening(
        CreatingReading::class, #Event
        CreateReading::class    #Listener
    );
});

test('CreateReading Listener actualy creates a Reading', function () {

    login();
    $request = (object)([
        'read' => '::read_from_listener',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ]);
    $event = new CreatingReading($request);
    $listener = new CreateReading();
    $listener->handle($event);

    $this->assertDatabaseHas('readings', [
        'verse' => '::read_from_listener'
    ]);
});
