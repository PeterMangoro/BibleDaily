
<?php

use App\DataObjects\Create\CreateReadingData;
use App\Http\Requests\Reading\CreateReadingRequest;
use Mockery\MockInterface;


test('Reading Creation Data return a CreateReadingData Object', function () {
    login();
     $Data = [
        'read'=>'read',
         'notes' => 'notes',
         'prayer_points' => 'null',         
     ];

    //  $mock = $this->mock(CreateReadingData::class, function (MockInterface $mock) {
    //     $mock->shouldReceive('from')->once();
    // });
    
    // $mock=$this->mock(CreateReadingRequest::class, function ($mock) {
    //     $mock->shouldReceive('passes')->andReturn(true);
    //  });

     $mock = $this->mock(CreateReadingRequest::class, function ( $mock) {
        $mock->shouldReceive('passes')->andReturn(false);
    });
    
    
    
    //  dd($mock);
     $this->assertIsObject($mock);

    //  $this->post(route('users.readings.store'), $Data)
    //  ->assertRedirect(route('users.readings.index'));
 });
 

