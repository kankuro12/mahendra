@extends('admin.layouts.app')

@section('page-title', 'FAQs')
@section('title', 'FAQs - Admin')

@section('content')
    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 bg-[#b1002c] text-white rounded-lg text-sm font-medium hover:bg-[#920022] transition-colors flex items-center gap-1.5">
            <span class="material-symbols-outlined text-[18px]">add</span>
            New FAQ
        </a>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 p-5">
        <table class="data-table w-full">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th width="120">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqs as $faq)
                    <tr>
                        <td class="font-medium text-gray-900">{{ Str::limit($faq->question, 60) }}</td>
                        <td class="text-sm">{{ $faq->sort_order }}</td>
                        <td>
                            @if ($faq->published)
                                <span class="px-2 py-0.5 bg-green-50 text-green-600 rounded text-xs">Published</span>
                            @else
                                <span class="px-2 py-0.5 bg-gray-100 text-gray-500 rounded text-xs">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex items-center gap-1">
                                <a href="{{ route('admin.faqs.edit', $faq) }}" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-[#b1002c]">
                                    <span class="material-symbols-outlined text-[18px]">edit</span>
                                </a>
                                <form method="POST" action="{{ route('admin.faqs.destroy', $faq) }}" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" data-confirm="Delete this FAQ?" class="p-1.5 rounded-lg hover:bg-gray-100 text-gray-500 hover:text-red-600">
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
