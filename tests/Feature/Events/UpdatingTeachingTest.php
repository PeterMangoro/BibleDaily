<?php

use App\Models\Teaching;
use Illuminate\Support\Facades\Event;
use App\Events\Update\UpdatingTeaching;


test('UpdatingTeaching Event is dispatched', function () {
    login();
    Teaching::factory()->create();
    // // Event::fake();
   
    // $teaching = Teaching::first();
    // Event::fake();
    // $response = $this->put(route('users.teachings.update',[$teaching->slug]), [
    //     'read' => '$request->updated->read->from_post',
    //     'notes' => '$request->notes',
    //     'prayer_points' => '$request->prayer_points',
    //     'prayer' => '$request->updated_prayer_from_teachings',
    // ])->assertSuccessful();

    // $this->assertDatabaseHas('readings', ['prayer' => '$request->updated_prayer_from_teachings']);
    // Event::assertDispatched(UpdatingTeaching::class);
});
