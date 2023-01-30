<?php

use App\Models\BibleSession;
use App\Models\Reading;
use App\Models\Teaching;
use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Teaching Index page', function () {
    login();
    $this->get(route('users.teachings.index'))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('User/Teaching/Index'));
});

it('returns to the Teaching Index page with user teachings', function () {
    $user = login();
    $session = BibleSession::factory()->create(['user_id' => $user->id])->first();
    
    //User Teaching
    Teaching::factory(2)->create([
        'bible_session_id' => $session->id,
        'title' => 'Read_by_auth_user'
    ]);

    Reading::factory(2)->create([
        'bible_session_id' => $session->id,       
    ]);
    //Other pples Teachings
    Teaching::factory(2)->create([
        'bible_session_id' => 20,
        'title' => 'Not_Read_by_auth_user'
    ]);
    Reading::factory(2)->create([
        'bible_session_id' => 20,       
    ]);
    $this->get(route('users.teachings.index'))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Teaching/Index')
                ->has('data.teachings')
        )
        ->AssertSee('Read_by_auth_user')
        ->AssertDontSee('Not_Read_by_auth_user');
});

it('returns searched user data', function () {
    $user = login();
    $session = BibleSession::factory()->create(['user_id' => $user->id])->first();  

    //To show
    Teaching::factory()->create([
        'bible_session_id' => $session->id,
        'title' => 'To be Searched'
    ]);
    Reading::factory()->create([
        'bible_session_id' => $session->id,       
    ]);

    //Dont Show
    Teaching::factory()->create([
        'bible_session_id' => $session->id+1,
        'title' => '::some data'
    ]);
    Reading::factory(2)->create([
        'bible_session_id' => $session->id+1,       
    ]);
   

    //Other pples Teachings
    Teaching::factory(2)->create([
        'bible_session_id' => 20,
        'title' => 'Searched but not Users'
    ]);
    Reading::factory(2)->create([
        'bible_session_id' => 20,       
    ]);
    $this->get(route('users.teachings.index',array('search'=>'Searched')))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Teaching/Index')
                ->has('data')
        )
        ->AssertSee('To be Searched')
        ->AssertDontSee('Searched but not Users')
        ->AssertDontSee('::some data');
});
