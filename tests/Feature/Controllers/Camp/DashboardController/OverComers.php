<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to All Present OverComers page', function () {
    login();
    $this->get(route('overComers'))->assertStatus(200);
});


it('returns with Count props', function () {
 login();
    $this->get(route('overComers', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Confirm')
                ->has('data.users')
                
        );
});
