<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to  All Registered page', function () {
    login();
    $this->get(route('all'))->assertStatus(200);
});


it('returns with Count props', function () {
 login();
    $this->get(route('all', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Present')
                ->has('data.users')
                
        );
});
