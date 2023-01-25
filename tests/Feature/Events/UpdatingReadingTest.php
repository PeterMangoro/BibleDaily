<?php

use App\Models\Reading;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingReading;


test('UpdatingReading Event is dispatched', function () {
    login();
    Reading::factory()->create();
    // Event::fake();
   
    $reading = Reading::first();
    Event::fake();
    $response = $this->put(route('users.readings.update',[$reading->id]), [
        'read' => '$request->updated->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->updated_prayer',
    ])->assertSuccessful();

    // $this->assertDatabaseHas('readings', ['prayer' => '$request->updated_prayer']);
    Event::assertDispatched(UpdatingReading::class);
});
