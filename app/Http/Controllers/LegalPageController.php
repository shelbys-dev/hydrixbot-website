<?php

namespace App\Http\Controllers;

use App\Models\LegalPage;

class LegalPageController extends Controller
{
    public function show(string $type)
    {
        $page = LegalPage::latestFor($type);
        abort_if(!$page, 404);

        $history = LegalPage::where('type', $type)
            ->orderByDesc('effective_date')->orderByDesc('id')->get();

        return view('legal.show', compact('page', 'history'));
    }

    public function history()
    {
        return view('legal.history', [
            'tos'     => LegalPage::where('type', 'tos')->orderByDesc('effective_date')->orderByDesc('id')->get(),
            'privacy' => LegalPage::where('type', 'privacy')->orderByDesc('effective_date')->orderByDesc('id')->get(),
        ]);
    }
}
