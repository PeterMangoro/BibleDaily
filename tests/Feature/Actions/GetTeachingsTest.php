<?php

use App\Models\Teaching;

it('can get paginated Teachings', function () {
    
    Teaching::factory(20)->create();

    $this->assertDatabaseCount('teachings', 20);
    
    #yet to find out how to test for pagination

});
