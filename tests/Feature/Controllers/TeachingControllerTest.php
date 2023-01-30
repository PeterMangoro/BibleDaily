<?php

use App\Models\Teaching;

it('returns to the Teaching Index page', function () {
    login();
    $response = $this->get(route('users.teachings.index'));

    $response->assertStatus(200);
});

it('returns to the Teaching Create page', function () {
    login();
    $response = $this->get(route('users.teachings.create'));

    $response->assertStatus(200);
});

// it('returns to the Teaching Edit page', function () {
//     login();
//     Teaching::factory()->create();
//     $teaching = Teaching::first();
//     $response = $this->get(route('users.teachings.edit',$teaching->slug));

//     $response->assertStatus(200);
// });