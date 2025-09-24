<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            [
                'key' => 'home_title',
                'title' => 'Titre principal de la page d\'accueil',
                'content' => 'Pointe ça Pointe',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'home_subtitle',
                'title' => 'Sous-titre de la page d\'accueil',
                'content' => 'Bistrot sur les bords de Loire à Bouchemaine',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'about_text',
                'title' => 'Texte de présentation du bistrot',
                'content' => 'Bienvenue à Pointe ça Pointe, votre destination culinaire à Bouchemaine. Notre bistrot est un lieu de partage et de convivialité, où la passion de la cuisine se marie avec un cadre exceptionnel. Situé au cœur de la ville, nous offrons une expérience gastronomique authentique, mettant en valeur les saveurs de notre région.',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_fresh',
                'title' => 'Engagement - Frais',
                'content' => 'Des produits toujours frais, préparés quotidiennement pour garantir qualité et saveur.',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_local',
                'title' => 'Engagement - Local',
                'content' => 'Nous privilégions les producteurs locaux pour soutenir notre économie régionale.',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_homemade',
                'title' => 'Engagement - Fait Maison',
                'content' => 'Toutes nos preparations sont artisanales, réalisées avec passion dans nos cuisines.',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_french',
                'title' => 'Engagement - Français',
                'content' => 'Nous valorisons les produits français et le savoir-faire de nos artisans.',
                'type' => 'text',
                'is_active' => true
            ]
        ];

        foreach ($contents as $content) {
            Content::create($content);
        }
    }
}
