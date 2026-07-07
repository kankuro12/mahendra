<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FaqController extends Controller
{
    public function index(): View
    {
        return view('admin.faqs.index', [
            'faqs' => Faq::orderBy('sort_order')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $data['published'] = $request->boolean('published');

        Faq::create($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $data = $request->validate([
            'question' => 'required|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer',
            'published' => 'boolean',
        ]);

        $data['published'] = $request->boolean('published');

        $faq->update($data);

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted.');
    }
}
