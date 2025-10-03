<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/docs', 'docs')->name('docs');
Route::view('tos', '/terms/tos')->name('tos');
Route::view('privacy', '/terms/privacy')->name('privacy');

/* Si tu veux laisser robots/sitemap statiques dans public/,
   ne déclare PAS de routes pour eux. Ils seront servis directement. */
