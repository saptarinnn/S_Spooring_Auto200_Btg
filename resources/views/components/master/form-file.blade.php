<div class="mb-2">
    <div class="mb-1 sm:col-span-3">
        <label for="{{ $name }}" class="inline-block text-sm font-medium text-gray-700 mt-2.5">
            {{ $label }}
        </label>
    </div>
    <div class="sm:col-span-9">
        <input type="file" id="{{ $name }}" name="{{ $name }}"
            class="block w-full text-sm border border-gray-200 rounded-lg shadow-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none file:bg-gray-50 file:border-0 file:me-4 file:py-3 file:px-4">
    </div>
</div>
