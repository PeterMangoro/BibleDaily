<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingTeaching;

test('UpdatingTeaching Event is dispatched', function () {
    login();
    $teaching = Teaching::factory()->create();

    Event::fake();
    $this->put(route('users.teachings.update',$teaching->uuid), [
        'title' => '::updated->title->from_post',
        'read' => '::updated->read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::updated_prayer_from_teachings',
    ])->assertSuccessful();

    Event::assertDispatched(UpdatingTeaching::class);
});

test('UpdatingTeaching Event actualy updates Teaching', function () {
    login();
    BibleSession::factory()->create(['user_id'=>1]);
    
    $teaching = Teaching::factory()->create(['bible_session_id'=>1]);
    Reading::factory()->create(['bible_session_id'=>1]);   
  
   $this->put(route('users.teachings.update',[$teaching->uuid]), [
        'title'=> 'Update_title',
        'read' => '::updated->read->from_post',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::updated_prayer_from_teachings',
    ])->assertSuccessful();

    $this->assertDatabaseHas('readings', ['prayer' => '::updated_prayer_from_teachings']);
    
});

