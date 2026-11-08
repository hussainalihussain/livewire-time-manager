<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'as' => 'todos.',
    'prefix' => 'todos/',
    'middleware' => ['auth', 'verified'],
], function () {
    Route::livewire('/', 'pages::todo.index')->name('index');
    Route::livewire('create', 'pages::todo.create')->name('create');
});