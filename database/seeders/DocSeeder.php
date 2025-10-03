<?php

namespace Database\Seeders;

use App\Models\Doc;
use Illuminate\Database\Seeder;

class DocSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['title' => 'Introduction', 'slug' => 'introduction', 'content' => 'Bienvenue sur la doc de Hydrix Bot', 'position' => 1],
            ['title' => 'Commandes', 'slug' => 'commandes', 'content' => 'Liste des commandes disponibles...', 'position' => 2],
            ['title' => 'Configuration', 'slug' => 'configuration', 'content' => 'Guide de configuration...', 'position' => 3],
        ];

        foreach ($items as $i) {
            Doc::updateOrCreate(['slug' => $i['slug']], $i);
        }
    }
}
