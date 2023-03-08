<?php

use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Confirm Dashboard page', function () {
    login();
    $this->get(route('campDashboard'))->assertStatus(200);
});


it('returns with Count props', function () {
 login();
    $this->get(route('campDashboard', ))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('Camp/Dashboard')
                ->has('data.all')
                ->has('data.sunday_school')
                ->has('data.youth')
        );
});
