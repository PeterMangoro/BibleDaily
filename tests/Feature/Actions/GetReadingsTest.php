<?php

use App\Models\Reading;

it('can get paginated Readings', function () {
    
    Reading::factory(20)->create();

    $this->assertDatabaseCount('readings', 20);
    
    #yet to find out how to test for pagination

});
