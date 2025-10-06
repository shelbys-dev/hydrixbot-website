<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocController;
use App\Http\Controllers\LegalPageController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

Route::view('/', 'home')->name('home');

// Documentation du bot
Route::get('/docs', [DocController::class, 'index'])->name('docs');
Route::get('/docs/{slug}', [DocController::class, 'show'])->name('docs.show');

// Pages légales : CGU, Politique de confidentialité, historique des versions
Route::get('/tos', [LegalPageController::class, 'show'])->defaults('type', 'tos')->name('tos');
Route::get('/privacy', [LegalPageController::class, 'show'])->defaults('type', 'privacy')->name('privacy');
Route::get('/legal/history', [LegalPageController::class, 'history'])->name('legal.history');

// Route pour récupérer les stats du bot (nombre de serveurs, membres, etc)
Route::get('/bot-stats', function () {
    // petit cache 60s pour pas spammer ton bot en dev
    return Cache::remember('bot_stats', 60, function () {
        $resp = Http::timeout(2)->get(env('BOT_API_URL', 'http://127.0.0.1:3001') . '/api/stats');
        abort_unless($resp->ok(), 502, 'Bot API down');
        return response()->json($resp->json());
    });
});

/* Si tu veux laisser robots/sitemap statiques dans public/,
   ne déclare PAS de routes pour eux. Ils seront servis directement. */
