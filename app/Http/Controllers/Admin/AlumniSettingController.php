<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AlumniSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.alumni-settings.index', [
            'hero_title' => Setting::get('alumni_hero_title', 'Celebrating Our Global Alumni Network'),
            'hero_subtitle' => Setting::get('alumni_hero_subtitle', 'From community leaders to international innovators, the Mahendra spirit reaches every corner of the globe.'),
            'hero_image' => Setting::get('alumni_hero_image', 'assets/images/img_0c19093695eb.jpg'),
            'stat_countries' => Setting::get('alumni_stat_countries', '50+'),
            'stat_countries_label' => Setting::get('alumni_stat_countries_label', 'Countries Represented'),
            'stat_members' => Setting::get('alumni_stat_members', '15,000+'),
            'stat_members_label' => Setting::get('alumni_stat_members_label', 'Active Members'),
            'stat_scholarships' => Setting::get('alumni_stat_scholarships', '200+'),
            'stat_scholarships_label' => Setting::get('alumni_stat_scholarships_label', 'Scholarships Funded'),
            'stat_years' => Setting::get('alumni_stat_years', '60 Years'),
            'stat_years_label' => Setting::get('alumni_stat_years_label', 'of Academic Legacy'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'hero_title' => 'nullable|string|max:500',
            'hero_subtitle' => 'nullable|string|max:1000',
            'hero_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'stat_countries' => 'nullable|string|max:50',
            'stat_countries_label' => 'nullable|string|max:255',
            'stat_members' => 'nullable|string|max:50',
            'stat_members_label' => 'nullable|string|max:255',
            'stat_scholarships' => 'nullable|string|max:50',
            'stat_scholarships_label' => 'nullable|string|max:255',
            'stat_years' => 'nullable|string|max:50',
            'stat_years_label' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('hero_image')) {
            $path = $request->file('hero_image')->store('alumni', 'public');
            Setting::set('alumni_hero_image', $path);
        }

        unset($data['hero_image']);

        foreach ($data as $key => $value) {
            Setting::set('alumni_'.$key, $value);
        }

        return redirect()->route('admin.alumni-settings.index')
            ->with('success', 'Alumni page settings updated.');
    }
}
