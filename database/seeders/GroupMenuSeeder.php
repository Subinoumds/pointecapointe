<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menu Découverte
        \App\Models\GroupMenu::create([
            'name' => 'Menu Découverte',
            'description' => 'Un menu équilibré pour découvrir notre cuisine',
            'price_per_person' => 25.00,
            'entrees' => [
                'Salade de chèvre chaud au miel',
                'Terrine de la ferme des Gravelles'
            ],
            'plats' => [
                'Pièce du boucher, sauce au poivre',
                'Poisson frais du jour, riz basmati'
            ],
            'desserts' => [
                'Mousse au chocolat maison',
                'Crème brûlée'
            ],
            'sort_order' => 1
        ]);

        // Menu Festif
        \App\Models\GroupMenu::create([
            'name' => 'Menu Festif',
            'description' => 'Un menu raffiné pour les grandes occasions',
            'price_per_person' => 35.00,
            'entrees' => [
                'Œufs cocotte aux champignons et rillauds',
                'Velouté de courge aux éclats de noisettes'
            ],
            'plats' => [
                'Magret de canard, écrasé de pommes de terre truffé',
                'Filet de sandre au beurre blanc, fondue de poireaux'
            ],
            'desserts' => [
                'Tarte tatin aux pommes, glace vanille',
                'Gâteau du chef'
            ],
            'sort_order' => 2
        ]);

        // Menu Dégustation
        \App\Models\GroupMenu::create([
            'name' => 'Menu Dégustation',
            'description' => 'Un menu gastronomique pour les amateurs de cuisine',
            'price_per_person' => 45.00,
            'entrees' => [
                'Amuse-bouche du chef',
                'Carpaccio de bœuf aux truffes'
            ],
            'plats' => [
                'Côte de bœuf grillée, légumes de saison',
                'Lotte rôtie aux herbes, risotto crémeux'
            ],
            'desserts' => [
                'Assiette de desserts du chef',
                'Café gourmand'
            ],
            'sort_order' => 3
        ]);
    }
}
