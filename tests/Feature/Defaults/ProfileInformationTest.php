<?php

use App\Models\User;

test('profile_information_can_be_updated', function () {
    $this->actingAs($user = User::factory()->create());

    $response = $this->put('/user/profile-information', [
        'name' => 'Test Name',
        'username' => 'test@example.com',
    ]);

    $this->assertEquals('Test Name', $user->name);
    $this->assertEquals('test@example.com', $user->username);
});
