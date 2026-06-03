<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Entrées
        \App\Models\MenuItem::create([
            'name' => 'Œufs, Mayonnaise Maison Revisitée',
            'type' => 'entree',
            'price' => 6.00,
            'sort_order' => 1
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Saint Marcelin Pané, Miel et Lards fumés',
            'type' => 'entree',
            'price' => 9.00,
            'sort_order' => 2
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Terrine « Ferme des Gravelles »',
            'type' => 'entree',
            'price' => 8.00,
            'sort_order' => 3
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Œufs cocotte, duxelles de champignons et Rillauds',
            'type' => 'entree',
            'price' => 10.00,
            'sort_order' => 4
        ]);

        // Plats
        \App\Models\MenuItem::create([
            'name' => 'Pièce du Boucher V.F, sauce vin rouge, Frites Maison',
            'type' => 'plat',
            'price' => 20.00,
            'sort_order' => 1
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Tartare de Bœuf V.F Poêlé, préparé par le Chef, Frites Maison',
            'type' => 'plat',
            'price' => 18.00,
            'sort_order' => 2
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Poisson Frais du Jour, Beurre Blanc Maison, Risotto',
            'type' => 'plat',
            'price' => 18.50,
            'sort_order' => 3
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Mijoté du Chef',
            'type' => 'plat',
            'price' => 17.00,
            'sort_order' => 4
        ]);

        // Burgers
        \App\Models\MenuItem::create([
            'name' => 'Le Pointu',
            'type' => 'burger',
            'description' => 'Steak V.F, Cheddar Affiné, Mayo Revisitée, Cornichons, Champignons',
            'price' => 18.00,
            'sort_order' => 1
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Le Savoyard',
            'type' => 'burger',
            'description' => 'Steak V.F, Raclette, Mayo Revisitée, Lard, Cornichons, Champignons',
            'price' => 18.00,
            'sort_order' => 2
        ]);

        // Menu Enfant
        \App\Models\MenuItem::create([
            'name' => 'Steak ou Poisson, frites maison + Brownie',
            'type' => 'menu_enfant',
            'price' => 12.50,
            'sort_order' => 1
        ]);

        // Desserts
        \App\Models\MenuItem::create([
            'name' => 'Crème brulée au Caramel Salé',
            'type' => 'dessert',
            'price' => 7.00,
            'sort_order' => 1
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Mousse au Chocolat Pralinée',
            'type' => 'dessert',
            'price' => 8.00,
            'sort_order' => 2
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Baba au Rhum',
            'type' => 'dessert',
            'price' => 8.00,
            'sort_order' => 3
        ]);
        
        \App\Models\MenuItem::create([
            'name' => 'Glaces Bio Artisanales (pot 120mL)',
            'type' => 'dessert',
            'price' => 5.50,
            'sort_order' => 4
        ]);

        // Boissons fraîches
        \App\Models\Drink::create([
            'name' => 'Breizh Cola',
            'category' => 'boissons_fraiches',
            'sort_order' => 1
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Breizh Cola Zéro',
            'category' => 'boissons_fraiches',
            'sort_order' => 2
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Orangina',
            'category' => 'boissons_fraiches',
            'sort_order' => 3
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Rauch tea (Pêche, Menthe, Citron)',
            'category' => 'boissons_fraiches',
            'sort_order' => 4
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Schweppes Agrumes',
            'category' => 'boissons_fraiches',
            'sort_order' => 5
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Plancoët',
            'category' => 'boissons_fraiches',
            'sort_order' => 6
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Cidre Doux "Val de Rance"',
            'category' => 'boissons_fraiches',
            'sort_order' => 7
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Diabolo',
            'category' => 'boissons_fraiches',
            'sort_order' => 8
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Jus de fruits RAUCH',
            'category' => 'boissons_fraiches',
            'sort_order' => 9
        ]);

        // Apéritifs et digestifs
        \App\Models\Drink::create([
            'name' => 'Kir pétillant / Kir vin blanc',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 1
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Coupe de Crémant',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 2
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Ricard, Martini, Whisky, Rhum...',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 3
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Cognac, Cointreau, Baileys...',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 4
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Limoncello, Irish Coffee',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 5
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Mojito, Pina Colada, Spritz, Gin To',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 6
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Cocktails (avec ou sans alcool)',
            'category' => 'aperitifs_digestifs',
            'sort_order' => 7
        ]);

        // Boissons chaudes & Eaux
        \App\Models\Drink::create([
            'name' => 'Café, Déca, Café crème',
            'category' => 'boissons_chaudes',
            'sort_order' => 1
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Thé, Tisane, Chocolat, Cappucino',
            'category' => 'boissons_chaudes',
            'sort_order' => 2
        ]);
        
        \App\Models\Drink::create([
            'name' => 'Eau pétillante _ PLANCOET',
            'category' => 'boissons_chaudes',
            'sort_order' => 3
        ]);

        // Copier les images de vins existantes vers le dossier storage
        $sourceDir = public_path('img/vins');
        $targetDir = storage_path('app/public/vins');
        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        
        $wineImages = [
            'chateaudebellevue.jpg',
            'chinon.jpg',
            'domainedestrottieres.jpg',
            'prieuredanus.jpg',
            'domainepiedflond.jpg',
            'plandedieu.jpg',
            'chateaudebudos.jpg',
            'chenindomainedestrottieres.jpg',
            'domaineprieuredaunis.jpg'
        ];
        
        foreach ($wineImages as $image) {
            $sourcePath = $sourceDir . '/' . $image;
            $targetPath = $targetDir . '/' . $image;
            
            if (file_exists($sourcePath)) {
                copy($sourcePath, $targetPath);
            }
        }

        // Vins
        \App\Models\Wine::create([
            'name' => 'Savennière « Château de Bellevue »',
            'image' => 'chateaudebellevue.jpg',
            'glass_price' => 8.00,
            'bottle_price' => 32.00,
            'sort_order' => 1
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Chinon « Domaine Raffault »',
            'image' => 'chinon.jpg',
            'glass_price' => 6.50,
            'bottle_price' => 26.00,
            'sort_order' => 2
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Anjou Chenin « Domaine des Trottières »',
            'image' => 'domainedestrottieres.jpg',
            'glass_price' => 6.00,
            'bottle_price' => 22.00,
            'sort_order' => 3
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Saumur « Domaine Prieure d\'Aunis »',
            'image' => 'prieuredanus.jpg',
            'glass_price' => 6.50,
            'bottle_price' => 25.00,
            'sort_order' => 4
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Anjou « Domaine Pied Flond »',
            'image' => 'domainepiedflond.jpg',
            'glass_price' => 6.00,
            'bottle_price' => 24.00,
            'sort_order' => 5
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Côte du Rhône Village « Rhonéa VISAN »',
            'image' => 'plandedieu.jpg',
            'glass_price' => 7.00,
            'bottle_price' => 28.00,
            'sort_order' => 6
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Bordeaux « Château de Budos »',
            'image' => 'chateaudebudos.jpg',
            'glass_price' => 6.00,
            'bottle_price' => 24.00,
            'sort_order' => 7
        ]);
        
        \App\Models\Wine::create([
            'name' => 'Vin Rosé du moment',
            'glass_price' => 0.00,
            'bottle_price' => 0.00,
            'sort_order' => 8
        ]);
    }
}
