<?php

it('has actions/teachings/getteachingactiontests page', function () {
    $response = $this->get('/actions/teachings/getteachingactiontests');

    $response->assertStatus(200);
});
