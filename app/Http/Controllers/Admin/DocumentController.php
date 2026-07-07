<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DocumentController extends Controller
{
    public function index(Request $request): View
    {
        $type = $request->get('type', 'download');
        $documents = Document::where('type', $type)->orderBy('sort_order')->get();

        return view('admin.documents.index', compact('documents', 'type'));
    }

    public function create(Request $request): View
    {
        $type = $request->get('type', 'download');

        return view('admin.documents.create', compact('type'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'type' => 'required|in:download,tender,career',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'reference' => 'nullable|max:255',
            'deadline' => 'nullable|date',
            'file' => 'nullable|file|max:10240',
            'sort_order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $data['published'] = $request->boolean('published');

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        Document::create($data);

        return redirect()->route('admin.documents.index', ['type' => $data['type']])
            ->with('success', 'Document created successfully.');
    }

    public function edit(Document $document): View
    {
        return view('admin.documents.edit', compact('document'));
    }

    public function update(Request $request, Document $document): RedirectResponse
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'reference' => 'nullable|max:255',
            'deadline' => 'nullable|date',
            'file' => 'nullable|file|max:10240',
            'sort_order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $data['published'] = $request->boolean('published');

        if ($request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('admin.documents.index', ['type' => $document->type])
            ->with('success', 'Document updated successfully.');
    }

    public function destroy(Document $document): RedirectResponse
    {
        $type = $document->type;
        $document->delete();

        return redirect()->route('admin.documents.index', ['type' => $type])
            ->with('success', 'Document deleted successfully.');
    }
}
