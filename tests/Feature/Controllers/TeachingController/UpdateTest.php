<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;

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

    $this->put(route('users.teachings.update', $teaching->slug),[
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

it('redirect to teachings index page', function () {
    login();
    $user = login();
    $session = BibleSession::factory()->create(['user_id' => $user->id])->first();
   
    //User Teaching
    $teaching = Teaching::factory()->create([
        'bible_session_id' => $session->id,
        'title' => 'Read_by_auth_user'
    ])->first();

    Reading::factory()->create([
        'bible_session_id' => $session->id,       
    ]);  
    
    $this->put(route('users.teachings.update',$teaching->slug ),[
        'title' => '::title::',
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ])
        ->assertRedirect(route('users.teachings.index'));
});

