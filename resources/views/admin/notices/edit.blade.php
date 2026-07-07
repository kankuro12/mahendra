@extends('admin.layouts.app')

@section('page-title', 'Edit Notice')
@section('title', 'Edit Notice - Admin')

@section('content')
    <div class="bg-white rounded-xl border border-gray-200 p-6 max-w-3xl">
        <form method="POST" action="{{ route('admin.notices.update', $notice) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="space-y-5">
                @include('admin._form_components', ['name' => 'title', 'label' => 'Title', 'required' => true, 'value' => $notice->title, 'placeholder' => 'Notice title'])
                @include('admin._form_components', ['name' => 'content', 'label' => 'Content', 'type' => 'summernote', 'required' => true, 'value' => $notice->content])
                @include('admin._form_components', ['name' => 'is_urgent', 'label' => 'Urgent', 'type' => 'checkbox', 'value' => $notice->is_urgent, 'placeholder' => 'Mark as urgent'])
                @include('admin._form_components', ['name' => 'published_at', 'label' => 'Published Date', 'type' => 'date', 'value' => $notice->published_at])
                @include('admin._form_components', ['name' => 'attachment', 'label' => 'Attachment', 'type' => 'file', 'value' => $notice->attachment_path])

                <div class="flex items-center gap-3 pt-3">
                    <button type="submit" class="px-5 py-2.5 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors">
                        Update Notice
                    </button>
                    <a href="{{ route('admin.notices.index') }}" class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
