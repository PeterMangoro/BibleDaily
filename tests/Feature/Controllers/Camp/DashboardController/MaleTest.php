<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to All Present male page', function () {
    login();
    $this->get(route('male'))->assertStatus(200);
});


it('returns with Count props', function () {
 login();
    $this->get(route('male', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Present')
                ->has('data.users')
                
        );
});
