<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\GalleryItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryItemController extends Controller
{
    public function index(Album $album): View
    {
        return view('admin.gallery-items.index', [
            'album' => $album,
            'items' => $album->items()->orderBy('sort_order')->get(),
        ]);
    }

    public function create(Album $album): View
    {
        return view('admin.gallery-items.create', compact('album'));
    }

    public function store(Request $request, Album $album): RedirectResponse
    {
        $data = $request->validate([
            'type' => 'required|in:image,youtube',
            'photopath' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'youtube_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data['album_id'] = $album->id;

        if ($request->hasFile('photopath')) {
            $data['photopath'] = $request->file('photopath')->store('gallery-items', 'public');
        }

        GalleryItem::create($data);

        return redirect()->route('admin.albums.items.index', $album)
            ->with('success', 'Gallery item added successfully.');
    }

    public function edit(Album $album, GalleryItem $item): View
    {
        return view('admin.gallery-items.edit', [
            'album' => $album,
            'item' => $item,
        ]);
    }

    public function update(Request $request, Album $album, GalleryItem $item): RedirectResponse
    {
        $data = $request->validate([
            'type' => 'required|in:image,youtube',
            'photopath' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'youtube_link' => 'nullable|string|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        if ($request->hasFile('photopath')) {
            $data['photopath'] = $request->file('photopath')->store('gallery-items', 'public');
        }

        $item->update($data);

        return redirect()->route('admin.albums.items.index', $album)
            ->with('success', 'Gallery item updated successfully.');
    }

    public function destroy(Album $album, GalleryItem $item): RedirectResponse
    {
        $item->delete();

        return redirect()->route('admin.albums.items.index', $album)
            ->with('success', 'Gallery item removed.');
    }
}
