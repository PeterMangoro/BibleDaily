<?php

it('has events/updatingreading page', function () {
    $response = $this->get('/events/updatingreading');

    $response->assertStatus(200);
});
