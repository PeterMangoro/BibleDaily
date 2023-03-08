<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to All who need Accommodation page', function () {
    login();
    $this->get(route('needAccommodation'))->assertStatus(200);
});


it('returns with Count props', function () {
 login();
    $this->get(route('needAccommodation', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Present')
                ->has('data.users')
                
        );
});
