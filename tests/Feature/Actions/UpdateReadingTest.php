<?php

use App\Models\Reading;
use App\Actions\Reading\UpdateReadingAction;
use App\ValueObjects\MakePoints;

it('can update reading', function () {

    Reading::factory()->create();
    $reading = Reading::latest()->first();
    $request = (object)([
        'read' => 'updated_read',
        'notes' => 'updated_notes',
        'prayer_points' => 'updated_points',
        'prayer' => 'updated_prayer',
    ]);

    UpdateReadingAction::handle($reading, $request);

    $this->assertEquals('updated_read', $reading->fresh()->read);
    $this->assertEquals(MakePoints::from('updated_notes'), $reading->fresh()->notes);
    $this->assertEquals(MakePoints::from('updated_points'), $reading->prayer_points);
    $this->assertEquals('updated_prayer', $reading->prayer);
});
