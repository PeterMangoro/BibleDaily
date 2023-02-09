<?php

use App\Models\Teaching;
use App\Models\BibleSession;
use App\Services\TeachingService;
use App\ValueObjects\MakePoints;
use App\Services\BibleSessionService;

test('that teaching service can create a new teaching ', function () {
    login();
    BibleSessionService::newSession();
    $session = BibleSession::first();
    $request = (object)([
        'title' => 'Genesis4:8',
        'read' => '::Genesis4:8',
    ]);
    TeachingService::newTeaching($session, $request);

    $this->assertDatabaseHas('teachings', [
        'title' => 'Genesis4:8'
    ]);
});

it('that teaching service can update an existing teaching ', function () {
    Teaching::factory()->create();
    $teaching = Teaching::first();

    $request = (object)([
        'title' => '::updated_teaching_title',
    ]);
    TeachingService::updateTeaching($teaching, $request);

    $this->assertEquals('::updated_teaching_title', $teaching->fresh()->title);
});

test('that teaching service can get teachings ', function () {
    Teaching::factory(2)->create();

    $response = TeachingService::getTeachings(new Teaching());

    $this->assertNotEmpty($response);
});

test('that Teaching Service gets only called model', function () {
    Teaching::factory(2)->create();
    Teaching::factory()->create(['title' => 'test']);

    $get_any_one = TeachingService::getTeaching(new Teaching());
    $get_specific = TeachingService::getTeaching(Teaching::where('title', 'test'));

    $this->assertIsObject($get_any_one);
    $this->assertEquals('test', $get_specific->title);
});
