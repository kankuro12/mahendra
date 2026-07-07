<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.contact-settings.index', [
            'addresses' => json_decode(Setting::get('contact_addresses', '[]'), true),
            'phones' => json_decode(Setting::get('contact_phones', '[]'), true),
            'emails' => json_decode(Setting::get('contact_emails', '[]'), true),
            'hours' => json_decode(Setting::get('contact_hours', '[]'), true),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'addresses' => 'nullable|array',
            'addresses.*.label' => 'nullable|string|max:255',
            'addresses.*.address' => 'nullable|string|max:500',
            'addresses.*.map' => 'nullable|string|max:500',
            'phones' => 'nullable|array',
            'phones.*.label' => 'nullable|string|max:255',
            'phones.*.number' => 'nullable|string|max:50',
            'emails' => 'nullable|array',
            'emails.*.label' => 'nullable|string|max:255',
            'emails.*.address' => 'nullable|string|max:255',
            'hours' => 'nullable|array',
            'hours.*.day' => 'nullable|string|max:255',
            'hours.*.time' => 'nullable|string|max:255',
        ]);

        Setting::set('contact_addresses', json_encode(array_values($data['addresses'] ?? [])));
        Setting::set('contact_phones', json_encode(array_values($data['phones'] ?? [])));
        Setting::set('contact_emails', json_encode(array_values($data['emails'] ?? [])));
        Setting::set('contact_hours', json_encode(array_values($data['hours'] ?? [])));

        return redirect()->route('admin.contact-settings.index')
            ->with('success', 'Contact settings updated successfully.');
    }
}
