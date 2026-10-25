<?php

it('redirige les anciennes pages .html en 301 vers les nouvelles routes', function (string $old, string $new) {
    $this->get($old)->assertStatus(301)->assertRedirect($new);
})->with([
    ['/index.html', '/'],
    ['/bistrot.html', '/bistrot'],
    ['/menu.html', '/menu'],
    ['/galerie.html', '/galerie'],
    ['/evenements.html', '/evenements'],
    ['/repas.html', '/repas'],
    ['/menus-midi.html', '/menus-midi'],
    ['/menus-groupe.html', '/menus-groupe'],
]);
