<?php

it('stores a Christian', function () {   
    $this->post(route('campRegister', [
        'name' => '::name::',
        'gender' => '::gender::',
        'contact' => '::contact::',
        'username' => '::username::',
        'dob' => '::dob::',
        'country' => '::country::',
        'province' => '::province::',
        'assembly' => '::assembly::',
        'pastor' => '::pastor::',
        'invite' => '::invite::',
        'need_accommodation' => '::need_accommodation::',
    ]));
    $this->assertDatabaseHas('christians', [
        'name' => '::name::',
    ]);
});

it('redirect to the Thank you page', function () {
    login();
    $this->post(route('campRegister', [
        'name' => '::name::',
        'gender' => '::gender::',
        'contact' => '::contact::',
        'username' => '::username::',
        'dob' => '::dob::',
        'country' => '::country::',
        'province' => '::province::',
        'assembly' => '::assembly::',
        'pastor' => '::pastor::',
        'invite' => '::invite::',
        'need_accommodation' => '::need_accommodation::',
    ]))
        ->assertRedirect(route('campRedirect'));
});

