<?php

use App\Models\Reading;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingReading;


test('UpdatingReading Event is dispatched', function () {
    login();
    Reading::factory()->create();
     
    $reading = Reading::first();
    Event::fake();
    $response = $this->put(route('users.readings.update',[$reading->id]), [
        'read' => '$request->updated->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->updated_prayer',
    ])->assertSuccessful();

    Event::assertDispatched(UpdatingReading::class);
});

test('UpdatingReading Event is actually Updates Teaching', function () {
    login();
    Reading::factory()->create();     
    $reading = Reading::first();
  
    $response = $this->put(route('users.readings.update',[$reading->id]), [
        'read' => '$request->updated->read->from_post',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->updated_prayer',
    ])->assertSuccessful();

    $this->assertDatabaseHas('readings', ['prayer' => '$request->updated_prayer']);
   
});
