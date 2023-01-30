<?php

use App\Models\BibleSession;
use App\Models\Reading;
use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Reading Index page', function () {
    login();
    $this->get(route('users.readings.index'))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('User/Reading/Index'));
});

it('returns to the Reading Index page with user data', function () {
    $user = login();
    BibleSession::factory()->create(['user_id' => $user->id]);
    $session = BibleSession::where('user_id', $user->id)->first();

    //User Reading
    Reading::factory(2)->create([
        'bible_session_id' => $session->id,
        'verse' => 'Read_by_auth_user'
    ]);

    //Other pples Readings
    Reading::factory(2)->create([
        'bible_session_id' => 20,
        'verse' => 'Not_Read_by_auth_user'
    ]);
    $this->get(route('users.readings.index'))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Reading/Index')
                ->has('data')
        )
        ->AssertSee('Read_by_auth_user')
        ->AssertDontSee('Not_Read_by_auth_user');
});



it('returns to the Reading Create page', function () {
    login();
    $response = $this->get(route('users.readings.create'));

    $response->assertStatus(200);
});
