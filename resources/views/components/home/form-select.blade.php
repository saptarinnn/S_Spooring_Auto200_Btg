<div class="mb-3">
    <label for="{{ $name }}" class="text-sm font-medium text-gray-500">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}"
        class="block w-full px-4 py-2 mt-1 text-sm text-gray-600 border-gray-200 rounded-lg focus:border-red-500 focus:ring-red-500"
        required>
        {{ $slot }}
    </select>
</div>
