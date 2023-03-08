<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Confirm Dashboard page', function () {
    
    $this->get(route('confirm-campDashboard'))->assertStatus(200);
});


it('returns with Count props', function () {
 
    $this->get(route('confirm-campDashboard', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/ConfirmDashboard')
                ->has('data.all')
                ->has('data.sunday_school')
                ->has('data.youth')
        );
});
