<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\LegalPageController;

Route::view('/', 'home')->name('home');

Route::get('/docs', [DocController::class,'index'])->name('docs');
Route::get('/docs/{slug}', [DocController::class,'show'])->name('docs.show');

Route::get('/tos', [LegalPageController::class,'show'])->defaults('type','tos')->name('tos');
Route::get('/privacy', [LegalPageController::class,'show'])->defaults('type','privacy')->name('privacy');
Route::get('/legal/history', [LegalPageController::class,'history'])->name('legal.history');

/* Si tu veux laisser robots/sitemap statiques dans public/,
   ne déclare PAS de routes pour eux. Ils seront servis directement. */
