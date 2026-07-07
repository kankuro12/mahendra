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
            'albums' => Album::withCount('items')->latest()->get(),
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
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('albums', 'public');
        }

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
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('albums', 'public');
        }

        $album->update($data);

        return redirect()->route('admin.albums.index')->with('success', 'Album updated successfully.');
    }

    public function destroy(Album $album): RedirectResponse
    {
        $album->delete();

        return redirect()->route('admin.albums.index')->with('success', 'Album deleted successfully.');
    }
}
