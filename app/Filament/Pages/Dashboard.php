<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.dashboard';

    // Les cartes "stats" vont ici ⬇️
    public function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    // Les widgets de contenu (tables, quick links, etc.)
    public function getWidgets(): array
    {
        return [
            // ... tes autres widgets de contenu
        ];
    }
}
