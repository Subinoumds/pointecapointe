<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiddayMenuCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menu du marché
        \App\Models\MiddayMenuCard::create([
            'title' => 'Menu du marché',
            'subtitle' => 'Prix : 16,50 € (entrée + plat ou plat + dessert)',
            'price' => 16.50,
            'items' => [
                [
                    'type' => 'Entrée',
                    'name' => 'Salade de saison aux légumes rôtis et vinaigrette maison.',
                    'description' => ''
                ],
                [
                    'type' => 'Plat',
                    'name' => 'Poisson frais du jour, riz basmati et sauce au beurre blanc.',
                    'description' => ''
                ],
                [
                    'type' => 'Dessert',
                    'name' => 'Crème brûlée à la vanille bourbon.',
                    'description' => ''
                ]
            ],
            'sort_order' => 1,
            'is_active' => true
        ]);

        // Formule express
        \App\Models\MiddayMenuCard::create([
            'title' => 'Formule express',
            'subtitle' => 'Prix : 13,50 € (plat seul)',
            'price' => 13.50,
            'items' => [
                [
                    'type' => 'Plat',
                    'name' => 'Un plat unique qui change chaque semaine, préparé par le chef.',
                    'description' => ''
                ]
            ],
            'sort_order' => 2,
            'is_active' => true
        ]);
    }
}
