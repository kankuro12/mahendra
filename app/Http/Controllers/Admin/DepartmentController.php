<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        return view('admin.departments.index', [
            'departments' => Department::orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'nullable|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['name']);

        Department::create($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department created successfully.');
    }

    public function edit(Department $department): View
    {
        return view('admin.departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department): RedirectResponse
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'icon' => 'nullable|max:255',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($data['name']);

        $department->update($data);

        return redirect()->route('admin.departments.index')->with('success', 'Department updated successfully.');
    }

    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();

        return redirect()->route('admin.departments.index')->with('success', 'Department deleted successfully.');
    }
}
