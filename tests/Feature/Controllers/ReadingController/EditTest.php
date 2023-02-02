<?php

use App\Models\Reading;
use Inertia\Testing\AssertableInertia as Assert;

it('returns to the Reading Edit Page', function () {
    login();
    $reading = Reading::factory()->create()->uuid;

    $this->get(route('users.readings.edit', $reading))
        ->assertStatus(200)
        ->assertInertia(fn (Assert $page) => $page
            ->component('User/Reading/Edit'));
});

it('returns with Bible props', function () {
    login();
    $reading = Reading::factory()->create()->uuid;

    $this->get(route('users.readings.edit', $reading))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Reading/Edit')
                ->has('data.bible')
        );
});

it('returns with Reading props', function () {
    login();
    $reading = Reading::factory()->create()->first();

    $this->get(route('users.readings.edit', $reading->uuid))
        ->assertStatus(200)
        ->assertInertia(
            fn (Assert $page) => $page
                ->component('User/Reading/Edit')
                ->has(
                    'data.reading',
                    fn (Assert $page) => $page
                        ->where('uuid', $reading->uuid)
                        ->where('read_date', $reading->created_at)
                        ->where('read_verses', $reading->verse)
                        ->where('notes', $reading->notes)
                        ->where('prayer_points', $reading->prayer_points)
                    // ->etc()
                )
        );
});
