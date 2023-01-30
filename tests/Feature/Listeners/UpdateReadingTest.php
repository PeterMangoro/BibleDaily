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
        'read' => '::update_from_listener',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ]);
    $event = new UpdatingReading($reading,$request);
    $listener = new UpdateReading();
    $listener->handle($event);

    $this->assertDatabaseHas('readings', [
        'verse' => '::update_from_listener'
    ]);
});
