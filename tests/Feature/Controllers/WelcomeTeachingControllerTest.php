<?php

use App\Models\BibleSession;
use App\Models\Classification;
use App\Models\Reading;
use App\Models\Teaching;
use App\Models\User;

it('returns Teachings to the Welcome Index page', function () {
    User::factory()->create();
    $user_id=User::first()->id;
    $id = BibleSession::factory()->create(['user_id' => $user_id])->first()->id;
    Teaching::factory()->create(['bible_session_id' => $id]);
    Reading::factory()->create(['bible_session_id' => $id]);
    Classification::factory()->create([
        'category_id' => 1,
        'teaching_id' => 1,
    ]);
    $this->get(route('teachings.index'))->assertStatus(200);
});

it('returns to a single Teaching Show page', function () {
    User::factory()->create();
    $user_id=User::first()->id;
    $id = BibleSession::factory()->create(['user_id' => $user_id])->first()->id;
    Teaching::factory()->create(['bible_session_id' => $id]);
    Reading::factory()->create(['bible_session_id' => $id]);
    Classification::factory()->create([
        'category_id' => 1,
        'teaching_id' => 1,
    ]);

    $teaching = Teaching::where('bible_session_id', $id)->first();

    $this->get(route('teachings.show', [$teaching->slug]))->assertStatus(200);
});
