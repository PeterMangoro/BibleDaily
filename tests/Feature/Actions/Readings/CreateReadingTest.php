<?php

use App\Actions\Reading\CreateReadingAction;
use App\Models\BibleSession;
use App\Services\BibleSessionService;

it('creates a Reading Model', function () {

    login();
    $id = BibleSessionService::newSession();

    $session = BibleSession::find($id);

    $request = (object)([
        'read' => '::read::',
        'notes' => '::notes::',
        'prayer_points' => '::prayer_points::',
        'prayer' => '::prayer::',
    ]);

    CreateReadingAction::handle($session, $request);
    $this->assertDatabaseHas('readings', [
        'verse' => '::read::'
    ]);
});
