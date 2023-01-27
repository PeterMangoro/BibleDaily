<?php

use App\Actions\Teaching\GetTeachingsAction;
use App\Models\Teaching;

it('is empty when readings table is empty', function () {
   
    $response=GetTeachingsAction::handle(new Teaching());

$this->assertEmpty($response);
});

it('gets all readings when readings table is filled', function () {
   Teaching::factory(2)->create();
    $response=GetTeachingsAction::handle(new Teaching());

$this->assertNotEmpty($response);
});

// it('gets only called model', function () {
//     Teaching::factory(2)->create();
//     Teaching::factory()->create(['title'=>'test']);

//     $get_any_one=GetTeachingsAction::handle_one(new Teaching());
//     $get_specific=GetTeachingsAction::handle_one(Teaching::where('title','test'));
 
//     $this->assertIsObject($get_any_one);
//     $this->assertEquals('test',$get_specific->title);
//  });
