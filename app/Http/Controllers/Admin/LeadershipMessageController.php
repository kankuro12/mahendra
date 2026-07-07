<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LeadershipMessageController extends Controller
{
    public function index(): View
    {
        return view('admin.messages.index', [
            'messages' => LeadershipMessage::latest()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.messages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'role' => 'nullable|max:255',
            'teaser' => 'nullable',
            'paragraphs' => 'nullable',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['paragraphs'] = $data['paragraphs'] ? array_filter(explode("\n---\n", str_replace("\r", '', $data['paragraphs']))) : [];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('messages', 'public');
        }

        LeadershipMessage::create($data);

        return redirect()->route('admin.messages.index')->with('success', 'Message created successfully.');
    }

    public function edit(LeadershipMessage $message): View
    {
        return view('admin.messages.edit', compact('message'));
    }

    public function update(Request $request, LeadershipMessage $message): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'role' => 'nullable|max:255',
            'teaser' => 'nullable',
            'paragraphs' => 'nullable',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['paragraphs'] = $data['paragraphs'] ? array_filter(explode("\n---\n", str_replace("\r", '', $data['paragraphs']))) : [];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('messages', 'public');
        }

        $message->update($data);

        return redirect()->route('admin.messages.index')->with('success', 'Message updated successfully.');
    }

    public function destroy(LeadershipMessage $message): RedirectResponse
    {
        $message->delete();

        return redirect()->route('admin.messages.index')->with('success', 'Message deleted successfully.');
    }
}
