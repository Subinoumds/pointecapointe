<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Menu;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('title')->get();
        $menus = Menu::orderBy('name')->get();
        $images = Image::orderBy('name')->get();
        
        return view('admin.index', compact('contents', 'menus', 'images'));
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
        $menus = Menu::orderBy('type')->orderBy('sort_order')->get();
        return view('admin.menu.index', compact('menus'));
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
}
