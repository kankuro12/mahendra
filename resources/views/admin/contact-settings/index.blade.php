@extends('admin.layouts.app')

@section('page-title', 'Contact Settings')
@section('title', 'Contact Settings - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-4xl">
        <form method="POST" action="{{ route('admin.contact-settings.update') }}">
            @csrf @method('PUT')

            {{-- Addresses --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Addresses</h3>
                    <button type="button" onclick="addRow('addresses')" class="text-sm text-[#b1002c] hover:underline flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">add</span> Add Address
                    </button>
                </div>
                <div id="addresses-container" class="space-y-3">
                    @foreach ($addresses as $i => $addr)
                        <div class="addresses-row flex gap-3 items-start bg-gray-50 p-3 rounded-lg border border-gray-200" data-repeater>
                            <div class="flex-1 space-y-2">
                                <input name="addresses[{{ $i }}][label]" value="{{ $addr['label'] ?? '' }}" placeholder="Label (e.g. Main Campus)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                                <input name="addresses[{{ $i }}][address]" value="{{ $addr['address'] ?? '' }}" placeholder="Full address" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                                <input name="addresses[{{ $i }}][map]" value="{{ $addr['map'] ?? '' }}" placeholder="Google Maps URL (optional)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                            </div>
                            <button type="button" data-remove class="p-1.5 text-gray-400 hover:text-red-500 mt-1">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Phones --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Phone Numbers</h3>
                    <button type="button" onclick="addRow('phones')" class="text-sm text-[#b1002c] hover:underline flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">add</span> Add Phone
                    </button>
                </div>
                <div id="phones-container" class="space-y-3">
                    @foreach ($phones as $i => $phone)
                        <div class="phones-row flex gap-3 items-start bg-gray-50 p-3 rounded-lg border border-gray-200" data-repeater>
                            <div class="flex-1 grid grid-cols-2 gap-3">
                                <input name="phones[{{ $i }}][label]" value="{{ $phone['label'] ?? '' }}" placeholder="Label (e.g. Admissions)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                                <input name="phones[{{ $i }}][number]" value="{{ $phone['number'] ?? '' }}" placeholder="Phone number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                            </div>
                            <button type="button" data-remove class="p-1.5 text-gray-400 hover:text-red-500 mt-1">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Emails --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Emails</h3>
                    <button type="button" onclick="addRow('emails')" class="text-sm text-[#b1002c] hover:underline flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">add</span> Add Email
                    </button>
                </div>
                <div id="emails-container" class="space-y-3">
                    @foreach ($emails as $i => $email)
                        <div class="emails-row flex gap-3 items-start bg-gray-50 p-3 rounded-lg border border-gray-200" data-repeater>
                            <div class="flex-1 grid grid-cols-2 gap-3">
                                <input name="emails[{{ $i }}][label]" value="{{ $email['label'] ?? '' }}" placeholder="Label (e.g. General Inquiries)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                                <input name="emails[{{ $i }}][address]" value="{{ $email['address'] ?? '' }}" placeholder="Email address" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                            </div>
                            <button type="button" data-remove class="p-1.5 text-gray-400 hover:text-red-500 mt-1">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Map Embed --}}
            <div class="mb-8">
                <h3 class="text-base font-semibold text-gray-900 mb-3">Map</h3>
                <div class="space-y-1.5">
                    <label for="map_embed_url" class="block text-sm font-medium text-gray-700">Google Maps Embed URL</label>
                    <input type="url" name="map_embed_url" id="map_embed_url" value="{{ $map_embed_url }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none"
                        placeholder="https://www.google.com/maps/embed?pb=...">
                    <p class="text-xs text-gray-400">Go to Google Maps &rarr; Share &rarr; Embed a map &rarr; Copy the <code>src</code> URL from the iframe.</p>
                </div>
            </div>

            {{-- Office Hours --}}
            <div class="mb-8">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-base font-semibold text-gray-900">Office Hours</h3>
                    <button type="button" onclick="addRow('hours')" class="text-sm text-[#b1002c] hover:underline flex items-center gap-1">
                        <span class="material-symbols-outlined text-[16px]">add</span> Add Hours
                    </button>
                </div>
                <div id="hours-container" class="space-y-3">
                    @foreach ($hours as $i => $hour)
                        <div class="hours-row flex gap-3 items-start bg-gray-50 p-3 rounded-lg border border-gray-200" data-repeater>
                            <div class="flex-1 grid grid-cols-2 gap-3">
                                <input name="hours[{{ $i }}][day]" value="{{ $hour['day'] ?? '' }}" placeholder="Day (e.g. Mon-Fri)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                                <input name="hours[{{ $i }}][time]" value="{{ $hour['time'] ?? '' }}" placeholder="Time (e.g. 9:00 AM - 4:30 PM)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">
                            </div>
                            <button type="button" data-remove class="p-1.5 text-gray-400 hover:text-red-500 mt-1">
                                <span class="material-symbols-outlined text-[18px]">close</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center gap-3 pt-3 border-t border-gray-200">
                <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                    Save Settings
                </button>
            </div>
        </form>
    </div>

    <script>
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-remove]');
        if (btn) btn.closest('[data-repeater]').remove();
    });

    function addRow(type) {
        var container = document.getElementById(type + '-container');
        var idx = container.children.length;
        var div = document.createElement('div');
        div.className = type + '-row flex gap-3 items-start bg-gray-50 p-3 rounded-lg border border-gray-200';
        div.setAttribute('data-repeater', '');

        var inputs = '';
        if (type === 'addresses') {
            inputs = '<div class="flex-1 space-y-2">' +
                '<input name="addresses[' + idx + '][label]" placeholder="Label (e.g. Main Campus)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '<input name="addresses[' + idx + '][address]" placeholder="Full address" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '<input name="addresses[' + idx + '][map]" placeholder="Google Maps URL (optional)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '</div>';
        } else if (type === 'phones') {
            inputs = '<div class="flex-1 grid grid-cols-2 gap-3">' +
                '<input name="phones[' + idx + '][label]" placeholder="Label (e.g. Admissions)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '<input name="phones[' + idx + '][number]" placeholder="Phone number" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '</div>';
        } else if (type === 'emails') {
            inputs = '<div class="flex-1 grid grid-cols-2 gap-3">' +
                '<input name="emails[' + idx + '][label]" placeholder="Label (e.g. General Inquiries)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '<input name="emails[' + idx + '][address]" placeholder="Email address" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '</div>';
        } else if (type === 'hours') {
            inputs = '<div class="flex-1 grid grid-cols-2 gap-3">' +
                '<input name="hours[' + idx + '][day]" placeholder="Day (e.g. Mon-Fri)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '<input name="hours[' + idx + '][time]" placeholder="Time (e.g. 9:00 AM - 4:30 PM)" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none">' +
                '</div>';
        }

        div.innerHTML = inputs + '<button type="button" data-remove class="p-1.5 text-gray-400 hover:text-red-500 mt-1"><span class="material-symbols-outlined text-[18px]">close</span></button>';
        container.appendChild(div);
    }
    </script>
@endsection
