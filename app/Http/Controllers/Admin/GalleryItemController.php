<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\GalleryItem;
use Illuminate\Http\JsonResponse;
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

    public function store(Request $request, Album $album): JsonResponse
    {
        if ($request->input('type') === 'youtube') {
            $data = $request->validate([
                'youtube_link' => 'required|string|max:255',
                'sort_order' => 'nullable|integer',
            ]);

            $item = GalleryItem::create([
                'album_id' => $album->id,
                'type' => 'youtube',
                'youtube_link' => $data['youtube_link'],
                'sort_order' => (int) ($data['sort_order'] ?? 0),
            ]);

            return response()->json([
                'success' => true,
                'item' => $this->itemJson($item),
            ]);
        }

        $request->validate([
            'images' => 'required|array',
            'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:10240',
            'sort_order' => 'nullable|integer',
        ]);

        $baseOrder = (int) ($request->input('sort_order', 0));
        $items = [];

        foreach ($request->file('images') as $i => $file) {
            $item = GalleryItem::create([
                'album_id' => $album->id,
                'type' => 'image',
                'photopath' => $file->store('gallery-items', 'public'),
                'sort_order' => $baseOrder + $i,
            ]);

            $items[] = $this->itemJson($item);
        }

        return response()->json([
            'success' => true,
            'items' => $items,
        ]);
    }

    public function destroy(Album $album, GalleryItem $item): JsonResponse
    {
        $item->delete();

        return response()->json(['success' => true]);
    }

    private function itemJson(GalleryItem $item): array
    {
        return [
            'id' => $item->id,
            'type' => $item->type,
            'photopath' => $item->photopath ? asset('storage/'.$item->photopath) : null,
            'youtube_link' => $item->youtube_link,
            'sort_order' => $item->sort_order,
        ];
    }
}
