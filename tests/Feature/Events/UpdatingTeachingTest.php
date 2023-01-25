<?php

it('has events/updatingteaching page', function () {
    $response = $this->get('/events/updatingteaching');

    $response->assertStatus(200);
});
