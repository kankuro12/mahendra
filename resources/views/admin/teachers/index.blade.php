@extends('admin.layouts.app')

@section('page-title', 'Teachers')
@section('title', 'Teachers - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.teachers.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Teacher
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Department</th>
                        <th>Image</th>
                        <th>Order</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $teacher->name }}</td>
                            <td class="text-sm text-gray-500">{{ $teacher->title }}</td>
                            <td class="text-sm">{{ $teacher->department?->name ?? '--' }}</td>
                            <td>
                                @if ($teacher->image)
                                    <img src="{{ asset('storage/' . $teacher->image) }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <span class="text-gray-400 text-xs">--</span>
                                @endif
                            </td>
                            <td class="text-sm">{{ $teacher->sort_order ?? '--' }}</td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.teachers.edit', $teacher) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this teacher?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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

        <div id="cardView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
            @forelse ($teachers as $teacher)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4 text-center">
                    @if ($teacher->image)
                        <img src="{{ asset('storage/' . $teacher->image) }}" class="w-20 h-20 rounded-full object-cover mx-auto mb-3">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gray-100 mx-auto mb-3 flex items-center justify-center">
                            <span class="material-symbols-outlined text-3xl text-gray-300">person</span>
                        </div>
                    @endif
                    <h4 class="font-medium text-gray-900 text-sm">{{ $teacher->name }}</h4>
                    <p class="text-xs text-gray-500 mt-0.5">{{ $teacher->title }}</p>
                    <p class="text-xs text-gray-400">{{ $teacher->department?->name }}</p>
                    <div class="flex items-center justify-center gap-2 mt-3">
                        <a href="{{ route('admin.teachers.edit', $teacher) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.teachers.destroy', $teacher) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this teacher?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">school</span>
                    <p class="text-sm">No teachers found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
