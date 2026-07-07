@extends('admin.layouts.app')

@section('page-title', 'Registration from ' . $registration->name)
@section('title', 'Registration - Admin')

@section('content')
    <div class="max-w-3xl">
        <div class="mb-4">
            <a href="{{ route('admin.alumni-registrations.index') }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to Registrations</a>
        </div>
        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4 pb-4 border-b border-gray-100">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Name</p>
                    <p class="text-sm font-medium text-gray-900">{{ $registration->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Email</p>
                    <p class="text-sm text-[#b1002c]"><a href="mailto:{{ $registration->email }}" class="hover:underline">{{ $registration->email }}</a></p>
                </div>
                @if ($registration->graduation_year)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Graduation Year</p>
                        <p class="text-sm text-gray-900">{{ $registration->graduation_year }}</p>
                    </div>
                @endif
                @if ($registration->occupation)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Occupation</p>
                        <p class="text-sm text-gray-900">{{ $registration->occupation }}</p>
                    </div>
                @endif
                @if ($registration->location)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Location</p>
                        <p class="text-sm text-gray-900">{{ $registration->location }}</p>
                    </div>
                @endif
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Date</p>
                    <p class="text-sm text-gray-900">{{ $registration->created_at->format('M d, Y h:i A') }}</p>
                </div>
            </div>
            @if ($registration->message)
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Message</p>
                    <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-wrap">{{ $registration->message }}</div>
                </div>
            @endif
        </div>
    </div>
@endsection
