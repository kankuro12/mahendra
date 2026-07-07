<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.site-settings.index', [
            'school_name' => Setting::get('site_school_name', 'Mahendra School'),
            'school_tagline' => Setting::get('site_school_tagline', 'Developing leaders through quality education and discipline since 1956.'),
            'nav_phone' => Setting::get('site_nav_phone', '+977-1-4XXXXXX'),
            'nav_email' => Setting::get('site_nav_email', 'info@mahendraschool.edu.np'),
            'footer_address' => Setting::get('site_footer_address', 'Jhapa, Koshi Province, Nepal'),
            'footer_copyright' => Setting::get('site_footer_copyright', '© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.'),
            'social_facebook' => Setting::get('site_social_facebook', 'https://facebook.com/mahendraschool'),
            'social_youtube' => Setting::get('site_social_youtube', 'https://youtube.com/mahendraschool'),
            'social_linkedin' => Setting::get('site_social_linkedin', 'https://linkedin.com/school/mahendraschool'),
            'social_instagram' => Setting::get('site_social_instagram', ''),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'school_name' => 'nullable|string|max:255',
            'school_tagline' => 'nullable|string|max:500',
            'nav_phone' => 'nullable|string|max:50',
            'nav_email' => 'nullable|string|max:255',
            'footer_address' => 'nullable|string|max:500',
            'footer_copyright' => 'nullable|string|max:500',
            'social_facebook' => 'nullable|string|max:500',
            'social_youtube' => 'nullable|string|max:500',
            'social_linkedin' => 'nullable|string|max:500',
            'social_instagram' => 'nullable|string|max:500',
        ]);

        foreach ($data as $key => $value) {
            Setting::set('site_'.$key, $value);
        }

        return redirect()->route('admin.site-settings.index')
            ->with('success', 'Site settings updated.');
    }
}
