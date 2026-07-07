<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        return view('admin.teachers.index', [
            'teachers' => Teacher::with('department')->latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.teachers.create', [
            'departments' => Department::orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'credentials' => 'nullable|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teachers', 'public');
        }

        Teacher::create($data);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher created successfully.');
    }

    public function edit(Teacher $teacher): View
    {
        return view('admin.teachers.edit', [
            'teacher' => $teacher,
            'departments' => Department::orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, Teacher $teacher): RedirectResponse
    {
        $data = $request->validate([
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|max:255',
            'title' => 'nullable|max:255',
            'credentials' => 'nullable|max:255',
            'sort_order' => 'nullable|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('teachers', 'public');
        }

        $teacher->update($data);

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated successfully.');
    }

    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->delete();

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully.');
    }
}
