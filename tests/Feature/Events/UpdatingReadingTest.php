<?php

use App\Models\Reading;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingReading;


test('UpdatingReading Event is dispatched', function () {
    login();
    Reading::factory()->create();
     
    $reading = Reading::first();
    Event::fake();
    $this->put(route('users.readings.update',[$reading->id]), [
        'read' => '::updated->read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::updated_prayer',
    ])->assertSuccessful();

    Event::assertDispatched(UpdatingReading::class);
});

test('UpdatingReading Event is actually Updates Teaching', function () {
    login();
    Reading::factory()->create();     
    $reading = Reading::first();
  
    $this->put(route('users.readings.update',[$reading->id]), [
        'read' => '::updated->read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::updated_prayer',
    ])->assertSuccessful();

    $this->assertDatabaseHas('readings', ['prayer' => '::updated_prayer']);
   
});
