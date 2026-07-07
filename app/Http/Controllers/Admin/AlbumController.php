<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AlbumController extends Controller
{
    public function index(): View
    {
        return view('admin.albums.index', [
            'albums' => Album::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.albums.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'date' => 'nullable|date',
            'youtube' => 'nullable|max:255',
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('albums', 'public');
            }
        }

        $data['images'] = $imagePaths;

        Album::create($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album created successfully.');
    }

    public function edit(Album $album): View
    {
        return view('admin.albums.edit', compact('album'));
    }

    public function update(Request $request, Album $album): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'date' => 'nullable|date',
            'youtube' => 'nullable|max:255',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $imagePaths = $album->images ?? [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('albums', 'public');
            }
        }

        $data['images'] = $imagePaths;

        $album->update($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album): RedirectResponse
    {
        $album->delete();

        return redirect()->route('admin.albums.index')->with('success', 'Album deleted successfully.');
    }

    public function destroyImage(Album $album, $index): RedirectResponse
    {
        $images = $album->images ?? [];
        if (isset($images[$index])) {
            unset($images[$index]);
            $album->update(['images' => array_values($images)]);
        }

        return back()->with('success', 'Image removed successfully.');
    }
}
