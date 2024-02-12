<div class="mb-2">
    <div class="mb-1 sm:col-span-3">
        <label for="{{ $name }}" class="inline-block text-sm font-medium text-gray-500 mt-2.5">
            {{ $label }}
        </label>
    </div>
    <div class="sm:col-span-9">
        <textarea id="{{ $name }}" name="{{ $name }}"
            class="block w-full px-4 py-3 text-sm border-gray-200 rounded-lg focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none"
            rows="3" placeholder="" {{ $required ?? '' }}>{{ $value ?? "" }}</textarea>
    </div>
</div>
