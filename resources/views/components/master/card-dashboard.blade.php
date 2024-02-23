<div class="flex flex-col bg-white border shadow-sm rounded-xl">
    <div class="flex justify-between p-4 md:p-5 gap-x-3">
        <div>
            <p class="text-xs font-medium tracking-wide text-gray-500 uppercase">
                {{ $title }}
            </p>
            <div class="flex items-end mt-1 gap-x-2">
                <h3 class="text-xl font-bold text-gray-800 sm:text-2xl">
                    {{ $data }}
                </h3>
                <span class="text-xs font-medium text-gray-500 font-base">
                    {{ $subtitle }}
                </span>
            </div>
        </div>
        <div class="flex-shrink-0 flex justify-center items-center size-[46px] {{ $color }} text-white rounded-full">
            <i class='bx-xs {{$icon}}'></i>
        </div>
    </div>

    <a class="inline-flex items-center justify-between px-4 py-3 text-sm text-gray-600 border-t border-gray-200 md:px-5 hover:bg-gray-50 rounded-b-xl"
        href="{{ $link }}">
        View reports
        <i class='bx-xs bx bx-chevron-right'></i>
    </a>
</div>
