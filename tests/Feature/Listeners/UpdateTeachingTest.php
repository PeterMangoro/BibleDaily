<?php

use App\Models\Teaching;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingTeaching;
use App\Listeners\Update\UpdateTeaching;

test('UpdateTeaching Listener is attached to UpdatingTeaching Event', function () {
    Event::fake();
    Event::assertListening(
        UpdatingTeaching::class, #Event
        UpdateTeaching::class    #Listener
    );
});

test('UpdateTeaching Listener actualy creates a Teaching', function () {

     Teaching::factory()->create();
     $teaching =Teaching::first();
    $request = (object)([
        'title' => '$request->update_from_listener',
        'read' => '$request->update_from_teaching_listener',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ]);
    $event = new UpdatingTeaching($teaching,$request);
    $listener = new UpdateTeaching();
    $listener->handle($event);

    $this->assertDatabaseHas('teachings', [
        'title' => '$request->update_from_listener'
    ]);

    $this->assertDatabaseHas('readings', [
        'read' => '$request->update_from_teaching_listener'
    ]);
    
});
