<?php

namespace App\Http\Controllers;

use App\Models\Album;

class GalleryController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return view('gallery', compact('albums'));
    }

    public function show(string $slug)
    {
        $album = Album::where('slug', $slug)->firstOrFail();

        return view('gallery-detail', compact('album'));
    }
}
