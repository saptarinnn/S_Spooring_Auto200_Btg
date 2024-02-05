<div class="mt-4 sm:flex sm:items-center sm:justify-between">
    <div class="text-sm text-gray-500">
        Page <span class="font-medium text-gray-700">{{ $from ?? '1' }} of {{ $to ?? '1' }}</span>
    </div>

    <div class="flex items-center mt-4 gap-x-4 sm:mt-0">
        <a href="#"
            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
            <i class="bx bx-xs bx-left-arrow-alt"></i>
            <span>previous</span>
        </a>

        <a href="#"
            class="flex items-center justify-center w-1/2 px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md sm:w-auto gap-x-2 hover:bg-gray-100">
            <span>Next</span>
            <i class="bx bx-xs bx-right-arrow-alt"></i>
        </a>
    </div>
</div>
