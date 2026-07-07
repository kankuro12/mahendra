<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(): View
    {
        return view('admin.contact-messages.index', [
            'messages' => ContactMessage::latest()->get(),
        ]);
    }

    public function show(ContactMessage $contactMessage): View
    {
        if (! $contactMessage->read) {
            $contactMessage->update(['read' => true]);
        }

        return view('admin.contact-messages.show', [
            'message' => $contactMessage,
        ]);
    }

    public function destroy(ContactMessage $contactMessage): RedirectResponse
    {
        $contactMessage->delete();

        return redirect()->route('admin.contact-messages.index')
            ->with('success', 'Message deleted.');
    }
}
