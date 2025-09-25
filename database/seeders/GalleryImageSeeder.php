<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GalleryImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer le dossier storage/gallery s'il n'existe pas
        $targetDir = storage_path('app/public/gallery');
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Copier les images existantes vers le dossier storage
        $sourceDir = public_path('img/galerie');
        $images = [
            'DSC06123.jpg', 'DSC06108.jpg', 'DSC06147.jpg', 'DSC06265.jpg', 'DSC06275.jpg',
            'DSC06284.jpg', 'DSC06285.jpg', 'DSC06298.jpg', 'DSC06300.jpg', 'DSC06122.jpg',
            'DSC06312.jpg', 'DSC06315.jpg', 'DSC06317.jpg', 'DSC06336.jpg', 'DSC06343.jpg',
            'DSC06344.jpg', 'DSC06345.jpg', 'DSC06351.jpg', 'DSC06367.jpg', 'DSC06370.jpg',
            'DSC06278.jpg', 'DSC06374.jpg', 'DSC06392.jpg', 'DSC06395.jpg', 'DSC06396.jpg',
            'DSC06397.jpg', 'DSC06401.jpg', 'DSC06405.jpg', 'DSC06279.jpg', 'DSC06450.jpg',
            'DSC06455.jpg', 'DSC06459.jpg', 'DSC06460.jpg', 'DSC06468.jpg', 'DSC06472.jpg',
            'DSC06121.jpg', 'vertical2.jpg', 'vertical3.jpg', 'vertical4.jpg', 'vertical5.jpg'
        ];

        foreach ($images as $index => $image) {
            $sourcePath = $sourceDir . '/' . $image;
            $targetPath = $targetDir . '/' . $image;
            
            if (file_exists($sourcePath)) {
                copy($sourcePath, $targetPath);
                
                // Créer l'entrée en base de données
                \App\Models\GalleryImage::create([
                    'filename' => $image,
                    'alt_text' => 'Pointe ça Pointe gallery image',
                    'is_active' => true,
                    'sort_order' => $index + 1
                ]);
            }
        }
    }
}
