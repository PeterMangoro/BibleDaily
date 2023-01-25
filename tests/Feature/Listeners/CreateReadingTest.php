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
        'read' => '$request->read_from_listener',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ]);
    $event = new CreatingReading($request);
    $listener = new CreateReading();
    $listener->handle($event);

    $this->assertDatabaseHas('readings', [
        'read' => '$request->read_from_listener'
    ]);
});
