<?php

use App\Actions\Teaching\CreateTeaching;
use App\Models\BibleSession;
use App\Services\BibleSessionService;

it('creates a Teaching Model', function () {

    login();
    $id = BibleSessionService::new_session();

    $session = BibleSession::find($id);
    // dd($session);
    $request = (object)([
        'title' => '$request->title',

    ]);

    // dd($request);
    CreateTeaching::handle($session, $request);
    $this->assertDatabaseHas('teachings', [
        'title' => '$request->title'
    ]);
});
