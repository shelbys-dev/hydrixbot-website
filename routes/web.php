<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;

Route::view('/', 'home')->name('home');

Route::get('/docs', [DocController::class,'index'])->name('docs');
Route::get('/docs/{slug}', [DocController::class,'show'])->name('docs.show');

Route::view('tos', '/terms/tos')->name('tos');
Route::view('privacy', '/terms/privacy')->name('privacy');

/* Si tu veux laisser robots/sitemap statiques dans public/,
   ne déclare PAS de routes pour eux. Ils seront servis directement. */
