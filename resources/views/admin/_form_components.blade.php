{{-- Requires: $name, $label | optional: $type, $value, $required, $placeholder, $help, $slot --}}
@php
    $type = $type ?? 'text';
    $value = $value ?? '';
    $required = $required ?? false;
    $placeholder = $placeholder ?? '';
    $help = $help ?? '';
@endphp
<div class="space-y-1.5">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">
        {{ $label }}
        @if ($required) <span class="text-red-500">*</span> @endif
    </label>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="{{ $name }}" rows="4"
            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
    @elseif ($type === 'summernote')
        <textarea name="{{ $name }}" id="{{ $name }}" class="summernote w-full" {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
    @elseif ($type === 'file')
        <input type="file" name="{{ $name }}" id="{{ $name }}" class="dropify" data-default-file="{{ $value ? asset('storage/' . $value) : '' }}" {{ $required ? 'required' : '' }}>
    @elseif ($type === 'checkbox')
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="hidden" name="{{ $name }}" value="0">
            <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="1" class="rounded border-gray-300 text-[#b1002c] focus:ring-[#b1002c]" {{ old($name, $value) ? 'checked' : '' }}>
            <span class="text-sm text-gray-600">{{ $placeholder }}</span>
        </label>
    @elseif ($type === 'date')
        <input type="date" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value ? (is_string($value) ? $value : $value->format('Y-m-d')) : '') }}"
            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
            {{ $required ? 'required' : '' }}>
    @elseif ($type === 'select')
        <select name="{{ $name }}" id="{{ $name }}"
            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
            {{ $required ? 'required' : '' }}>
            {{ $slot ?? '' }}
        </select>
    @elseif ($type === 'time')
        <input type="time" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
            {{ $required ? 'required' : '' }}>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
            class="w-full px-3 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#b1002c] focus:border-[#b1002c] outline-none text-sm"
            placeholder="{{ $placeholder }}" {{ $required ? 'required' : '' }}>
    @endif
    @if ($help)
        <p class="text-xs text-gray-400">{{ $help }}</p>
    @endif
    @error($name)
        <p class="text-xs text-red-500">{{ $message }}</p>
    @enderror
</div>
