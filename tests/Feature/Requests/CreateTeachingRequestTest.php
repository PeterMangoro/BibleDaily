
<?php

use Illuminate\Support\Arr;

test('Teaching Creation success with required fields', function () {
    login();
    $Data = [
        'title' => '::some_data',
        'read' => '::some_data',
        'notes' => '::some_data',
        'prayer_points' => '::some_data',
        'prayer' => '::some_data',
    ];
    $this->post(route('users.teachings.store'), $Data)
        ->assertRedirect(route('users.teachings.index'));
});

test('Teaching Creation success without prayer field', function () {
    login();
    $Data = [
        'title' => '::some_data',
        'read' => '::some_data',
        'notes' => '::some_data',
        'prayer_points' => '::some_data',
        'prayer' => null,
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

test('Create teaching fails', function ($Data, $key) {
    login();
    $this->post(route('users.teachings.store'), $Data)
        ->assertSessionHasErrors($key);
})->with(
    function () {
        $all = [
            'title' => '::some_data',
            'read' => '::some_data',
            'notes' => '::some_data',
            'prayer_points' => '::some_data',
            'prayer' => '::some_data',
        ];
        [
            yield 'missing title' =>  [
                Arr::except($all, 'title'), 'title'
            ],
            
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
