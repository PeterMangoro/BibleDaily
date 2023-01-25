<?php

use App\Models\Reading;
use App\Models\BibleSession;
use App\Services\ReadingService;
use App\ValueObjects\MakePoints;
use App\Services\BibleSessionService;

test('that reading service can create a new reading ', function () {
    login();
    BibleSessionService::new_session();
    $session = BibleSession::first();
    $request = (object)([
        'read' => 'Genesis4:8',
        'notes' => 'randon notes',
        'prayer_points' => '$request->prayer_points',
        'prayer' => '$request->prayer',
    ]);
    ReadingService::new_reading($session, $request);

    $this->assertDatabaseHas('readings', [
        'read' => 'Genesis4:8'
    ]);
});

test('that reading service can update an existing reading ', function () {
    Reading::factory()->create();
    $reading = Reading::first();

    $request = (object)([
        'read' => 'updated_read',
        'notes' => 'updated_notes',
        'prayer_points' => 'updated_points',
        'prayer' => 'updated_prayer',
    ]);
    ReadingService::update_reading($reading, $request);

    $this->assertEquals('updated_read', $reading->fresh()->read);
    $this->assertEquals(MakePoints::from('updated_notes'), $reading->fresh()->notes);
    $this->assertEquals(MakePoints::from('updated_points'), $reading->prayer_points);
    $this->assertEquals('updated_prayer', $reading->prayer);
});
