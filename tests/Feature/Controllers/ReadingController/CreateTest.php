<?php
use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Reading Create page', function () {
    login();
   $this->get(route('users.readings.create'))->assertStatus(200);    
});

it('returns with Bible props', function () {
    login();
   $this->get(route('users.readings.create'))
   ->assertStatus(200)
   ->assertInertia(
    fn (Assert $page) => $page
        ->component('User/Reading/Create')
        ->has('data.bible')
);    
});
