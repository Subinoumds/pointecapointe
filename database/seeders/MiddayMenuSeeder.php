<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MiddayMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copier les images existantes vers le dossier storage
        $sourceDir = public_path('img/galerie');
        $targetDir = storage_path('app/public/midday-menus');
        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        // Images à copier depuis la galerie
        $images = [
            'DSC06336.jpg',
            'DSC06344.jpg', 
            'DSC06312.jpg',
            'DSC06343.jpg',
            'DSC06315.jpg',
            'vertical1.jpg',
            'vertical2.jpg',
            'vertical3.jpg',
            'vertical4.jpg',
            'vertical5.jpg'
        ];
        
        foreach ($images as $image) {
            $sourcePath = $sourceDir . '/' . $image;
            $targetPath = $targetDir . '/' . $image;
            
            if (file_exists($sourcePath)) {
                copy($sourcePath, $targetPath);
            }
        }
        
        // Créer les menus du midi
        \App\Models\MiddayMenu::create([
            'name' => 'Plat du jour 1',
            'description' => 'Un délicieux plat préparé avec des produits frais du jour',
            'price' => 15.50,
            'image' => 'DSC06336.jpg',
            'sort_order' => 1
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Plat du jour 2',
            'description' => 'Une spécialité de notre chef, élaborée avec soin',
            'price' => 16.00,
            'image' => 'DSC06344.jpg',
            'sort_order' => 2
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Plat du jour 3',
            'description' => 'Un plat traditionnel revisité avec des ingrédients de qualité',
            'price' => 14.50,
            'image' => 'DSC06312.jpg',
            'sort_order' => 3
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Plat du jour 4',
            'description' => 'Une création originale de notre cuisine',
            'price' => 17.00,
            'image' => 'DSC06343.jpg',
            'sort_order' => 4
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Plat du jour 5',
            'description' => 'Un plat équilibré et savoureux pour votre pause déjeuner',
            'price' => 15.00,
            'image' => 'DSC06315.jpg',
            'sort_order' => 5
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Spécialité verticale 1',
            'description' => 'Une présentation originale de nos plats',
            'price' => 16.50,
            'image' => 'vertical1.jpg',
            'sort_order' => 6
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Spécialité verticale 2',
            'description' => 'Une autre création de notre chef',
            'price' => 15.75,
            'image' => 'vertical2.jpg',
            'sort_order' => 7
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Spécialité verticale 3',
            'description' => 'Un plat aux saveurs uniques',
            'price' => 16.25,
            'image' => 'vertical3.jpg',
            'sort_order' => 8
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Spécialité verticale 4',
            'description' => 'Une délicieuse surprise culinaire',
            'price' => 17.50,
            'image' => 'vertical4.jpg',
            'sort_order' => 9
        ]);

        \App\Models\MiddayMenu::create([
            'name' => 'Spécialité verticale 5',
            'description' => 'Un dernier plat pour terminer en beauté',
            'price' => 16.75,
            'image' => 'vertical5.jpg',
            'sort_order' => 10
        ]);
    }
}
