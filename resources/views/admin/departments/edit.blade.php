@extends('admin.layouts.app')

@section('page-title', 'Edit Department')
@section('title', 'Edit Department - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.departments.update', $department) }}">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'name', 'label' => 'Name', 'required' => true, 'value' => $department->name, 'placeholder' => 'Department name'])
                @include('admin._form_components', ['name' => 'icon', 'label' => 'Icon (Material Symbol name)', 'value' => $department->icon, 'placeholder' => 'e.g. science, math'])
                @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'value' => $department->sort_order, 'placeholder' => '0'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Department
                    </button>
                    <a href="{{ route('admin.departments.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
