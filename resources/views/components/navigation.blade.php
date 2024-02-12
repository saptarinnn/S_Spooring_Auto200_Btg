<header
    class="fixed z-50 flex flex-wrap w-full py-4 text-sm bg-white shadow lg:text-base sm:justify-start sm:flex-nowrap">
    <nav class="container relative w-full px-4 mx-auto sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <a class="flex-none" href="/" aria-label="Brand">
                <img class="w-auto h-8 sm:h-10" src="{{ asset('img/logo.png') }}" alt="">
            </a>

            <div class="sm:hidden">
                <button type="button"
                    class="flex items-center justify-center text-sm font-semibold border rounded-lg text-red hs-collapse-toggle w-9 h-9 gap-x-2 border-red/20 hover:border-red/40 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation">

                    <i class='flex-shrink-0 font-medium bx-xs bx bx-menu hs-collapse-open:hidden'></i>
                    <i class='flex-shrink-0 hidden font-medium bx-xs bx bx-x hs-collapse-open:block'></i>

                </button>
            </div>
        </div>
        <div id="navbar-collapse-with-animation"
            class="hidden overflow-hidden transition-all duration-300 hs-collapse basis-full grow sm:block">
            <div
                class="flex flex-col mt-5 gap-y-2 gap-x-0 sm:flex-row sm:items-center sm:justify-end sm:gap-y-0 sm:gap-x-5 sm:mt-0 sm:ps-7">
                <div class="flex justify-center gap-8 mb-4 sm:gap-4 sm:mb-0">
                    <a class="flex items-center font-medium text-gray-600 gap-x-2" href="{{ $yt ?? '' }}"
                        target="_blank">
                        <i class='text-xl bx bxl-youtube'></i>
                    </a>
                    <a class="flex items-center font-medium text-gray-600 gap-x-2" href="{{ $fb ?? '' }}"
                        target="_blank">
                        <i class='text-xl bx bxl-facebook-square'></i>
                    </a>
                    <a class="flex items-center font-medium text-gray-600 gap-x-2" href="{{ $ig ?? '' }}"
                        target="_blank">
                        <i class='text-xl bx bxl-instagram-alt'></i>
                    </a>
                </div>

                <div class="hidden sm:block w-5 h-[2px] rounded-lg rotate-90 bg-gray-300"></div>

                @auth
                <a class="flex items-center px-3 py-2 font-medium text-gray-600 bg-gray-100 rounded-lg gap-x-2 hover:text-gray-700 hover:bg-gray-200"
                    href="{{ route('dashboard') }}">
                    <i class='bx bx-user bx-xs'></i>
                    {{ ucwords(Auth::user()->fullname) }}
                </a>
                @else
                <a class="flex items-center px-3 py-2 font-medium text-gray-600 bg-gray-100 rounded-lg gap-x-2 hover:text-gray-700 hover:bg-gray-200"
                    href="{{ route('login') }}">
                    <i class='bx bx-user bx-xs'></i>
                    Log in
                </a>
                @endauth
            </div>
        </div>
    </nav>
</header>
