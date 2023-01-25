<?php

it('has events/creatingteaching page', function () {
    $response = $this->get('/events/creatingteaching');

    $response->assertStatus(200);
});
