<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s';
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $bot = DB::connection('mysql_bot');
        $duration = 60; // cache en secondes
        $now = now();

        // Petite fonction locale pour gérer le cache + date
        $getCount = function (string $key, string $table) use ($bot, $duration, $now) {
            return Cache::remember("stats.{$key}", $duration, function () use ($bot, $table, $now, $duration) {
                // On sauvegarde aussi la date de maj dans une clé séparée
                Cache::put("stats.{$table}.updated_at", $now, $duration * 2);
                return $this->safeCount($bot, $table);
            });
        };

        $serversCount = $getCount('servers', 'serverconfig');
        $linksCount   = $getCount('links', 'links_servers');
        $levelsCount  = $getCount('levels', 'levels');

        return [
            $this->makeStat('Serveurs configurés', $serversCount, 'serverconfig'),
            $this->makeStat('Liens', $linksCount, 'links_servers'),
            $this->makeStat('Profils de niveaux', $levelsCount, 'levels'),
        ];
    }

    private function makeStat(string $label, int $value, string $table): Stat
    {
        $updatedAt = Cache::get("stats.{$table}.updated_at");

        $desc = $updatedAt
            ? 'Dernière mise à jour : ' . Carbon::parse($updatedAt)->diffForHumans()
            : 'En attente de première mise à jour…';

        return Stat::make($label, number_format($value))
            ->description($desc);
    }

    private function safeCount($connection, string $table): int
    {
        try {
            return (int) $connection->table($table)->count();
        } catch (\Throwable $e) {
            report($e);
            return 0;
        }
    }
}
