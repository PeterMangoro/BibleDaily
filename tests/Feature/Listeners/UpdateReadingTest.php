<?php

use App\Models\Reading;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingReading;
use App\Listeners\Update\UpdateReading;

test('UpdateReading Listener is attached to UpdatingReading Event', function () {
    Event::fake();
    Event::assertListening(
        UpdatingReading::class, #Event
        UpdateReading::class    #Listener
    );
});

test('UpdateReading Listener actualy creates a Reading', function () {

     Reading::factory()->create();
     $reading =Reading::first();
    $request = (object)([
        'read' => '$request->update_from_listener',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ]);
    $event = new UpdatingReading($reading,$request);
    $listener = new UpdateReading();
    $listener->handle($event);

    $this->assertDatabaseHas('readings', [
        'verse' => '$request->update_from_listener'
    ]);
});
