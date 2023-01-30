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

it('returns searched user data', function () {
    $user = login();
    BibleSession::factory()->create(['user_id' => $user->id]);
    $session = BibleSession::where('user_id', $user->id)->first();

    //To show
    Reading::factory()->create([
        'bible_session_id' => $session->id,
        'verse' => 'To be Searched'
    ]);

    //Dont Show
    Reading::factory()->create([
        'bible_session_id' => $session->id,
        'verse' => '::some data'
    ]);

    //Other pples Readings
    Reading::factory(2)->create([
        'bible_session_id' => 20,
        'verse' => 'Searched but not Users'
    ]);
    $this->get(route('users.readings.index',array('search'=>'Searched')))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Reading/Index')
                ->has('data')
        )
        ->AssertSee('To be Searched')
        ->AssertDontSee('Searched but not Users')
        ->AssertDontSee('::some data');
});
