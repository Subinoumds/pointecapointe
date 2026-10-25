<?php

use App\Models\Content;
use App\Models\Event;
use App\Models\GalleryImage;
use App\Models\MenuItem;
use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
    $this->withSession(['admin_authenticated' => true, 'admin_token' => 'jeton', 'admin_login_time' => now()]);
});

it('ajoute un plat depuis le back-office et l’affiche sur la carte', function () {
    $this->post(route('admin.menu-item.store'), [
        'name' => 'Burger Ligérien', 'type' => 'burger', 'price' => 17, 'is_active' => 1,
    ])->assertRedirect(route('admin.menu-item.index'));

    expect(MenuItem::where('name', 'Burger Ligérien')->exists())->toBeTrue();
    $this->get('/menu')->assertSee('Burger Ligérien');
});

it('refuse un plat sans prix ou avec un type inconnu', function () {
    $this->post(route('admin.menu-item.store'), ['name' => 'Sans prix', 'type' => 'pizza'])
        ->assertSessionHasErrors(['price', 'type']);

    expect(MenuItem::count())->toBe(0);
});

it('modifie le prix d’un plat', function () {
    $plat = MenuItem::create(['name' => 'Tartare', 'type' => 'plat', 'price' => 18, 'is_active' => true, 'sort_order' => 0]);

    $this->put(route('admin.menu-item.update', $plat), [
        'name' => 'Tartare', 'type' => 'plat', 'price' => 19.5, 'is_active' => 1,
    ]);

    expect((float) $plat->fresh()->price)->toBe(19.5);
});

it('exige au moins 4 photos pour un événement passé', function () {
    $this->post(route('admin.event.store'), [
        'title' => 'Soirée passée', 'description' => 'Souvenirs', 'event_date' => '2026-05-01', 'type' => 'past',
    ])->assertSessionHasErrors('images');

    expect(Event::count())->toBe(0);
});

it('crée un événement à venir', function () {
    $this->post(route('admin.event.store'), [
        'title' => 'Concert du 14 juillet', 'description' => 'Musique live', 'event_date' => now()->addMonth()->toDateString(), 'type' => 'upcoming', 'is_active' => 1,
    ])->assertRedirect(route('admin.event.index'));

    $this->get('/evenements')->assertSee('Concert du 14 juillet');
});

it('convertit une photo de la galerie en WebP', function () {
    Storage::fake('public');

    $this->post(route('admin.image.store'), [
        'images' => [UploadedFile::fake()->image('terrasse.jpg', 1200, 800)],
        'category' => 'galerie', 'alt_text' => 'La terrasse au coucher du soleil', 'is_active' => 1,
    ])->assertRedirect(route('admin.image.index'));

    $image = GalleryImage::first();
    expect($image->filename)->toEndWith('.webp');
    Storage::disk('public')->assertExists('gallery/' . $image->filename);
});

it('accepte une photo déjà au format WebP', function () {
    Storage::fake('public');

    $this->post(route('admin.image.store'), [
        'images' => [UploadedFile::fake()->image('plat.webp', 800, 600)],
        'category' => 'galerie', 'is_active' => 1,
    ])->assertSessionHasNoErrors();

    expect(GalleryImage::count())->toBe(1);
});

it('refuse une note d’avis supérieure à 5', function () {
    $this->post(route('admin.testimonial.store'), [
        'client_name' => 'Claire', 'stars' => 6, 'comment' => 'Super', 'sort_order' => 1,
    ])->assertSessionHasErrors('stars');

    expect(Testimonial::count())->toBe(0);
});

it('conserve le HTML d’un bloc de texte de type html', function () {
    $this->post(route('admin.content.store'), [
        'key' => 'accroche', 'title' => 'Accroche', 'type' => 'html', 'content' => '<strong>Bienvenue</strong> au bistrot',
    ]);

    expect(Content::where('key', 'accroche')->value('content'))->toBe('<strong>Bienvenue</strong> au bistrot');
});
