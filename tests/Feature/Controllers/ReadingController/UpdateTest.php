<?php

use App\Models\Reading;

test('UpdatingReading Event is actually Updates Teaching', function () {
    login();
    $reading = Reading::factory()->create()->first();

    $this->put(route('users.readings.update', [$reading->uuid]), [
        'read' => '::updated->read->from_post',
        'notes' => '::updated_notes',
        'prayer_points' => '::prayer_points',
        'prayer' => '::updated_prayer',
    ])->assertSuccessful();

    $this->assertDatabaseHas('readings', ['notes' => '::updated_notes']);
});
