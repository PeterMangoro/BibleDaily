
<?php

test('Teaching Creation success with required fields', function () {
    login();
     $Data = [
        'title'=>'some_data',
        'read'=>'read',
         'notes' => 'notes',
         'prayer_points' => 'null', 
         'prayer'=>'some_data',        
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertRedirect(route('users.teachings.index'));
 });
 

test('Teaching Creation fails without any fields', function () {
   login();
    $emptyData = [];
    $this->post(route('users.teachings.store'), $emptyData)
    ->assertSessionHasErrors();
});

test('Teaching Creation fails without title field', function () {
    login();
     $Data = [   
        'title'=>null,
        'read'=>'some_data',
         'notes' => 'some_data',
         'prayer_points' => 'some_data', 
         'prayer'=>'some_data',         
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertSessionHasErrors();
 });


test('Teaching Creation fails without read field', function () {
    login();
     $Data = [   
        'read'=>null  ,    
         'notes' => 'some_data',
         'prayer_points' => 'some_data',        
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertSessionHasErrors();
 });

 test('Teaching Creation fails without notes field', function () {
    login();
     $Data = [   
        'read'=>'some_data'  ,    
         'notes' => null,
         'prayer_points' => 'some_data',        
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertSessionHasErrors();
 });

 test('Teaching Creation fails without prayer_points field', function () {
    login();
     $Data = [   
        'read'=>'some_data'  ,    
         'notes' => 'null',
         'prayer_points' => null,        
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertSessionHasErrors();
 });
 
 test('Teaching Creation success without prayer fields', function () {
    login();
     $Data = [
        'title'=>'some_data',
        'read'=>'read',
         'notes' => 'notes',
         'prayer_points' => 'null', 
         'prayer'=>null,        
     ];
     $this->post(route('users.teachings.store'), $Data)
     ->assertRedirect(route('users.teachings.index'));
 });
 
