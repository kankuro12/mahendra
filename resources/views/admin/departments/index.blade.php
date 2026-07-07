@extends('admin.layouts.app')

@section('page-title', 'Departments')
@section('title', 'Departments - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-2">
            <button id="viewTable" class="view-toggle-btn active px-3 py-1.5 text-sm rounded-lg border">Table</button>
            <button id="viewCard" class="view-toggle-btn px-3 py-1.5 text-sm rounded-lg border">Cards</button>
        </div>
        <a href="{{ route('admin.departments.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New Department
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <div id="tableView" class="active">
            <table class="data-table w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Icon</th>
                        <th>Sort Order</th>
                        <th>Teachers</th>
                        <th width="120">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department)
                        <tr>
                            <td class="font-medium text-gray-900">{{ $department->name }}</td>
                            <td class="text-sm text-gray-500">{{ $department->slug }}</td>
                            <td>
                                @if ($department->icon)
                                    <span class="material-symbols-outlined text-[#b1002c]">{{ $department->icon }}</span>
                                @else
                                    <span class="text-gray-400 text-xs">--</span>
                                @endif
                            </td>
                            <td class="text-sm">{{ $department->sort_order ?? '--' }}</td>
                            <td class="text-sm">{{ $department->teachers_count ?? $department->teachers()->count() }}</td>
                            <td>
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('admin.departments.edit', $department) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                        <span class="material-symbols-outlined text-[18px]">edit</span>
                                    </a>
                                    <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" data-confirm="Delete this department?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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

        <div id="cardView" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse ($departments as $department)
                <div class="card-item bg-white border border-gray-200 rounded-xl p-4">
                    <div class="flex items-center gap-3 mb-2">
                        @if ($department->icon)
                            <span class="material-symbols-outlined text-3xl text-[#b1002c]">{{ $department->icon }}</span>
                        @endif
                        <div>
                            <h4 class="font-medium text-gray-900 text-sm">{{ $department->name }}</h4>
                            <p class="text-xs text-gray-400">{{ $department->teachers()->count() }} teachers</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mt-3">
                        <a href="{{ route('admin.departments.edit', $department) }}" class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs hover:bg-gray-100">Edit</a>
                        <form method="POST" action="{{ route('admin.departments.destroy', $department) }}" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" data-confirm="Delete this department?" class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs hover:bg-red-100">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-8 text-gray-400">
                    <span class="material-symbols-outlined text-4xl block mb-2">category</span>
                    <p class="text-sm">No departments found.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
