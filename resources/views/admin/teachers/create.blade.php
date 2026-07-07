@extends('admin.layouts.app')

@section('page-title', 'Create Teacher')
@section('title', 'Create Teacher - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.teachers.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="space-y-5">
                <div class="space-y-1.5">
                    <label for="department_id" class="block text-sm font-medium text-gray-700">Department <span class="text-red-500">*</span></label>
                    <select name="department_id" id="department_id" required
                        class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm">
                        <option value="">Select Department</option>
                        @foreach ($departments as $dept)
                            <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>{{ $dept->name }}</option>
                        @endforeach
                    </select>
                    @error('department_id')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                @include('admin._form_components', ['name' => 'name', 'label' => 'Name', 'required' => true, 'placeholder' => 'Full name'])
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'placeholder' => 'e.g. Mathematics Teacher'])
                @include('admin._form_components', ['name' => 'credentials', 'label' => 'Credentials', 'placeholder' => 'e.g. M.Sc., B.Ed.'])
                @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'placeholder' => '0'])
                @include('admin._form_components', ['name' => 'image', 'label' => 'Profile Image', 'type' => 'file'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Create Teacher
                    </button>
                    <a href="{{ route('admin.teachers.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
