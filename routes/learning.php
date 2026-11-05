<?php

use App\Livewire\Counter;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\Index;
use App\Livewire\Posts\SinglePost;
use Illuminate\Support\Facades\Route;
use App\Livewire\Posts\UpdatePost;

Route::get('/counter', Counter::class);

Route::get('/posts', Index::class);
Route::get('/posts/{post}', SinglePost::class);
Route::get('/create-post', CreatePost::class);
Route::get('/update-posts/{post}', UpdatePost::class);