<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FacilityController extends Controller
{
    public function index(): View
    {
        return view('admin.facilities.index', [
            'facilities' => Facility::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.facilities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'tagline' => 'nullable|max:255',
            'icon' => 'nullable|max:255',
            'summary' => 'nullable',
            'description' => 'nullable',
            'features' => 'nullable',
            'coordinator' => 'nullable|max:255',
            'coordinator_role' => 'nullable|max:255',
            'specifications' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['features'] = $data['features'] ? array_filter(explode("\n", str_replace("\r", '', $data['features']))) : [];
        $data['specifications'] = $data['specifications'] ? array_filter(explode("\n", str_replace("\r", '', $data['specifications']))) : [];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility created successfully.');
    }

    public function edit(Facility $facility): View
    {
        return view('admin.facilities.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'tagline' => 'nullable|max:255',
            'icon' => 'nullable|max:255',
            'summary' => 'nullable',
            'description' => 'nullable',
            'features' => 'nullable',
            'coordinator' => 'nullable|max:255',
            'coordinator_role' => 'nullable|max:255',
            'specifications' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['features'] = $data['features'] ? array_filter(explode("\n", str_replace("\r", '', $data['features']))) : [];
        $data['specifications'] = $data['specifications'] ? array_filter(explode("\n", str_replace("\r", '', $data['specifications']))) : [];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('facilities', 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')->with('success', 'Facility updated successfully.');
    }

    public function destroy(Facility $facility): RedirectResponse
    {
        $facility->delete();

        return redirect()->route('admin.facilities.index')->with('success', 'Facility deleted successfully.');
    }
}
