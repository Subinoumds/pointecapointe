<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(fn () => $this->withoutVite());

it('affiche la page de fermeture temporaire sur la page d’accueil quand le mode fermeture est actif', function () {
    Config::set('app.temporary_closure', true);

    $this->get('/')
        ->assertOk()
        ->assertSee('Pointe ça Pointe prend')
        ->assertSee('courte pause')
        ->assertSee('Réservations suspendues');
});

it('affiche la page de fermeture temporaire sur les pages publiques pour bloquer les réservations', function (string $url) {
    Config::set('app.temporary_closure', true);

    $this->get($url)
        ->assertOk()
        ->assertSee('Établissement fermé temporairement')
        ->assertSee('Réservations suspendues');
})->with([
    '/repas',
    '/menu',
    '/menus-midi',
    '/menus-groupe',
    '/evenements',
    '/bistrot',
    '/galerie',
]);

it('laisse les mentions légales et la politique de confidentialité accessibles pendant la fermeture', function (string $url) {
    Config::set('app.temporary_closure', true);

    $this->get($url)->assertOk();
})->with([
    '/mentions-legales',
    '/politique-de-confidentialite',
]);

it('laisse l’accès au back-office administrateur accessible pendant la fermeture', function () {
    Config::set('app.temporary_closure', true);

    $this->get('/admin/login')->assertOk();
});

it('permet à l’administrateur connecté de prévisualiser le site normal', function () {
    Config::set('app.temporary_closure', true);

    $this->withSession(['admin_authenticated' => true])
        ->get('/')
        ->assertOk()
        ->assertDontSee('Pointe ça Pointe prend une courte pause');
});

it('permet de prévisualiser le site normal via le paramètre preview', function () {
    Config::set('app.temporary_closure', true);

    $this->get('/?preview=1')
        ->assertOk()
        ->assertDontSee('Pointe ça Pointe prend une courte pause');
});

it('affiche le site normal quand le mode fermeture temporaire est désactivé', function () {
    Config::set('app.temporary_closure', false);

    $this->get('/')
        ->assertOk()
        ->assertDontSee('Pointe ça Pointe prend une courte pause');
});
