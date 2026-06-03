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
            ],
            [
                'key' => 'about_title',
                'title' => 'Titre de la section À Propos',
                'content' => 'Notre bistrot',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_title_fresh',
                'title' => 'Titre de l\'engagement - Frais',
                'content' => 'Frais',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_title_local',
                'title' => 'Titre de l\'engagement - Local',
                'content' => 'Local',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_title_homemade',
                'title' => 'Titre de l\'engagement - Fait Maison',
                'content' => 'Fait Maison',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'commitment_title_french',
                'title' => 'Titre de l\'engagement - Français',
                'content' => 'Français',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'rating_value',
                'title' => 'Note Google',
                'content' => '4,8/5',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'rating_text',
                'title' => 'Texte de la note Google',
                'content' => 'Avec une note de 4,8/5 sur Google, nos clients reconnaissent notre engagement envers la qualité et la convivialité.',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'rating_google_link',
                'title' => 'Lien vers les avis Google Maps',
                'content' => 'https://www.google.com/maps/place/Pointe+ça+Pointe/@47.4090721,-0.6205203,17z/data=!4m8!3m7!1s0x4807d56f02983b9f:0x3e0a05775d46d9a2!8m2!3d47.4090721!4d-0.6179454!9m1!1b1!16s%2Fg%2F11t6v5pcg0?hl=fr&entry=ttu&g_ep=EgoyMDI1MDkwMy4wIKXMDSoASAFQAw%3D%3D',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_title',
                'title' => 'Titre de la section des Horaires',
                'content' => 'Venez nous rencontrer : Nos horaires gourmands !',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_lundi',
                'title' => 'Horaires - Lundi',
                'content' => 'Lundi: Fermé',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_mardi',
                'title' => 'Horaires - Mardi',
                'content' => 'Mardi: Fermé',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_mercredi',
                'title' => 'Horaires - Mercredi',
                'content' => 'Mercredi: 11h00–14h00, 18h00–20h45',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_jeudi',
                'title' => 'Horaires - Jeudi',
                'content' => 'Jeudi: 11h00–14h00, 18h00–20h45',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_vendredi',
                'title' => 'Horaires - Vendredi',
                'content' => 'Vendredi: 10h30–14h00, 18h00–21h00',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_samedi',
                'title' => 'Horaires - Samedi',
                'content' => 'Samedi: 10h00–21h00',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'hours_dimanche',
                'title' => 'Horaires - Dimanche',
                'content' => 'Dimanche: 10h30–17h00',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'footer_connect_title',
                'title' => 'Titre de la section de contact',
                'content' => 'Restons connectés : Votre table vous attend !',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'footer_address',
                'title' => 'Adresse postale',
                'content' => '4 Pl. Ruzebouc, 49080 Bouchemaine',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'footer_phone',
                'title' => 'Numéro de téléphone',
                'content' => '+33 2 44 85 55 36',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'footer_email',
                'title' => 'Adresse e-mail de contact',
                'content' => 'direction.papapoule@gmail.com',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'footer_follow_title',
                'title' => 'Titre de la section réseaux sociaux',
                'content' => 'Suivez-nous !',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'social_instagram',
                'title' => 'Lien Instagram',
                'content' => 'https://www.instagram.com/pointecapointe49?igsh=M3BxYTdjcDN1YzF1',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'social_facebook',
                'title' => 'Lien Facebook',
                'content' => 'https://www.facebook.com/PointeCaPointeBouchemaine/',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'carousel_btn1_text',
                'title' => 'Texte du bouton 1 du carrousel',
                'content' => 'Menu',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'carousel_btn1_link',
                'title' => 'Lien du bouton 1 du carrousel',
                'content' => '/menu',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'carousel_btn2_text',
                'title' => 'Texte du bouton 2 du carrousel',
                'content' => 'Repas de groupe',
                'type' => 'text',
                'is_active' => true
            ],
            [
                'key' => 'carousel_btn2_link',
                'title' => 'Lien du bouton 2 du carrousel',
                'content' => '/repas',
                'type' => 'text',
                'is_active' => true
            ]
        ];

        foreach ($contents as $content) {
            Content::updateOrCreate(
                ['key' => $content['key']],
                [
                    'title' => $content['title'],
                    'content' => $content['content'],
                    'type' => $content['type'],
                    'is_active' => $content['is_active']
                ]
            );
        }
    }
}
