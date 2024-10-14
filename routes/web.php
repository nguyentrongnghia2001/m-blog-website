<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('web.pages.home.index');
Route::get('/blog', [HomeController::class, 'blog'])->name('web.pages.blog.index');
Route::get('/detail', [HomeController::class, 'detail'])->name('web.pages.blog.detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('web.pages.contact.index');