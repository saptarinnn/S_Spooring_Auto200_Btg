<header
    class="sticky top-0 inset-x-0 flex flex-wrap sm:justify-start sm:flex-nowrap z-[48] w-full bg-white border-b text-sm py-4 lg:ps-64 ">
    <nav class="flex items-center w-full px-4 mx-auto basis-full sm:px-6 md:px-8" aria-label="Global">
        <div class="me-5 lg:me-0 lg:hidden">
            <a class="flex-none text-xl font-semibold" href="/" aria-label="Brand">
                <img class="w-72" src="{{ asset('img/logo.png') }}" alt="">
            </a>
        </div>

        <div class="flex items-center justify-end w-full gap-4 ms-auto">
            <div class="mt-1 lg:hidden">
                <button type="button" class="text-gray-500" data-hs-overlay="#application-sidebar"
                    aria-controls="application-sidebar" aria-label="Toggle navigation">
                    <i class="bx bx-menu bx-sm"></i>
                </button>
            </div>

            <div class="flex flex-row items-center justify-end gap-2">

                <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                    <button id="hs-dropdown-with-header" type="button"
                        class="w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm rounded-full border border-transparent bg-gray-100 text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                        <i class="bx bx-user bx-sm"></i>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[15rem] bg-white shadow-md rounded-lg p-2"
                        aria-labelledby="hs-dropdown-with-header">
                        <div class="px-5 py-3 -m-2 bg-gray-100 rounded-t-lg">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-sm font-medium text-gray-800">james@site.com</p>
                        </div>
                        <div class="py-2 mt-2 first:pt-0 last:pb-0">
                            <a class="flex font-medium items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-red-500"
                                href="#">
                                <i class="font-medium bx bx-user bx-xs"></i>
                                Profile
                            </a>
                            <a class="flex font-medium items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-red-800 hover:bg-red-100 focus:ring-2 focus:ring-red-500"
                                href="#">
                                <i class="font-medium bx bx-log-out bx-xs"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
