<?php

use App\Models\Teaching;
use App\Actions\Teaching\UpdateTeaching;

it('can update teaching', function () {

    Teaching::factory()->create();
    $teaching = Teaching::latest()->first();
    $request = (object)([
        'title' => 'updated_teaching',

    ]);

    UpdateTeaching::handle($teaching, $request);

    $this->assertEquals('updated_teaching', $teaching->fresh()->title);
    $this->assertEquals(str('updated_teaching')->slug(), $teaching->slug);
});
