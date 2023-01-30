
<?php

use Illuminate\Support\Arr;

test('Reading Creation success with required fields', function () {
    login();
    $Data = [
        'read' => '::some_data',
        'notes' => '::some_data',
        'prayer_points' => '::some_data',
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

test('Create reading fails', function ($Data, $key) {
    login();
    $this->post(route('users.readings.store'), $Data)
        ->assertSessionHasErrors($key);
})->with(
    function () {
        $all = [
            'read' => '::some_data',
            'notes' => '::some_data',
            'prayer_points' => '::some_data',
        ];
        [
            yield 'missing read' =>  [
                Arr::except($all, 'read'), 'read'
            ],

            yield 'missing notes' =>  [
                Arr::except($all, 'notes'), 'notes'
            ],

            yield 'missing prayer_points' =>  [
                Arr::except($all, 'prayer_points'), 'prayer_points'
            ],
        ];
    }
);
