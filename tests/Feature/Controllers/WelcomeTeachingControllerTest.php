<?php

use App\Models\Reading;
use App\Models\Teaching;
use App\Models\BibleSession;

it('returns Teachings to the Welcome Index page', function () {
   
    $id =  BibleSession::factory()->create(['user_id'=>1])->first()->id;
   
    Teaching::factory()->create(['bible_session_id'=>$id]);
    Reading::factory()->create(['bible_session_id'=>$id]);
    $this->get(route('teachings.index'))->assertStatus(200);
   
});

it('returns to a single Teaching Show page', function () {
    
    $id = BibleSession::factory()->create(['user_id'=>1])->first()->id;
    Teaching::factory()->create(['bible_session_id'=>$id]);
    Reading::factory()->create(['bible_session_id'=>$id]);
   
    $teaching = Teaching::where('bible_session_id',$id)->first();

   $this->get(route('teachings.show',[$teaching->slug]))->assertStatus(200);

});


