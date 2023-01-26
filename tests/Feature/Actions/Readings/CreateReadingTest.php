<?php

use App\Actions\Reading\CreateReadingAction;
use App\Models\BibleSession;
use App\Services\BibleSessionService;

it('creates a Reading Model', function () {

    login();
    $id = BibleSessionService::new_session();

    $session = BibleSession::find($id);

    $request = (object)([
        'read' => '$request->read',
        'notes' => '$request->notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ]);

    CreateReadingAction::handle($session, $request);
    $this->assertDatabaseHas('readings', [
        'read' => '$request->read'
    ]);
});