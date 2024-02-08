<div class="flex flex-col-reverse gap-3 mt-4 md:flex-row md:items-center md:justify-between">
    <div class="relative flex items-center md:mt-0">
        <span class="absolute">
            <i class="w-5 h-5 mx-4 text-lg text-gray-400 bx bx-search"></i>
        </span>

        <input type="text" placeholder="Search user" id="search" autocomplete="off"
            class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-red-400 focus:ring-red-300 focus:outline-none focus:ring focus:ring-opacity-40">
    </div>

    <a href="{{ $link ?? '#' }}"
        class="flex items-center justify-center w-full px-5 py-2 mt-2 text-sm font-medium text-white transition-colors duration-200 bg-red-500 rounded-lg shrink-0 md:w-auto gap-x-2 hover:bg-red-600 md:mt-0">
        <i class="bx-xs bx bx-plus-circle"></i>
        <span>Tambah Data</span>
    </a>
</div>
