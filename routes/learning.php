<?php

use App\Livewire\Counter;
use App\Livewire\Posts\Create as CreatePost;
use App\Livewire\Posts\Index as PostIndex;
use App\Livewire\Posts\SinglePost;
use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\Edit as EditPost;

Route::get('/counter', Counter::class);

Route::prefix('/posts')->as('posts.')->group(function () {
    Route::get('/', PostIndex::class)->name('index');
    Route::get('create', CreatePost::class)->name('create');
    Route::get('{post}', SinglePost::class)->name('show');
    Route::get('{post}/edit', EditPost::class)->name('edit');
});