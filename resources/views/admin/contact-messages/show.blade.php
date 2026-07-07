@extends('admin.layouts.app')

@section('page-title', 'Message from ' . $message->name)
@section('title', 'Message - Admin')

@section('content')
    <div class="max-w-3xl">
        <div class="mb-4">
            <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-gray-500 hover:text-[#b1002c]">&larr; Back to Messages</a>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">
            <div class="grid grid-cols-2 gap-4 pb-4 border-b border-gray-100">
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Name</p>
                    <p class="text-sm font-medium text-gray-900">{{ $message->name }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Email</p>
                    <p class="text-sm text-gray-900"><a href="mailto:{{ $message->email }}" class="text-[#b1002c] hover:underline">{{ $message->email }}</a></p>
                </div>
                @if ($message->phone)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Phone</p>
                        <p class="text-sm text-gray-900">{{ $message->phone }}</p>
                    </div>
                @endif
                @if ($message->subject)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wider">Subject</p>
                        <p class="text-sm text-gray-900">{{ $message->subject }}</p>
                    </div>
                @endif
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Date</p>
                    <p class="text-sm text-gray-900">{{ $message->created_at->format('M d, Y h:i A') }}</p>
                </div>
                <div>
                    <p class="text-xs text-gray-400 uppercase tracking-wider">Status</p>
                    <p class="text-sm">{{ $message->read ? 'Read' : 'New' }}</p>
                </div>
            </div>

            <div>
                <p class="text-xs text-gray-400 uppercase tracking-wider mb-2">Message</p>
                <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-wrap leading-relaxed">
                    {{ $message->message }}
                </div>
            </div>
        </div>
    </div>
@endsection
