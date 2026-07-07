<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LeadershipMessage;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.home-settings.index', [
            'hero_badge' => Setting::get('home_hero_badge', 'Established 1956'),
            'hero_title' => Setting::get('home_hero_title', 'Empowering Minds, Shaping Futures'),
            'hero_subtitle' => Setting::get('home_hero_subtitle', 'Mahendra Secondary School - A Legacy of Excellence in providing world-class education for the leaders of tomorrow.'),
            'hero_image' => Setting::get('home_hero_image', 'assets/images/img_8bfe976c8a21.jpg'),
            'cta_primary_text' => Setting::get('home_cta_primary_text', 'Discover Our History'),
            'cta_primary_link' => Setting::get('home_cta_primary_link', '/about'),
            'cta_secondary_text' => Setting::get('home_cta_secondary_text', 'Virtual Tour'),
            'cta_secondary_link' => Setting::get('home_cta_secondary_link', '/gallery'),
            'leadership_message_id' => Setting::get('home_leadership_message_id', ''),
            'messages' => LeadershipMessage::all(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'hero_badge' => 'nullable|string|max:255',
            'hero_title' => 'nullable|string|max:500',
            'hero_subtitle' => 'nullable|string|max:1000',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'cta_primary_text' => 'nullable|string|max:255',
            'cta_primary_link' => 'nullable|string|max:500',
            'cta_secondary_text' => 'nullable|string|max:255',
            'cta_secondary_link' => 'nullable|string|max:500',
            'leadership_message_id' => 'nullable|exists:leadership_messages,id',
        ]);

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('home', 'public');
            Setting::set('home_hero_image', $path);
        }

        unset($data['hero_image']);

        foreach ($data as $key => $value) {
            Setting::set('home_'.$key, $value);
        }

        return redirect()->route('admin.home-settings.index')
            ->with('success', 'Home page settings updated successfully.');
    }
}
