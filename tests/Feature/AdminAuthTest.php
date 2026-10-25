<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
    config(['app.admin_password' => Hash::make('MotDePasse-Test-2026')]);
    RateLimiter::clear('admin-login-attempts:127.0.0.1');
});

it('redirige vers la connexion sans session administrateur', function (string $url) {
    $this->get($url)->assertRedirect(route('admin.login'));
})->with(['/admin', '/admin/menu-item', '/admin/event', '/admin/wine', '/admin/menu-midi', '/admin/testimonial']);

it('connecte le gérant avec le bon mot de passe', function () {
    $this->post(route('admin.login.submit'), ['password' => 'MotDePasse-Test-2026'])
        ->assertRedirect(route('admin.index'))
        ->assertSessionHas('admin_authenticated', true);
});

it('refuse un mauvais mot de passe', function () {
    $this->post(route('admin.login.submit'), ['password' => 'mauvais-mot-de-passe'])
        ->assertSessionHasErrors('password')
        ->assertSessionMissing('admin_authenticated');
});

it('bloque la connexion après 5 tentatives échouées', function () {
    foreach (range(1, 5) as $i) {
        $this->post(route('admin.login.submit'), ['password' => 'mauvais-mot-de-passe']);
    }

    $this->post(route('admin.login.submit'), ['password' => 'MotDePasse-Test-2026'])
        ->assertStatus(429);
});

it('ferme la session au-delà de 2 heures', function () {
    $this->withSession([
        'admin_authenticated' => true,
        'admin_token' => 'jeton',
        'admin_login_time' => now()->subHours(3),
    ])->get('/admin')->assertRedirect(route('admin.login'));
});

it('déconnecte le gérant', function () {
    $this->withSession(['admin_authenticated' => true, 'admin_token' => 'jeton', 'admin_login_time' => now()])
        ->post(route('admin.logout'))
        ->assertRedirect(route('admin.login'))
        ->assertSessionMissing('admin_authenticated');
});
