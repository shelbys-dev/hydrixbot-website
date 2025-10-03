<?php

namespace Database\Seeders;

use App\Models\NavLink;
use Illuminate\Database\Seeder;

class NavLinkSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['label' => 'Accueil',   'url' => '/',         'position' => 1],
            ['label' => 'Docs',      'url' => '/docs',     'position' => 2],
            ['label' => 'ToS',       'url' => '/tos',      'position' => 3],
            ['label' => 'Privacy',   'url' => '/privacy',  'position' => 4],
            // Exemple externe :
            // ['label' => 'GitHub', 'url' => 'https://github.com/Hydaria', 'is_external' => true, 'position' => 99],
        ];

        foreach ($items as $i) {
            NavLink::updateOrCreate(
                ['url' => $i['url']],
                array_merge([
                    'label' => $i['label'],
                    'is_external' => $i['is_external'] ?? false,
                    'is_active' => true,
                ], ['position' => $i['position'] ?? 0])
            );
        }
    }
}