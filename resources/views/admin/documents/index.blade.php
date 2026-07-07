@extends('admin.layouts.app')

@section('page-title', ucfirst($type) . 's')
@section('title', ucfirst($type) . 's - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.documents.index', ['type' => 'download']) }}"
                class="px-3 py-1.5 text-sm rounded-lg border transition-colors {{ $type === 'download' ? 'bg-[#b1002c] text-white border-[#b1002c]' : 'bg-white text-gray-600 border-gray-300 hover:border-[#b1002c]' }}">
                Downloads
            </a>
            <a href="{{ route('admin.documents.index', ['type' => 'tender']) }}"
                class="px-3 py-1.5 text-sm rounded-lg border transition-colors {{ $type === 'tender' ? 'bg-[#b1002c] text-white border-[#b1002c]' : 'bg-white text-gray-600 border-gray-300 hover:border-[#b1002c]' }}">
                Tenders
            </a>
            <a href="{{ route('admin.documents.index', ['type' => 'career']) }}"
                class="px-3 py-1.5 text-sm rounded-lg border transition-colors {{ $type === 'career' ? 'bg-[#b1002c] text-white border-[#b1002c]' : 'bg-white text-gray-600 border-gray-300 hover:border-[#b1002c]' }}">
                Careers
            </a>
        </div>
        <a href="{{ route('admin.documents.create', ['type' => $type]) }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New {{ ucfirst($type) }}
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    @if ($type === 'tender')
                        <th>Reference</th>
                        <th>Deadline</th>
                    @elseif ($type === 'career')
                        <th>Description</th>
                    @endif
                    <th>File</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $doc)
                    <tr>
                        <td class="font-medium text-gray-900">{{ $doc->title }}</td>
                        @if ($type === 'tender')
                            <td class="text-sm text-gray-500">{{ $doc->reference ?? '--' }}</td>
                            <td class="text-sm">{{ $doc->deadline?->format('M d, Y') ?? '--' }}</td>
                        @elseif ($type === 'career')
                            <td class="text-sm text-gray-500">{{ Str::limit($doc->description, 50) ?? '--' }}</td>
                        @endif
                        <td>
                            @if ($doc->file_path)
                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="text-[#b1002c] text-xs hover:underline">View</a>
                            @else
                                <span class="text-gray-400 text-xs">--</span>
                            @endif
                        </td>
                        <td>
                            @if ($doc->published)
                                <span class="px-2 py-0.5 bg-green-50 text-green-600 rounded text-xs font-medium">Active</span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Hidden</span>
                            @endif
                        </td>
                        <td class="text-sm">{{ $doc->sort_order }}</td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.documents.edit', $doc) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.documents.destroy', $doc) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this item?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
