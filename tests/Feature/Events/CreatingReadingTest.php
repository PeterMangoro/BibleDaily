<?php

use App\Events\Create\CreatingReading;
use Illuminate\Support\Facades\Event;

test('CreatingReading Event is dispatched', function () {
    Event::fake();
 
        $response = $this->post(route('users.readings.store'), [
        'read' => '$request->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
        ])
            ->assertSuccessful();
 
        $this->assertDatabaseHas('users', ['read' => '$request->read->from_post']);
 
        Event::assertDispatched(CreatingReading::class);
});
