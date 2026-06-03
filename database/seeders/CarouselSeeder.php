<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class CarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Copier les images existantes vers le dossier storage
        $sourceDir = public_path('img/carousel');
        $targetDir = storage_path('app/public/carousel');
        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        $carouselImages = [
            'facade1.jpg' => 'Devanture du restaurant',
            'loire1.jpg' => 'Vue sur la Loire en terrasse',
            'facade2.jpg' => 'Autre angle de la terrasse',
            'loire2.jpg' => 'Bords de Loire à Bouchemaine',
            'facade3.jpg' => 'Vue d\'ensemble de l\'établissement'
        ];
        
        $order = 1;
        foreach ($carouselImages as $filename => $altText) {
            $sourcePath = $sourceDir . '/' . $filename;
            $targetPath = $targetDir . '/' . $filename;
            
            if (file_exists($sourcePath)) {
                copy($sourcePath, $targetPath);
            }
            
            Image::create([
                'name' => 'Slide ' . $order,
                'filename' => $filename,
                'path' => 'carousel/' . $filename,
                'alt_text' => $altText,
                'category' => 'carousel',
                'is_active' => true,
                'sort_order' => $order
            ]);
            
            $order++;
        }
    }
}
