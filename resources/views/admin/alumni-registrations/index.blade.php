@extends('admin.layouts.app')

@section('page-title', 'Alumni Registrations')
@section('title', 'Alumni Registrations - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Year</th>
                    <th>Occupation</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registrations as $r)
                    <tr class="{{ !$r->read ? 'font-semibold bg-blue-50/30' : '' }}">
                        <td class="text-gray-900">{{ $r->name }}</td>
                        <td class="text-sm">{{ $r->email }}</td>
                        <td class="text-sm">{{ $r->graduation_year ?? '--' }}</td>
                        <td class="text-sm text-gray-500">{{ Str::limit($r->occupation, 20) ?? '--' }}</td>
                        <td class="text-sm">{{ $r->location ?? '--' }}</td>
                        <td class="text-sm">{{ $r->created_at->format('M d, Y') }}</td>
                        <td>
                            @if ($r->read)
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Read</span>
                            @else
                                <span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-xs font-medium">New</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.alumni-registrations.show', $r) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-blue-600">
                                    <span class="material-symbols-outlined text-[18px]">visibility</span>
                                </a>
                                <form method="POST" action="{{ route('admin.alumni-registrations.destroy', $r) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this registration?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
