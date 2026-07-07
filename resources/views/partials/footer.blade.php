@php
    $schoolName = \App\Models\Setting::get('site_school_name', 'Mahendra Secondary School');
    $tagline = \App\Models\Setting::get('site_school_tagline', 'Developing leaders through quality education and discipline since 1956.');
    $address = \App\Models\Setting::get('site_footer_address', 'Jhapa, Koshi Province, Nepal');
    $phone = \App\Models\Setting::get('site_nav_phone', '+977-23-XXXXXX');
    $email = \App\Models\Setting::get('site_nav_email', 'info@mahendraschool.edu.np');
    $copyright = \App\Models\Setting::get('site_footer_copyright', '© 2024 Mahendra Secondary School. Affiliated with the Government of Nepal.');
    $fb = \App\Models\Setting::get('site_social_facebook', 'https://facebook.com/mahendraschool');
    $yt = \App\Models\Setting::get('site_social_youtube', 'https://youtube.com/mahendraschool');
    $li = \App\Models\Setting::get('site_social_linkedin', 'https://linkedin.com/school/mahendraschool');
    $ig = \App\Models\Setting::get('site_social_instagram', '');
@endphp
<footer class="w-full bg-surface-container-highest border-t border-outline-variant">
    <div class="w-full py-12 px-margin-desktop grid grid-cols-1 md:grid-cols-4 gap-gutter max-w-container-max mx-auto">
        <div class="space-y-6">
            <h3 class="font-headline-md text-headline-md font-bold text-primary">{{ $schoolName }}</h3>
            <p class="font-body-md text-body-md text-on-surface-variant">{{ $tagline }}</p>
            <div class="space-y-3">
                <div class="flex items-center gap-3 text-on-surface">
                    <span class="material-symbols-outlined text-primary">location_on</span>
                    <span class="text-sm">{{ $address }}</span>
                </div>
                <div class="flex items-center gap-3 text-on-surface">
                    <span class="material-symbols-outlined text-primary">call</span>
                    <span class="text-sm">{{ $phone }}</span>
                </div>
                <div class="flex items-center gap-3 text-on-surface">
                    <span class="material-symbols-outlined text-primary">mail</span>
                    <span class="text-sm">{{ $email }}</span>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Quick Links</h4>
            <ul class="space-y-3">
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('notice') }}">Academic Calendar</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('teachers') }}">Staff Directory</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('gallery') }}">Gallery</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('contact') }}">Contact Us</a></li>
            </ul>
        </div>
        <div class="space-y-6">
            <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Institution</h4>
            <ul class="space-y-3">
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('privacy') }}">Privacy Policy</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('tenders') }}">Tenders</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('downloads') }}">Download Center</a></li>
                <li><a class="text-on-surface-variant hover:text-primary transition-colors text-sm" href="{{ route('careers') }}">Careers</a></li>
            </ul>
        </div>
        <div class="space-y-6">
            <h4 class="font-bold text-on-surface border-b border-outline-variant pb-2">Find Us</h4>
            <div class="rounded-lg overflow-hidden h-48 border border-outline-variant shadow-inner">
                <div class="w-full h-full bg-surface-dim flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-4xl">map</span>
                </div>
            </div>
            <div class="flex gap-4">
                @if ($fb)
                    <a class="w-8 h-8 rounded-full flex items-center justify-center hover:scale-110 transition-transform" style="background:#1877F2" href="{{ $fb }}" target="_blank" title="Facebook">
                        @include('partials.social-icons', ['platform' => 'facebook', 'size' => 14])
                    </a>
                @endif
                @if ($yt)
                    <a class="w-8 h-8 rounded-full flex items-center justify-center hover:scale-110 transition-transform" style="background:#FF0000" href="{{ $yt }}" target="_blank" title="YouTube">
                        @include('partials.social-icons', ['platform' => 'youtube', 'size' => 14])
                    </a>
                @endif
                @if ($li)
                    <a class="w-8 h-8 rounded-full flex items-center justify-center hover:scale-110 transition-transform" style="background:#0A66C2" href="{{ $li }}" target="_blank" title="LinkedIn">
                        @include('partials.social-icons', ['platform' => 'linkedin', 'size' => 14])
                    </a>
                @endif
                @if ($ig)
                    <a class="w-8 h-8 rounded-full flex items-center justify-center hover:scale-110 transition-transform" style="background:linear-gradient(135deg,#F58529,#DD2A7B,#8134AF)" href="{{ $ig }}" target="_blank" title="Instagram">
                        @include('partials.social-icons', ['platform' => 'instagram', 'size' => 14])
                    </a>
                @endif
            </div>
        </div>
        <div class="col-span-1 md:col-span-4 pt-12 border-t border-outline-variant flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="font-label-sm text-label-sm text-on-surface-variant">{{ $copyright }}</p>
        </div>
    </div>
</footer>
