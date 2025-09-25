<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Image;
use App\Models\Event;
use App\Models\MenuItem;
use App\Models\Drink;
use App\Models\Wine;
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
        return view('admin.menu.index', compact('menuItems', 'drinks', 'wines'));
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

    // Gestion des images
    public function imageIndex()
    {
        $images = Image::orderBy('category')->orderBy('sort_order')->get();
        return view('admin.image.index', compact('images'));
    }

    public function imageCreate()
    {
        return view('admin.image.create');
    }

    public function imageStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|max:2048',
            'category' => 'required',
            'alt_text' => 'nullable'
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('images', $filename, 'public');

        Image::create([
            'name' => $request->name,
            'filename' => $filename,
            'path' => 'storage/' . $path,
            'alt_text' => $request->alt_text,
            'category' => $request->category,
            'sort_order' => $request->sort_order ?? 0
        ]);

        return redirect()->route('admin.image.index')->with('success', 'Image ajoutée avec succès !');
    }

    public function imageEdit(Image $image)
    {
        return view('admin.image.edit', compact('image'));
    }

    public function imageUpdate(Request $request, Image $image)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|max:2048',
            'category' => 'required',
            'alt_text' => 'nullable'
        ]);

        $data = $request->only(['name', 'category', 'alt_text', 'sort_order']);

        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image
            Storage::disk('public')->delete(str_replace('storage/', '', $image->path));
            
            // Ajouter la nouvelle image
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename, 'public');
            $data['filename'] = $filename;
            $data['path'] = 'storage/' . $path;
        }

        $image->update($data);
        return redirect()->route('admin.image.index')->with('success', 'Image mise à jour avec succès !');
    }

    public function imageDestroy(Image $image)
    {
        Storage::disk('public')->delete(str_replace('storage/', '', $image->path));
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
            'images.*' => 'image|max:2048',
            'image_paths' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'images.*.image' => 'Tous les fichiers doivent être des images.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 2MB.'
        ]);

        $data = $request->only(['title', 'description', 'event_date', 'type']);
        $data['is_active'] = $request->has('is_active');
        
        // Gestion des images uploadées avec redimensionnement
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            $manager = new ImageManager(new Driver());
            
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.jpg';
                
                // Redimensionner l'image (comme sur le site statique)
                $img = $manager->read($image);
                $img = $img->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                
                $path = 'events/' . $filename;
                Storage::disk('public')->put($path, $img->toJpeg(85));
                $uploadedImages[] = 'storage/' . $path;
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
            'images.*' => 'image|max:2048',
            'image_paths' => 'nullable|string',
            'is_active' => 'boolean'
        ], [
            'images.*.image' => 'Tous les fichiers doivent être des images.',
            'images.*.max' => 'Chaque image ne doit pas dépasser 2MB.'
        ]);

        $data = $request->only(['title', 'description', 'event_date', 'type']);
        $data['is_active'] = $request->has('is_active');
        
        // Gestion des images uploadées avec redimensionnement
        $uploadedImages = [];
        if ($request->hasFile('images')) {
            $manager = new ImageManager(new Driver());
            
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.jpg';
                
                // Redimensionner l'image (comme sur le site statique)
                $img = $manager->read($image);
                $img = $img->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
                
                $path = 'events/' . $filename;
                Storage::disk('public')->put($path, $img->toJpeg(85));
                $uploadedImages[] = 'storage/' . $path;
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
            'image' => 'nullable|image|max:2048',
            'glass_price' => 'required|numeric|min:0',
            'bottle_price' => 'required|numeric|min:0',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'boolean'
        ]);

        $data = $request->all();
        $data['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('vins', $filename, 'public');
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
            'image' => 'nullable|image|max:2048',
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
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('vins', $filename, 'public');
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
}
