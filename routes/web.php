<?php

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    $testimonials = \App\Models\Testimonial::getActive();
    return view('home', compact('testimonials'));
})->name('home');

// Pages du site
Route::get('/evenements', function () {
    $upcomingEvents = \App\Models\Event::upcoming()->select('id', 'title', 'description', 'event_date', 'images')->orderBy('event_date')->get();
    $pastEvents = \App\Models\Event::past()->select('id', 'title', 'description', 'event_date', 'images')->orderBy('event_date', 'desc')->get();
    return view('evenements', compact('upcomingEvents', 'pastEvents'));
})->name('evenements');

Route::get('/repas', function () {
    return view('repas');
})->name('repas');

Route::get('/menu', function () {
    $entrees = \App\Models\MenuItem::getByType('entree');
    $plats = \App\Models\MenuItem::getByType('plat');
    $burgers = \App\Models\MenuItem::getByType('burger');
    $desserts = \App\Models\MenuItem::getByType('dessert');
    $menuEnfant = \App\Models\MenuItem::getByType('menu_enfant');
    
    $boissonsFraiches = \App\Models\Drink::getByCategory('boissons_fraiches');
    $aperitifsDigestifs = \App\Models\Drink::getByCategory('aperitifs_digestifs');
    $boissonsChaudes = \App\Models\Drink::getByCategory('boissons_chaudes');
    
    $vins = \App\Models\Wine::getActive();
    
    return view('menu', compact('entrees', 'plats', 'burgers', 'desserts', 'menuEnfant', 'boissonsFraiches', 'aperitifsDigestifs', 'boissonsChaudes', 'vins'));
})->name('menu');

Route::get('/menus-midi', function () {
    $middayMenus = \App\Models\MiddayMenu::getActive();
    $middayMenuCards = \App\Models\MiddayMenuCard::getActive();
    return view('menus.midi', compact('middayMenus', 'middayMenuCards'));
})->name('menus.midi');

Route::get('/menus-groupe', function () {
    $groupMenus = \App\Models\GroupMenu::getActive();
    return view('menus.groupe', compact('groupMenus'));
})->name('menus.groupe');

Route::get('/galerie', function () {
    $galleryImages = \App\Models\GalleryImage::select('id', 'filename', 'alt_text', 'sort_order')->where('is_active', true)->orderBy('sort_order')->get();
    return view('galerie', compact('galleryImages'));
})->name('galerie');

Route::get('/bistrot', function () {
    return view('bistrot');
})->name('bistrot');

// Redirections pour les anciens liens HTML
Route::get('/index.html', function () {
    return redirect()->route('home');
});

Route::get('/bistrot.html', function () {
    return redirect()->route('bistrot');
});

Route::get('/menu.html', function () {
    return redirect()->route('menu');
});

Route::get('/galerie.html', function () {
    return redirect()->route('galerie');
});

Route::get('/evenements.html', function () {
    return redirect()->route('evenements');
});

Route::get('/repas.html', function () {
    return redirect()->route('repas');
});

Route::get('/menus-midi.html', function () {
    return redirect()->route('menus.midi');
});

Route::get('/menus-groupe.html', function () {
    return redirect()->route('menus.groupe');
});

// Routes d'authentification admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [App\Http\Controllers\AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('logout');
    Route::post('/change-password', [App\Http\Controllers\AdminAuthController::class, 'changePassword'])->name('change-password');
});

// Routes d'administration (protégées)
Route::prefix('admin')->name('admin.')->middleware(['admin.security'])->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    
    // Gestion du contenu
    Route::get('content', [App\Http\Controllers\AdminController::class, 'contentIndex'])->name('content.index');
    Route::get('content/create', [App\Http\Controllers\AdminController::class, 'contentCreate'])->name('content.create');
    Route::post('content', [App\Http\Controllers\AdminController::class, 'contentStore'])->name('content.store');
    Route::get('content/{content}/edit', [App\Http\Controllers\AdminController::class, 'contentEdit'])->name('content.edit');
    Route::put('content/{content}', [App\Http\Controllers\AdminController::class, 'contentUpdate'])->name('content.update');
    Route::delete('content/{content}', [App\Http\Controllers\AdminController::class, 'contentDestroy'])->name('content.destroy');
    
    // Gestion des menus
    Route::get('menu', [App\Http\Controllers\AdminController::class, 'menuIndex'])->name('menu.index');
    Route::get('menu/create', [App\Http\Controllers\AdminController::class, 'menuCreate'])->name('menu.create');
    Route::post('menu', [App\Http\Controllers\AdminController::class, 'menuStore'])->name('menu.store');
    Route::get('menu/pdf', [App\Http\Controllers\AdminController::class, 'menuPdfEdit'])->name('menu.pdf.edit');
    Route::put('menu/pdf', [App\Http\Controllers\AdminController::class, 'menuPdfUpdate'])->name('menu.pdf.update');
    Route::get('menu/{menu}/edit', [App\Http\Controllers\AdminController::class, 'menuEdit'])->name('menu.edit');
    Route::put('menu/{menu}', [App\Http\Controllers\AdminController::class, 'menuUpdate'])->name('menu.update');
    Route::delete('menu/{menu}', [App\Http\Controllers\AdminController::class, 'menuDestroy'])->name('menu.destroy');
    
    // Gestion des images
    Route::get('image', [App\Http\Controllers\AdminController::class, 'imageIndex'])->name('image.index');
    Route::get('image/create', [App\Http\Controllers\AdminController::class, 'imageCreate'])->name('image.create');
    Route::post('image', [App\Http\Controllers\AdminController::class, 'imageStore'])->name('image.store');
    Route::get('image/{image}/edit', [App\Http\Controllers\AdminController::class, 'imageEdit'])->name('image.edit');
    Route::put('image/{image}', [App\Http\Controllers\AdminController::class, 'imageUpdate'])->name('image.update');
    Route::delete('image/{image}', [App\Http\Controllers\AdminController::class, 'imageDestroy'])->name('image.destroy');

    // Gestion du carousel de la page d'accueil
    Route::get('carousel', [App\Http\Controllers\AdminController::class, 'carouselIndex'])->name('carousel.index');
    Route::get('carousel/create', [App\Http\Controllers\AdminController::class, 'carouselCreate'])->name('carousel.create');
    Route::post('carousel', [App\Http\Controllers\AdminController::class, 'carouselStore'])->name('carousel.store');
    Route::get('carousel/{image}/edit', [App\Http\Controllers\AdminController::class, 'carouselEdit'])->name('carousel.edit');
    Route::put('carousel/{image}', [App\Http\Controllers\AdminController::class, 'carouselUpdate'])->name('carousel.update');
    Route::delete('carousel/{image}', [App\Http\Controllers\AdminController::class, 'carouselDestroy'])->name('carousel.destroy');
    
    // Gestion des événements
    Route::get('event', [App\Http\Controllers\AdminController::class, 'eventIndex'])->name('event.index');
    Route::get('event/create', [App\Http\Controllers\AdminController::class, 'eventCreate'])->name('event.create');
    Route::post('event', [App\Http\Controllers\AdminController::class, 'eventStore'])->name('event.store');
    Route::get('event/{event}/edit', [App\Http\Controllers\AdminController::class, 'eventEdit'])->name('event.edit');
    Route::put('event/{event}', [App\Http\Controllers\AdminController::class, 'eventUpdate'])->name('event.update');
    Route::delete('event/{event}', [App\Http\Controllers\AdminController::class, 'eventDestroy'])->name('event.destroy');
    
    // Gestion des avis clients
    Route::get('testimonial', [App\Http\Controllers\AdminController::class, 'testimonialIndex'])->name('testimonial.index');
    Route::get('testimonial/create', [App\Http\Controllers\AdminController::class, 'testimonialCreate'])->name('testimonial.create');
    Route::post('testimonial', [App\Http\Controllers\AdminController::class, 'testimonialStore'])->name('testimonial.store');
    Route::get('testimonial/{testimonial}/edit', [App\Http\Controllers\AdminController::class, 'testimonialEdit'])->name('testimonial.edit');
    Route::put('testimonial/{testimonial}', [App\Http\Controllers\AdminController::class, 'testimonialUpdate'])->name('testimonial.update');
    Route::delete('testimonial/{testimonial}', [App\Http\Controllers\AdminController::class, 'testimonialDestroy'])->name('testimonial.destroy');
    
    // Gestion des éléments de menu
    Route::get('menu-item', [App\Http\Controllers\AdminController::class, 'menuItemIndex'])->name('menu-item.index');
    Route::get('menu-item/create', [App\Http\Controllers\AdminController::class, 'menuItemCreate'])->name('menu-item.create');
    Route::post('menu-item', [App\Http\Controllers\AdminController::class, 'menuItemStore'])->name('menu-item.store');
    Route::get('menu-item/{menuItem}/edit', [App\Http\Controllers\AdminController::class, 'menuItemEdit'])->name('menu-item.edit');
    Route::put('menu-item/{menuItem}', [App\Http\Controllers\AdminController::class, 'menuItemUpdate'])->name('menu-item.update');
    Route::delete('menu-item/{menuItem}', [App\Http\Controllers\AdminController::class, 'menuItemDestroy'])->name('menu-item.destroy');
    
    // Gestion des boissons
    Route::get('drink', [App\Http\Controllers\AdminController::class, 'drinkIndex'])->name('drink.index');
    Route::get('drink/create', [App\Http\Controllers\AdminController::class, 'drinkCreate'])->name('drink.create');
    Route::post('drink', [App\Http\Controllers\AdminController::class, 'drinkStore'])->name('drink.store');
    Route::get('drink/{drink}/edit', [App\Http\Controllers\AdminController::class, 'drinkEdit'])->name('drink.edit');
    Route::put('drink/{drink}', [App\Http\Controllers\AdminController::class, 'drinkUpdate'])->name('drink.update');
    Route::delete('drink/{drink}', [App\Http\Controllers\AdminController::class, 'drinkDestroy'])->name('drink.destroy');
    
    // Gestion des vins
    Route::get('wine', [App\Http\Controllers\AdminController::class, 'wineIndex'])->name('wine.index');
    Route::get('wine/create', [App\Http\Controllers\AdminController::class, 'wineCreate'])->name('wine.create');
    Route::post('wine', [App\Http\Controllers\AdminController::class, 'wineStore'])->name('wine.store');
    Route::get('wine/{wine}/edit', [App\Http\Controllers\AdminController::class, 'wineEdit'])->name('wine.edit');
    Route::put('wine/{wine}', [App\Http\Controllers\AdminController::class, 'wineUpdate'])->name('wine.update');
    Route::delete('wine/{wine}', [App\Http\Controllers\AdminController::class, 'wineDestroy'])->name('wine.destroy');
    
    // Gestion des menus de groupe
    Route::get('group-menu', [App\Http\Controllers\AdminController::class, 'groupMenuIndex'])->name('group-menu.index');
    Route::get('group-menu/create', [App\Http\Controllers\AdminController::class, 'groupMenuCreate'])->name('group-menu.create');
    Route::post('group-menu', [App\Http\Controllers\AdminController::class, 'groupMenuStore'])->name('group-menu.store');
    Route::get('group-menu/{groupMenu}/edit', [App\Http\Controllers\AdminController::class, 'groupMenuEdit'])->name('group-menu.edit');
    Route::put('group-menu/{groupMenu}', [App\Http\Controllers\AdminController::class, 'groupMenuUpdate'])->name('group-menu.update');
    Route::delete('group-menu/{groupMenu}', [App\Http\Controllers\AdminController::class, 'groupMenuDestroy'])->name('group-menu.destroy');
    
    // Gestion des menus du midi
    Route::get('menu-midi', [App\Http\Controllers\AdminController::class, 'middayMenuIndex'])->name('menu-midi.index');
    Route::get('menu-midi/create', [App\Http\Controllers\AdminController::class, 'middayMenuCreate'])->name('menu-midi.create');
    Route::post('menu-midi', [App\Http\Controllers\AdminController::class, 'middayMenuStore'])->name('menu-midi.store');
    Route::get('menu-midi/{middayMenu}/edit', [App\Http\Controllers\AdminController::class, 'middayMenuEdit'])->name('menu-midi.edit');
    Route::put('menu-midi/{middayMenu}', [App\Http\Controllers\AdminController::class, 'middayMenuUpdate'])->name('menu-midi.update');
    Route::delete('menu-midi/{middayMenu}', [App\Http\Controllers\AdminController::class, 'middayMenuDestroy'])->name('menu-midi.destroy');
    
    // Upload d'images pour le carousel
    Route::get('menu-midi/add-images', [App\Http\Controllers\AdminController::class, 'middayMenuAddImages'])->name('menu-midi.add-images');
    Route::post('menu-midi/store-images', [App\Http\Controllers\AdminController::class, 'middayMenuStoreImages'])->name('menu-midi.store-images');
    
    // Modification d'image simple
    Route::get('menu-midi/{middayMenu}/edit-image', [App\Http\Controllers\AdminController::class, 'middayMenuEditImage'])->name('menu-midi.edit-image');
    Route::put('menu-midi/{middayMenu}/update-image', [App\Http\Controllers\AdminController::class, 'middayMenuUpdateImage'])->name('menu-midi.update-image');
    
    // Gestion des cartes de menus du midi
    Route::get('menu-midi-cards', [App\Http\Controllers\AdminController::class, 'middayMenuCardIndex'])->name('menu-midi-cards.index');
    Route::get('menu-midi-cards/create', [App\Http\Controllers\AdminController::class, 'middayMenuCardCreate'])->name('menu-midi-cards.create');
    Route::post('menu-midi-cards', [App\Http\Controllers\AdminController::class, 'middayMenuCardStore'])->name('menu-midi-cards.store');
    Route::get('menu-midi-cards/{middayMenuCard}/edit', [App\Http\Controllers\AdminController::class, 'middayMenuCardEdit'])->name('menu-midi-cards.edit');
    Route::put('menu-midi-cards/{middayMenuCard}', [App\Http\Controllers\AdminController::class, 'middayMenuCardUpdate'])->name('menu-midi-cards.update');
    Route::delete('menu-midi-cards/{middayMenuCard}', [App\Http\Controllers\AdminController::class, 'middayMenuCardDestroy'])->name('menu-midi-cards.destroy');
});
