<?php

use App\Actions\Reading\GetReadingsAction;
use App\Models\Reading;

it('is empty when readings table is empty', function () {
   
    $response=GetReadingsAction::handle(new Reading());

$this->assertEmpty($response);
});

it(' gets all readings when readings table is filled', function () {
   Reading::factory(2)->create();
    $response=GetReadingsAction::handle(new Reading());

$this->assertNotEmpty($response);
});
