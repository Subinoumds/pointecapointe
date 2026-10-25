<?php

use App\Models\Event;
use App\Models\MenuItem;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->withoutVite());

it('affiche chaque page publique', function (string $url) {
    $this->get($url)->assertOk();
})->with([
    'accueil' => '/',
    'carte' => '/menu',
    'formules du midi' => '/menus-midi',
    'menus de groupe' => '/menus-groupe',
    'repas de groupe' => '/repas',
    'événements' => '/evenements',
    'galerie' => '/galerie',
    'le bistrot' => '/bistrot',
]);

it('affiche un plat actif sur la carte et masque un plat inactif', function () {
    MenuItem::create(['name' => 'Burger du Chef', 'type' => 'burger', 'price' => 16.5, 'is_active' => true, 'sort_order' => 1]);
    MenuItem::create(['name' => 'Plat en rupture', 'type' => 'plat', 'price' => 14, 'is_active' => false, 'sort_order' => 2]);

    $this->get('/menu')
        ->assertSee('Burger du Chef')
        ->assertDontSee('Plat en rupture');
});

it('sépare les événements à venir des événements passés', function () {
    Event::create(['title' => 'Concert jazz', 'description' => 'Soirée', 'event_date' => now()->addWeek(), 'type' => 'upcoming', 'images' => [], 'is_active' => true]);
    Event::create(['title' => 'Soirée guinguette', 'description' => 'Souvenirs', 'event_date' => now()->subMonth(), 'type' => 'past', 'images' => [], 'is_active' => true]);

    $this->get('/evenements')
        ->assertOk()
        ->assertSeeInOrder(['Concert jazz', 'Soirée guinguette']);
});
