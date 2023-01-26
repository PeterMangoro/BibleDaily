<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;

it('returns Teachings to the Welcome Index page', function () {
  
    $response = $this->get(route('teachings.index'));

    $response->assertStatus(200);
});

it('returns to a single Teaching Create page', function () {
    login();
    BibleSession::factory()->create(['user_id'=>1]);
    Teaching::factory()->create(['bible_session_id'=>1]);
    Reading::factory()->create(['bible_session_id'=>1]);
   
    $teaching = Teaching::first();

    $response = $this->get(route('teachings.show',[$teaching->slug]));

    $response->assertStatus(200);
});
