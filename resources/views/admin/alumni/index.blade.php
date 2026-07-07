@extends('admin.layouts.app')

@section('page-title', 'Alumni')
@section('title', 'Alumni - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.alumni.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span> New Alumni
        </a>
    </div>
    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Year</th>
                    <th>Occupation</th>
                    <th>Location</th>
                    <th>Featured</th>
                    <th>Status</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumni as $a)
                    <tr>
                        <td class="font-medium text-gray-900">{{ $a->name }}</td>
                        <td class="text-sm">{{ $a->graduation_year ?? '--' }}</td>
                        <td class="text-sm text-gray-500">{{ Str::limit($a->occupation, 30) ?? '--' }}</td>
                        <td class="text-sm">{{ $a->location ?? '--' }}</td>
                        <td>@if($a->is_featured) <span class="px-2 py-0.5 bg-amber-50 text-amber-600 rounded text-xs">Featured</span> @else <span class="text-gray-400 text-xs">--</span> @endif</td>
                        <td>@if($a->published) <span class="px-2 py-0.5 bg-green-50 text-green-600 rounded text-xs">Published</span> @else <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Draft</span> @endif</td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.alumni.edit', $a) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.alumni.destroy', $a) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this alumni?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
