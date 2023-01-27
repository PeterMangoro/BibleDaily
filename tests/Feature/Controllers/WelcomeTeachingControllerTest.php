<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;

it('returns Teachings to the Welcome Index page', function () {
    //   login();
    BibleSession::factory()->create(['user_id'=>1]);
    $id = BibleSession::latest()->first()->id;
    // dd($id);
    Teaching::factory()->create(['bible_session_id'=>$id]);
    Reading::factory()->create(['bible_session_id'=>$id]);
    $response = $this->get(route('teachings.index'));

    $response->assertStatus(200);
});

it('returns to a single Teaching Create page', function () {
    // login();
    BibleSession::factory()->create(['user_id'=>1]);
    $id = BibleSession::latest()->first()->id;
    Teaching::factory()->create(['bible_session_id'=>$id]);
    Reading::factory()->create(['bible_session_id'=>$id]);
   
    $teaching = Teaching::where('bible_session_id',$id)->first();

    $response = $this->get(route('teachings.show',[$teaching->slug]));

    $response->assertStatus(200);
});


