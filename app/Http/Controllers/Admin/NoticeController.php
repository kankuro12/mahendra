<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NoticeController extends Controller
{
    public function index(): View
    {
        return view('admin.notices.index', [
            'notices' => Notice::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.notices.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'is_urgent' => 'boolean',
            'published_at' => 'nullable|date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_urgent'] = $request->boolean('is_urgent');
        $data['published_at'] = $data['published_at'] ?? now();

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('notices', 'public');
        }

        Notice::create($data);

        return redirect()->route('admin.notices.index')->with('success', 'Notice created successfully.');
    }

    public function edit(Notice $notice): View
    {
        return view('admin.notices.edit', compact('notice'));
    }

    public function update(Request $request, Notice $notice): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'is_urgent' => 'boolean',
            'published_at' => 'nullable|date',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['is_urgent'] = $request->boolean('is_urgent');
        $data['published_at'] = $data['published_at'] ?? $notice->published_at;

        if ($request->hasFile('attachment')) {
            $data['attachment_path'] = $request->file('attachment')->store('notices', 'public');
        }

        $notice->update($data);

        return redirect()->route('admin.notices.index')->with('success', 'Notice updated successfully.');
    }

    public function destroy(Notice $notice): RedirectResponse
    {
        $notice->delete();

        return redirect()->route('admin.notices.index')->with('success', 'Notice deleted successfully.');
    }
}
