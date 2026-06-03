<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Image;
use App\Models\GalleryImage;
use App\Models\Event;
use App\Models\MenuItem;
use App\Models\Drink;
use App\Models\Wine;
use App\Models\GroupMenu;
use App\Models\MiddayMenu;
use App\Models\MiddayMenuCard;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('title')->get();
        $menus = Menu::orderBy('name')->get();
        $images = Image::orderBy('name')->get();
        $events = Event::orderBy('event_date', 'desc')->get();
        
        return view('admin.index', compact('contents', 'menus', 'images', 'events'));
    }

    // Gestion du contenu
    public function contentIndex()
    {
        $contents = Content::orderBy('title')->get();
        return view('admin.content.index', compact('contents'));
    }

    public function contentCreate()
    {
        return view('admin.content.create');
    }

    public function contentStore(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:contents,key',
            'title' => 'required',
            'content' => 'required',
            'type' => 'required|in:text,html'
        ]);

        Content::create($request->all());
        return redirect()->route('admin.content.index')->with('success', 'Contenu créé avec succès !');
    }

    public function contentEdit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function contentUpdate(Request $request, Content $content)
    {
        $request->validate([
            'key' => 'required|unique:contents,key,' . $content->id,
            'title' => 'required',
            'content' => 'required',
            'type' => 'required|in:text,html'
        ]);

        $content->update($request->all());
        return redirect()->route('admin.content.index')->with('success', 'Contenu mis à jour avec succès !');
    }

    public function contentDestroy(Content $content)
    {
        $content->delete();
        return redirect()->route('admin.content.index')->with('success', 'Contenu supprimé avec succès !');
    }

    // Gestion des menus
    public function menuIndex()
    {
        $menuItems = MenuItem::count();
        $drinks = Drink::count();
        $wines = Wine::count();
        $groupMenus = GroupMenu::count();
        $middayMenus = MiddayMenu::count();
        return view('admin.menu.index', compact('menuItems', 'drinks', 'wines', 'groupMenus', 'middayMenus'));
    }

    public function menuCreate()
    {
        return view('admin.menu.create');
    }

    public function menuStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'items' => 'required|json'
        ]);

        Menu::create($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu créé avec succès !');
    }

    public function menuEdit(Menu $menu)
    {
        return view('admin.menu.edit', compact('menu'));
    }

    public function menuUpdate(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'items' => 'required|json'
        ]);

        $menu->update($request->all());
        return redirect()->route('admin.menu.index')->with('success', 'Menu mis à jour avec succès !');
    }

    public function menuDestroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('admin.menu.index')->with('success', 'Menu supprimé avec succès !');
    }

    // Gestion des images de la galerie
    public function imageIndex()
    {
        $images = GalleryImage::orderBy('sort_order')->get();
        return view('admin.image.index', compact('images'));
    }

    public function imageCreate()
    {
        return view('admin.image.create');
    }

    public function imageStore(Request $request)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'category' => 'required',
            'alt_text' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $uploadedCount = 0;
        
        foreach ($request->file('images') as $image) {
            $imageName = $this->optimizeAndStore($image, 'gallery', 1600, 75, $uploadedCount);
            
            GalleryImage::create([
                'filename' => $imageName,
                'alt_text' => $request->alt_text ?: 'Pointe ça Pointe gallery image',
                'is_active' => $request->has('is_active'),
                'sort_order' => $request->sort_order ?? GalleryImage::max('sort_order') + 1
            ]);
            
            $uploadedCount++;
        }

        $message = $uploadedCount === 1 ? 'Image ajoutée à la galerie !' : $uploadedCount . ' images ajoutées à la galerie !';
        return redirect()->route('admin.image.index')->with('success', $message);
    }

    public function imageEdit(GalleryImage $image)
    {
        return view('admin.image.edit', compact('image'));
    }

    public function imageUpdate(Request $request, GalleryImage $image)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'category' => 'required',
            'alt_text' => 'nullable',
            'sort_order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $data = $request->only(['alt_text', 'sort_order']);
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            Storage::disk('public')->delete('gallery/' . $image->filename);
            
            // Ajouter la nouvelle image
            $file = $request->file('image');
            $filename = $this->optimizeAndStore($file, 'gallery', 1600, 75);
            $data['filename'] = $filename;
        }

        $image->update($data);
        return redirect()->route('admin.image.index')->with('success', 'Image mise à jour avec succès !');
    }

    public function imageDestroy(GalleryImage $image)
    {
        Storage::disk('public')->delete('gallery/' . $image->filename);
        $image->delete();
        return redirect()->route('admin.image.index')->with('success', 'Image supprimée avec succès !');
    }

    // Gestion des événements
    public function eventIndex()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    public function eventCreate()
    {
        return view('admin.event.create');
    }

    public function eventStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'type' => 'required|in:upcoming,past',
            'images' => 'nullable|array',
            'images.*' => 'image|max:10240',
            'image_paths' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'images.*.image' => 'Tous les fichiers doivent être des images.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 10MB.'
        ]);

        $data = $request->only(['title', 'description', 'event_date', 'type']);
        $data['is_active'] = $request->has('is_active');
        
        // Gestion des images uploadées avec redimensionnement
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $this->optimizeAndStore($image, 'events', 800, 80, uniqid());
                $uploadedImages[] = 'storage/events/' . $filename;
            }
        }
        
        // Gestion des chemins d'images manuels
        $manualImages = [];
        if ($request->image_paths) {
            $manualImages = array_map('trim', explode(',', $request->image_paths));
        }
        
        // Combiner les images uploadées et manuelles
        $allImages = array_merge($uploadedImages, $manualImages);
        
        // Validation : au moins 4 images pour les événements passés
        if ($request->type === 'past' && count($allImages) < 4) {
            return back()->withErrors(['images' => 'Les événements passés doivent avoir au moins 4 images.'])->withInput();
        }
        
        $data['images'] = $allImages;
        
        Event::create($data);
        return redirect()->route('admin.event.index')->with('success', 'Événement créé avec succès !');
    }

    public function eventEdit(Event $event)
    {
        return view('admin.event.edit', compact('event'));
    }

    public function eventUpdate(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'type' => 'required|in:upcoming,past',
            'images' => 'nullable|array',
            'images.*' => 'image|max:10240',
            'image_paths' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'images.*.image' => 'Tous les fichiers doivent être des images.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 10MB.'
        ]);

        $data = $request->only(['title', 'description', 'event_date', 'type']);
        $data['is_active'] = $request->has('is_active');
        
        // Gestion des images uploadées avec redimensionnement
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $this->optimizeAndStore($image, 'events', 800, 80, uniqid());
                $uploadedImages[] = 'storage/events/' . $filename;
            }
        }
        
        // Gestion des chemins d'images manuels
        $manualImages = [];
        if ($request->image_paths) {
            $manualImages = array_map('trim', explode(',', $request->image_paths));
        }
        
        // Combiner les images uploadées et manuelles
        $allImages = array_merge($uploadedImages, $manualImages);
        
        // Validation : au moins 4 images pour les événements passés
        if ($request->type === 'past' && count($allImages) < 4) {
            return back()->withErrors(['images' => 'Les événements passés doivent avoir au moins 4 images.'])->withInput();
        }
        
        $data['images'] = $allImages;
        
        $event->update($data);
        return redirect()->route('admin.event.index')->with('success', 'Événement mis à jour avec succès !');
    }

    public function eventDestroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Événement supprimé avec succès !');
    }

    // Gestion des éléments de menu
    public function menuItemIndex()
    {
        $menuItems = MenuItem::orderBy('type')->orderBy('sort_order')->get();
        return view('admin.menu-item.index', compact('menuItems'));
    }

    public function menuItemCreate()
    {
        return view('admin.menu-item.create');
    }

    public function menuItemStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:entree,plat,burger,dessert,menu_enfant',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        MenuItem::create($data);
        return redirect()->route('admin.menu-item.index')->with('success', 'Élément de menu créé avec succès !');
    }

    public function menuItemEdit(MenuItem $menuItem)
    {
        return view('admin.menu-item.edit', compact('menuItem'));
    }

    public function menuItemUpdate(Request $request, MenuItem $menuItem)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:entree,plat,burger,dessert,menu_enfant',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        $menuItem->update($data);
        return redirect()->route('admin.menu-item.index')->with('success', 'Élément de menu mis à jour avec succès !');
    }

    public function menuItemDestroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return redirect()->route('admin.menu-item.index')->with('success', 'Élément de menu supprimé avec succès !');
    }

    // Gestion des boissons
    public function drinkIndex()
    {
        $drinks = Drink::orderBy('category')->orderBy('sort_order')->get();
        return view('admin.drink.index', compact('drinks'));
    }

    public function drinkCreate()
    {
        return view('admin.drink.create');
    }

    public function drinkStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:boissons_fraiches,aperitifs_digestifs,boissons_chaudes',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        Drink::create($data);
        return redirect()->route('admin.drink.index')->with('success', 'Boisson créée avec succès !');
    }

    public function drinkEdit(Drink $drink)
    {
        return view('admin.drink.edit', compact('drink'));
    }

    public function drinkUpdate(Request $request, Drink $drink)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|in:boissons_fraiches,aperitifs_digestifs,boissons_chaudes',
            'description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        $drink->update($data);
        return redirect()->route('admin.drink.index')->with('success', 'Boisson mise à jour avec succès !');
    }

    public function drinkDestroy(Drink $drink)
    {
        $drink->delete();
        return redirect()->route('admin.drink.index')->with('success', 'Boisson supprimée avec succès !');
    }

    // Gestion des vins
    public function wineIndex()
    {
        $wines = Wine::orderBy('sort_order')->get();
        return view('admin.wine.index', compact('wines'));
    }

    public function wineCreate()
    {
        return view('admin.wine.create');
    }

    public function wineStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'glass_price' => 'required|numeric|min:0',
            'bottle_price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->optimizeAndStore($file, 'vins', 800, 80);
            $data['image'] = $filename;
        }
        
        Wine::create($data);
        return redirect()->route('admin.wine.index')->with('success', 'Vin créé avec succès !');
    }

    public function wineEdit(Wine $wine)
    {
        return view('admin.wine.edit', compact('wine'));
    }

    public function wineUpdate(Request $request, Wine $wine)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'glass_price' => 'required|numeric|min:0',
            'bottle_price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($wine->image) {
                Storage::disk('public')->delete('vins/' . $wine->image);
            }
            
            $file = $request->file('image');
            $filename = $this->optimizeAndStore($file, 'vins', 800, 80);
            $data['image'] = $filename;
        }
        
        $wine->update($data);
        return redirect()->route('admin.wine.index')->with('success', 'Vin mis à jour avec succès !');
    }

    public function wineDestroy(Wine $wine)
    {
        if ($wine->image) {
            Storage::disk('public')->delete('vins/' . $wine->image);
        }
        $wine->delete();
        return redirect()->route('admin.wine.index')->with('success', 'Vin supprimé avec succès !');
    }

    // Gestion des menus de groupe
    public function groupMenuIndex()
    {
        $groupMenus = GroupMenu::orderBy('sort_order')->get();
        return view('admin.group-menu.index', compact('groupMenus'));
    }

    public function groupMenuCreate()
    {
        return view('admin.group-menu.create');
    }

    public function groupMenuStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_person' => 'required|numeric|min:0',
            'entrees' => 'required|array|min:1',
            'entrees.*' => 'required|string',
            'plats' => 'required|array|min:1',
            'plats.*' => 'required|string',
            'desserts' => 'required|array|min:1',
            'desserts.*' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        GroupMenu::create($data);
        return redirect()->route('admin.group-menu.index')->with('success', 'Menu de groupe créé avec succès !');
    }

    public function groupMenuEdit(GroupMenu $groupMenu)
    {
        return view('admin.group-menu.edit', compact('groupMenu'));
    }

    public function groupMenuUpdate(Request $request, GroupMenu $groupMenu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_person' => 'required|numeric|min:0',
            'entrees' => 'required|array|min:1',
            'entrees.*' => 'required|string',
            'plats' => 'required|array|min:1',
            'plats.*' => 'required|string',
            'desserts' => 'required|array|min:1',
            'desserts.*' => 'required|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        $groupMenu->update($data);
        return redirect()->route('admin.group-menu.index')->with('success', 'Menu de groupe mis à jour avec succès !');
    }

    public function groupMenuDestroy(GroupMenu $groupMenu)
    {
        $groupMenu->delete();
        return redirect()->route('admin.group-menu.index')->with('success', 'Menu de groupe supprimé avec succès !');
    }

    // Gestion des menus du midi
    public function middayMenuIndex()
    {
        $middayMenus = MiddayMenu::orderBy('sort_order')->get();
        $middayMenuCards = MiddayMenuCard::orderBy('sort_order')->get();
        return view('admin.menu-midi.index', compact('middayMenus', 'middayMenuCards'));
    }

    public function middayMenuCreate()
    {
        return view('admin.menu-midi.create');
    }

    public function middayMenuAddImages()
    {
        return view('admin.menu-midi.add-images');
    }

    public function middayMenuStoreImages(Request $request)
    {
        $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        $uploadedCount = 0;
        
        foreach ($request->file('images') as $image) {
            $imageName = $this->optimizeAndStore($image, 'midday-menus', 1600, 75, $uploadedCount);
            
            MiddayMenu::create([
                'name' => 'Image ' . ($uploadedCount + 1),
                'description' => 'Image ajoutée au carousel',
                'price' => 0.00,
                'image' => $imageName,
                'is_active' => true,
                'sort_order' => MiddayMenu::max('sort_order') + 1
            ]);
            
            $uploadedCount++;
        }

        $message = $uploadedCount === 1 ? 'Image ajoutée au carousel !' : $uploadedCount . ' images ajoutées au carousel !';
        return redirect()->route('admin.menu-midi.index')->with('success', $message);
    }

    public function middayMenuEditImage(MiddayMenu $middayMenu)
    {
        return view('admin.menu-midi.edit-image', compact('middayMenu'));
    }

    public function middayMenuUpdateImage(Request $request, MiddayMenu $middayMenu)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240'
        ]);

        // Supprimer l'ancienne image
        if ($middayMenu->image) {
            Storage::disk('public')->delete('midday-menus/' . $middayMenu->image);
        }

        // Uploader la nouvelle image
        $image = $request->file('image');
        $imageName = $this->optimizeAndStore($image, 'midday-menus', 1600, 75);

        // Mettre à jour l'enregistrement
        $middayMenu->update([
            'image' => $imageName
        ]);

        return redirect()->route('admin.menu-midi.index')->with('success', 'Image mise à jour avec succès !');
    }

    public function middayMenuStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $this->optimizeAndStore($image, 'midday-menus', 1600, 75);
            $data['image'] = $imageName;
        }
        
        MiddayMenu::create($data);
        return redirect()->route('admin.menu-midi.index')->with('success', 'Menu du midi créé avec succès !');
    }

    public function middayMenuEdit(MiddayMenu $middayMenu)
    {
        return view('admin.menu-midi.edit', compact('middayMenu'));
    }

    public function middayMenuUpdate(Request $request, MiddayMenu $middayMenu)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            if ($middayMenu->image) {
                Storage::disk('public')->delete('midday-menus/' . $middayMenu->image);
            }
            
            $image = $request->file('image');
            $imageName = $this->optimizeAndStore($image, 'midday-menus', 1600, 75);
            $data['image'] = $imageName;
        }
        
        $middayMenu->update($data);
        return redirect()->route('admin.menu-midi.index')->with('success', 'Menu du midi mis à jour avec succès !');
    }

    public function middayMenuDestroy(MiddayMenu $middayMenu)
    {
        if ($middayMenu->image) {
            Storage::disk('public')->delete('midday-menus/' . $middayMenu->image);
        }
        $middayMenu->delete();
        return redirect()->route('admin.menu-midi.index')->with('success', 'Menu du midi supprimé avec succès !');
    }

    // Gestion des cartes de menus du midi
    public function middayMenuCardIndex()
    {
        $middayMenuCards = MiddayMenuCard::orderBy('sort_order')->get();
        return view('admin.menu-midi-cards.index', compact('middayMenuCards'));
    }

    public function middayMenuCardCreate()
    {
        return view('admin.menu-midi-cards.create');
    }

    public function middayMenuCardStore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.type' => 'required|string|max:255',
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        MiddayMenuCard::create($data);
        return redirect()->route('admin.menu-midi.index')->with('success', 'Carte de menu créée avec succès !');
    }

    public function middayMenuCardEdit(MiddayMenuCard $middayMenuCard)
    {
        return view('admin.menu-midi-cards.edit', compact('middayMenuCard'));
    }

    public function middayMenuCardUpdate(Request $request, MiddayMenuCard $middayMenuCard)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'items' => 'required|array|min:1',
            'items.*.type' => 'required|string|max:255',
            'items.*.name' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        
        $middayMenuCard->update($data);
        return redirect()->route('admin.menu-midi.index')->with('success', 'Carte de menu mise à jour avec succès !');
    }

    public function middayMenuCardDestroy(MiddayMenuCard $middayMenuCard)
    {
        $middayMenuCard->delete();
        return redirect()->route('admin.menu-midi.index')->with('success', 'Carte de menu supprimée avec succès !');
    }

    // Gestion du carousel de l'accueil
    public function carouselIndex()
    {
        $images = Image::where('category', 'carousel')->orderBy('sort_order')->get();
        return view('admin.carousel.index', compact('images'));
    }

    public function carouselCreate()
    {
        return view('admin.carousel.create');
    }

    public function carouselStore(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $this->optimizeAndStore($file, 'carousel', 1600, 75);
            
            Image::create([
                'name' => $file->getClientOriginalName(),
                'filename' => $filename,
                'path' => 'carousel/' . $filename,
                'alt_text' => $request->alt_text ?: 'Pointe ça Pointe carousel image',
                'category' => 'carousel',
                'is_active' => $request->has('is_active'),
                'sort_order' => $request->sort_order ?? Image::where('category', 'carousel')->max('sort_order') + 1
            ]);
        }

        return redirect()->route('admin.carousel.index')->with('success', 'Image ajoutée au carousel !');
    }

    public function carouselEdit(Image $image)
    {
        return view('admin.carousel.edit', compact('image'));
    }

    public function carouselUpdate(Request $request, Image $image)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'alt_text' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = [
            'alt_text' => $request->alt_text,
            'sort_order' => $request->sort_order ?? 0,
            'is_active' => $request->has('is_active')
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($image->path);
            
            // Save new optimized image
            $file = $request->file('image');
            $filename = $this->optimizeAndStore($file, 'carousel', 1600, 75);
            $data['filename'] = $filename;
            $data['path'] = 'carousel/' . $filename;
            $data['name'] = $file->getClientOriginalName();
        }

        $image->update($data);
        return redirect()->route('admin.carousel.index')->with('success', 'Image du carousel mise à jour avec succès !');
    }

    public function carouselDestroy(Image $image)
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();
        return redirect()->route('admin.carousel.index')->with('success', 'Image du carousel supprimée avec succès !');
    }

    // Gestion des avis clients
    public function testimonialIndex()
    {
        $testimonials = Testimonial::orderBy('sort_order')->get();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function testimonialCreate()
    {
        return view('admin.testimonial.create');
    }

    public function testimonialStore(Request $request)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'sort_order' => 'required|integer',
            'is_active' => 'sometimes|boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['avatar_letter'] = mb_strtoupper(mb_substr($request->client_name, 0, 1));

        Testimonial::create($data);

        return redirect()->route('admin.testimonial.index')->with('success', 'Avis client créé avec succès !');
    }

    public function testimonialEdit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function testimonialUpdate(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'client_name' => 'required|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'sort_order' => 'required|integer',
            'is_active' => 'sometimes|boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');
        $data['avatar_letter'] = mb_strtoupper(mb_substr($request->client_name, 0, 1));

        $testimonial->update($data);

        return redirect()->route('admin.testimonial.index')->with('success', 'Avis client mis à jour avec succès !');
    }

    public function testimonialDestroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Avis client supprimé avec succès !');
    }

    /**
     * Optimize and store an uploaded image.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $directory
     * @param  int  $maxWidth
     * @param  int  $quality
     * @param  string  $prefix
     * @return string  The stored filename
     */
    private function optimizeAndStore($file, $directory, $maxWidth = 1600, $quality = 75, $prefix = '')
    {
        $manager = new ImageManager(new Driver());
        
        // Read image
        $img = $manager->read($file->getRealPath());
        
        // Do not scale or resize the image to respect the client's wish to keep original dimensions.
        // The scale code has been removed.
        
        // Determine target extension (convert PNG, JPEG, WebP to WebP for maximum compression, keep GIF)
        $originalExtension = strtolower($file->getClientOriginalExtension());
        if ($originalExtension === 'gif') {
            $extension = 'gif';
            $encoded = $img->toGif();
        } else {
            $extension = 'webp';
            $encoded = $img->toWebp($quality);
        }
        
        // Clean and generate filename
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $cleanName = preg_replace('/[^a-zA-Z0-9_\-]/', '', str_replace(' ', '_', $originalName));
        $filename = time() . '_' . ($prefix ? $prefix . '_' : '') . $cleanName . '.' . $extension;
        
        // Store in public disk under the directory
        Storage::disk('public')->put($directory . '/' . $filename, $encoded->toString());
        
        return $filename;
    }
}
