<?php

use App\Actions\Teaching\CreateTeachingAction;
use App\Models\BibleSession;
use App\Services\BibleSessionService;

it('creates a Teaching Model', function () {

    login();
    $id = BibleSessionService::newSession();

    $session = BibleSession::find($id);
    // dd($session);
    $request = (object)([
        'title' => '::title',
        'read' => '::read',

    ]);

    // dd($request);
    CreateTeachingAction::handle($session, $request);
    $this->assertDatabaseHas('teachings', [
        'title' => '::title'
    ]);
});
