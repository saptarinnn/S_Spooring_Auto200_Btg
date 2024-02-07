<div id="{{ $id }}"
    class="hs-overlay hidden w-full h-full fixed top-0 start-0 z-[80] bg-black/50 overflow-x-hidden overflow-y-auto">
    <div
        class="flex justify-center items-center min-h-screen max-w-[22.3rem] mx-auto transition-all ease-out opacity-0 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:max-w-lg lg:max-w-2xl sm:w-full">
        <div class="relative flex flex-col my-3 bg-white shadow-lg rounded-xl">
            <div class="absolute top-2 end-2">
                <button type="button"
                    class="flex items-center justify-center w-8 h-8 text-sm font-semibold text-gray-800 border border-transparent rounded-lg hover:bg-gray-100"
                    data-hs-overlay="#{{ $id }}">
                    <span class="sr-only">Close</span>
                    <i class="flex-shrink-0 bx bx-x bx-sm"></i>
                </button>
            </div>

            <div class="px-4 py-6 overflow-y-auto sm:p-10">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
