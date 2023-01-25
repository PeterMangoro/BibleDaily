<?php

use App\Models\Teaching;
use App\Models\BibleSession;
use App\Services\TeachingService;
use App\ValueObjects\MakePoints;
use App\Services\BibleSessionService;

test('that teaching service can create a new teaching ', function () {
    login();
    BibleSessionService::new_session();
    $session = BibleSession::first();
    $request = (object)([
        'title' => 'Genesis4:8',        
    ]);
    TeachingService::new_teaching($session, $request);

    $this->assertDatabaseHas('teachings', [
        'title' => 'Genesis4:8'
    ]);
});

it('that teaching service can update an existing teaching ', function () {
    Teaching::factory()->create();
    $teaching = Teaching::first();

    $request = (object)([
        'title' => 'updated_teaching_title',       
    ]);
    TeachingService::update_teaching($teaching, $request);

    $this->assertEquals('updated_teaching_title', $teaching->fresh()->title);
    
});
