<?php

namespace Database\Seeders;

use App\Models\Doc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocImportFromJsonSeeder extends Seeder
{
    public function run(): void
    {
        $path = base_path('storage/app/docs.json');
        if (!file_exists($path)) {
            $this->command->warn("Fichier $path introuvable.");
            return;
        }

        $json = json_decode(file_get_contents($path), true) ?? [];

        $position = 1;
        foreach ($json as $item) {
            $title = trim($item['title'] ?? 'Sans titre');
            $slug  = trim($item['slug'] ?? Str::slug($title));
            $content = $item['content'] ?? '';
            $pos = (int)($item['position'] ?? $position);

            Doc::updateOrCreate(
                ['slug' => $slug],
                [
                    'title'    => $title,
                    'content'  => $content,
                    'position' => $pos > 0 ? $pos : $position,
                ]
            );

            $position++;
        }

        $this->command->info('Import des docs terminé ✅');
    }
}
