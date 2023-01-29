
<?php

test('Reading Creation success with required fields', function () {
    login();
     $Data = [
        'read'=>'read',
         'notes' => 'notes',
         'prayer_points' => 'null',         
     ];
     $this->post(route('users.readings.store'), $Data)
     ->assertRedirect(route('users.readings.index'));
 });
 

test('Reading Creation fails without any fields', function () {
   login();
    $emptyData = [];
    $this->post(route('users.readings.store'), $emptyData)
    ->assertSessionHasErrors();
});

test('Reading Creation fails without read field', function () {
    login();
     $Data = [   
        'read'=>null  ,    
         'notes' => 'some_data',
         'prayer_points' => 'some_data',        
     ];
     $this->post(route('users.readings.store'), $Data)
     ->assertSessionHasErrors();
 });

 test('Reading Creation fails without notes field', function () {
    login();
     $Data = [   
        'read'=>'some_data'  ,    
         'notes' => null,
         'prayer_points' => 'some_data',        
     ];
     $this->post(route('users.readings.store'), $Data)
     ->assertSessionHasErrors();
 });

 test('Reading Creation fails without prayer_points field', function () {
    login();
     $Data = [   
        'read'=>'some_data'  ,    
         'notes' => 'null',
         'prayer_points' => null,        
     ];
     $this->post(route('users.readings.store'), $Data)
     ->assertSessionHasErrors();
 });
 

