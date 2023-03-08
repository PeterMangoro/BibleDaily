<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Confirm All Registered page', function () {
    
    $this->get(route('confirm-all'))->assertStatus(200);
});


it('returns with Count props', function () {
 
    $this->get(route('confirm-all', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Confirm')
                ->has('data.users')
                
        );
});
