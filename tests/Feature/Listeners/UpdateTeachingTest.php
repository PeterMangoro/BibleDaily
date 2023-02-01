<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\Classification;
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

test('UpdateTeaching Listener actualy updates a Teaching', function () {

    Teaching::factory()->create(['bible_session_id'=>1]);
    Reading::factory()->create(['bible_session_id'=>1]);
     $teaching =Teaching::first();
    $request = (object)([
        'title' => '::update_from_listener',
        'read' => '::update_from_teaching_listener',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
        'categories'=>[1,2]
    ]);

    $event = new UpdatingTeaching($teaching,$request);
    $listener = new UpdateTeaching();
    $listener->handle($event);

    $this->assertDatabaseHas('teachings', [
        'title' => '::update_from_listener'
    ]);

    $this->assertDatabaseHas('readings', [
        'verse' => '::update_from_teaching_listener'
    ]);
    
});
