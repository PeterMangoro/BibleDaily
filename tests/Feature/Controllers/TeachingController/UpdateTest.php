<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;
use App\Models\Classification;

it('updates a Teaching', function () {
    $user = login();
    $session = BibleSession::factory()->create(['user_id' => $user->id])->first();
     
    //User Teaching
    $teaching = Teaching::factory()->create([
        'bible_session_id' => $session->id,
        'title' => '::title'
    ])->first();

    Reading::factory()->create([
        'bible_session_id' => $session->id,       
    ]);

    $this->put(route('users.teachings.update', $teaching->uuid),[
        'title' => '::updated_title',
        'read' => '::updated_read',
        'notes' => '::notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::prayer',
    ]);

    $this->assertDatabaseHas('readings', [
        'verse' => '::updated_read',
    ]);
    $this->assertDatabaseHas('teachings', [
        'title' => '::updated_title',
    ]);
});



