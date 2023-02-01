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
        'title' => '::teaching_from_listener',  
        'read' => '::read_from_listener',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',  
        'categories'=>[1,2,3]    
    ]);
    $event = new CreatingTeaching($request);
    $listener = new CreateTeaching();
    $listener->handle($event);

    $this->assertDatabaseHas('teachings', [
        'title' => '::teaching_from_listener'
    ]);
});
