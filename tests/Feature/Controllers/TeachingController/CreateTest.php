<?php
use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Teaching Index page', function () {
    login();
   $this->get(route('users.teachings.index'))->assertStatus(200);

});

it('returns with Bible props', function () {
    login();
   $this->get(route('users.teachings.create'))
   ->assertStatus(200)
   ->assertInertia(
    fn (Assert $page) => $page
        ->component('User/Teaching/Create')
        ->has('data.bible')
);    
});
