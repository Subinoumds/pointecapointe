<?php

use Illuminate\Support\Facades\Route;

// Page d'accueil
Route::get('/', function () {
    $contents = \App\Models\Content::all()->pluck('content', 'key');
    return view('home', compact('contents'));
})->name('home');

// Pages du site
Route::get('/evenements', function () {
    $upcomingEvents = \App\Models\Event::upcoming()->orderBy('event_date')->get();
    $pastEvents = \App\Models\Event::past()->orderBy('event_date', 'desc')->get();
    return view('evenements', compact('upcomingEvents', 'pastEvents'));
})->name('evenements');

Route::get('/repas', function () {
    return view('repas');
})->name('repas');

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/menus-midi', function () {
    return view('menus.midi');
})->name('menus.midi');

Route::get('/menus-groupe', function () {
    return view('menus.groupe');
})->name('menus.groupe');

Route::get('/galerie', function () {
    return view('galerie');
})->name('galerie');

Route::get('/bistrot', function () {
    return view('bistrot');
})->name('bistrot');

// Routes d'administration
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    
    // Gestion du contenu
    Route::resource('content', App\Http\Controllers\AdminController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
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
    
    // Gestion des événements
    Route::get('event', [App\Http\Controllers\AdminController::class, 'eventIndex'])->name('event.index');
    Route::get('event/create', [App\Http\Controllers\AdminController::class, 'eventCreate'])->name('event.create');
    Route::post('event', [App\Http\Controllers\AdminController::class, 'eventStore'])->name('event.store');
    Route::get('event/{event}/edit', [App\Http\Controllers\AdminController::class, 'eventEdit'])->name('event.edit');
    Route::put('event/{event}', [App\Http\Controllers\AdminController::class, 'eventUpdate'])->name('event.update');
    Route::delete('event/{event}', [App\Http\Controllers\AdminController::class, 'eventDestroy'])->name('event.destroy');
});
