<div class="mb-2">
    <div class="mb-1 sm:col-span-3">
        <label for="{{ $name }}" class="inline-block text-sm font-medium text-gray-700 mt-2.5">
            {{ $label }}
        </label>
    </div>
    <div class="sm:col-span-9">
        <input id="{{ $name }}" type="{{ $type ?? 'text' }}" name="{{ $name }}"
            class="block w-full px-4 py-2 text-sm text-gray-600 border-gray-200 rounded-lg shadow-sm pe-11 focus:border-red-500 focus:ring-red-500 disabled:opacity-50 disabled:pointer-events-none"
            {{ $required ?? '' }} value="{{ $value ?? '' }}" autocomplete="off" />
    </div>
</div>
