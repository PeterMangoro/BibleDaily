<?php

use App\Models\Christian;
use Inertia\Testing\AssertableInertia as Assert;

// it('returns to the All Present Registered page', function () {
//     Christian::factory()->create();
//     login();
//     $this->get(route('all'))->assertStatus(200);
// });


it('Marks a user as present', function () {
 login();
 Christian::factory()->create(['status'=>null]);
 $id=Christian::latest()->first()->id;
    $this->post(route('attend',[$id] ))
    ->assertStatus(302);       
        
});
