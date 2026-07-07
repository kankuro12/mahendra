@extends('admin.layouts.app')

@section('page-title', 'Pages')
@section('title', 'Pages - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.pages.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Page
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Status</th>
                    <th>Updated</th>
                    <th width="140">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pages as $page)
                    <tr>
                        <td class="font-medium text-gray-900">{{ $page->title }}</td>
                        <td class="text-sm text-gray-500">/{{ $page->slug }}</td>
                        <td>
                            @if ($page->published)
                                <span class="px-2 py-0.5 bg-green-50 text-green-600 rounded text-xs font-medium">Published</span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Draft</span>
                            @endif
                        </td>
                        <td class="text-sm text-gray-500">{{ $page->updated_at?->format('M d, Y') ?? '--' }}</td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ url($page->slug) }}" target="_blank" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-blue-600" title="View">
                                    <span class="material-symbols-outlined text-[18px]">open_in_new</span>
                                </a>
                                <a href="{{ route('admin.pages.edit', $page) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this page?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
