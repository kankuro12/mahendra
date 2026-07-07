@extends('admin.layouts.app')

@section('page-title', 'Create FAQ')
@section('title', 'Create FAQ - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.faqs.store') }}">
            @csrf
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'question', 'label' => 'Question', 'required' => true, 'placeholder' => 'Frequently asked question'])
                @include('admin._form_components', ['name' => 'answer', 'label' => 'Answer', 'type' => 'textarea', 'required' => true, 'placeholder' => 'Detailed answer'])
                @include('admin._form_components', ['name' => 'sort_order', 'label' => 'Sort Order', 'type' => 'number', 'placeholder' => '0'])
                @include('admin._form_components', ['name' => 'published', 'label' => 'Status', 'type' => 'checkbox', 'value' => true, 'placeholder' => 'Published'])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">Create FAQ</button>
                    <a href="{{ route('admin.faqs.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
