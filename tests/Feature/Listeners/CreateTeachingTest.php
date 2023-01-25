<?php

use Illuminate\Support\Facades\Event;
use App\Events\Create\CreatingTeaching;
use App\Listeners\Create\CreateTeaching;

test('CreateTeaching Listener is attached to CreatingTeaching Event', function () {
    Event::fake();
    Event::assertListening(
        CreatingTeaching::class, #Event
        CreateTeaching::class    #Listener
    );
});

test('CreateTeaching Listener actualy creates a Teaching', function () {

    login();
    $request = (object)([
        'title' => '$request->teaching_from_listener',  
        'read' => '$request->read_from_listener',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',      
    ]);
    $event = new CreatingTeaching($request);
    $listener = new CreateTeaching();
    $listener->handle($event);

    $this->assertDatabaseHas('teachings', [
        'title' => '$request->teaching_from_listener'
    ]);
});
