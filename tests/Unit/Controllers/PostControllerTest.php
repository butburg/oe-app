<?php

uses(Tests\TestCase::class)
    ->group('http');

// base test
test('Basetest', function () {
    expect(true)->toBeTrue();
});

//index
test('Find http://localhost/', function () {
    $response = $this->get('/');
    expect($response->status())->toBe(200);
});

test('view login', function () {
    $response = $this->get('/login');
    expect($response->status())->toBe(200);
});

//edit

//update

//create

//store

//destroy

//show

