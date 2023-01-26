<?php

use App\Actions\Teaching\CreateTeachingAction;
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
    CreateTeachingAction::handle($session, $request);
    $this->assertDatabaseHas('teachings', [
        'title' => '$request->title'
    ]);
});
