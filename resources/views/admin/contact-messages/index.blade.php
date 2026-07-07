@extends('admin.layouts.app')

@section('page-title', 'Contact Messages')
@section('title', 'Messages - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th width="140">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $msg)
                    <tr class="{{ !$msg->read ? 'font-semibold bg-blue-50/30' : '' }}">
                        <td class="text-gray-900">{{ $msg->name }}</td>
                        <td class="text-sm">{{ $msg->email }}</td>
                        <td class="text-sm text-gray-500">{{ Str::limit($msg->subject ?? '--', 30) }}</td>
                        <td class="text-sm">{{ $msg->created_at->format('M d, Y h:i A') }}</td>
                        <td>
                            @if ($msg->read)
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Read</span>
                            @else
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-xs font-medium">New</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.contact-messages.show', $msg) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-blue-600">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </a>
                                <form method="POST" action="{{ route('admin.contact-messages.destroy', $msg) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this message?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
                                        <span class="material-symbols-outlined text-[18px]">delete</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
