<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alumnus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumniController extends Controller
{
    public function index(): View
    {
        return view('admin.alumni.index', [
            'alumni' => Alumnus::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.alumni.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'graduation_year' => 'nullable|integer|min:1950|max:2099',
            'occupation' => 'nullable|max:255',
            'location' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'story' => 'nullable',
            'facebook' => 'nullable|string|max:500',
            'linkedin' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['published'] = $request->boolean('published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('alumni', 'public');
        }

        Alumnus::create($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni created successfully.');
    }

    public function edit(Alumnus $alumnus): View
    {
        return view('admin.alumni.edit', compact('alumnus'));
    }

    public function update(Request $request, Alumnus $alumnus): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'graduation_year' => 'nullable|integer|min:1950|max:2099',
            'occupation' => 'nullable|max:255',
            'location' => 'nullable|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'story' => 'nullable',
            'facebook' => 'nullable|string|max:500',
            'linkedin' => 'nullable|string|max:500',
            'is_featured' => 'boolean',
            'published' => 'boolean',
            'sort_order' => 'nullable|integer',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');
        $data['published'] = $request->boolean('published');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('alumni', 'public');
        }

        $alumnus->update($data);

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni updated successfully.');
    }

    public function destroy(Alumnus $alumnus): RedirectResponse
    {
        $alumnus->delete();

        return redirect()->route('admin.alumni.index')->with('success', 'Alumni deleted.');
    }
}
