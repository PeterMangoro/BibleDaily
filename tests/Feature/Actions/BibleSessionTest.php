<?php

use App\Models\BibleSession;
use App\Services\BibleSessionService;


it('returns its id on creation', function () {
    login();
    $id = BibleSessionService::newSession();

    $this->assertEquals($id, BibleSession::find($id)->id);
});

it('adds a bible session', function () {
    $user = login();
    BibleSessionService::newSession();

    $this->assertDatabaseHas('bible_sessions', [
        'user_id' => $user->id,
    ]);
});
