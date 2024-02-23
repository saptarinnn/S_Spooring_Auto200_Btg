<div id="application-sidebar"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
    <div class="px-6">
        <a class="flex-none" href="/">
            <img class="w-48 pb-2" src="{{ asset('img/logo.png') }}" alt="">
        </a>
    </div>

    <nav class="flex flex-col flex-wrap w-full p-6 mt-2 hs-accordion-group" data-hs-accordion-always-open>
        <ul>
            <li class="mb-1 text-[11px] font-bold tracking-wider text-gray-400 uppercase">Dashboard</li>
            <li>
                <a class="sidebar-list {{ Request::is('dashboard*') ? 'bg-gray-200' : '' }}"
                    href="{{ route('dashboard') }}">
                    <i class="text-lg bx bx-layout"></i>
                    Dashboard
                </a>
            </li>

            <li class="mt-6 mb-1 text-[11px] font-bold tracking-wider text-gray-400 uppercase ">Pages</li>
            @hasanyrole('admin')
                <li>
                    <a class="sidebar-list {{ Request::is('homepages*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('homepages.index') }}">
                        <i class="text-lg bx bx-cog"></i>
                        Homepage
                    </a>
                </li>
                <li>
                    <a class="sidebar-list {{ Request::is('users*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('users.index') }}">
                        <i class="text-lg bx bx-group"></i>
                        Pengguna
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|gudang|mekanik|kbengkel')
                <li>
                    <a class="sidebar-list {{ Request::is('barang*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('barang.index') }}">
                        <i class="text-lg bx bx-package"></i>
                        Barang
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|mekanik')
                <li class="mt-6 mb-1 text-[11px] font-bold tracking-wider text-gray-400 uppercase ">Transaction</li>
                <li>
                    <a class="sidebar-list {{ Request::is('booking*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('booking.index') }}">
                        <i class="text-lg bx bx-bookmark-alt-plus"></i>
                        Booking
                    </a>
                </li>
                <li>
                    <a class="sidebar-list {{ Request::is('spooring*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('spooring.index') }}">
                        <i class="text-lg bx bx-check-double"></i>
                        Konfirmasi Spooring
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|gudang|kbengkel')
                <li>
                    <a class="sidebar-list {{ Request::is('brg-masuk*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('brg-masuk.index') }}">
                        <i class="text-lg bx bx-archive-in"></i>
                        Barang Masuk
                    </a>
                </li>
                <li>
                    <a class="sidebar-list {{ Request::is('brg-keluar*') ? 'bg-gray-200' : '' }}"
                        href="{{ route('brg-keluar.index') }}">
                        <i class="text-lg bx bx-archive-out"></i>
                        Barang Keluar
                    </a>
                </li>
            @endhasanyrole

            @hasanyrole('admin|kbengkel')
                <li class="mt-6 mb-1 text-[11px] font-bold tracking-wider text-gray-400 uppercase ">Report</li>
                <li>
                    <a class="sidebar-list" href="#">
                        <i class="text-lg bx bx-file"></i>
                        Laporan Spooring
                    </a>
                </li>
            @endhasanyrole

            {{-- <li class="hs-accordion" id="users-accordion">
                <button type="button"
                    class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Users

                    <svg class="hidden w-4 h-4 hs-accordion-active:block ms-auto" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m18 15-6-6-6 6" />
                    </svg>

                    <svg class="block w-4 h-4 hs-accordion-active:hidden ms-auto" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>

                <div id="users-accordion-child"
                    class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                    <ul class="pt-2 hs-accordion-group ps-3" data-hs-accordion-always-open>
                        <li class="hs-accordion" id="users-accordion-sub-1">
                            <button type="button"
                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Sub Menu 1

                                <svg class="hidden w-4 h-4 hs-accordion-active:block ms-auto"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>

                                <svg class="block w-4 h-4 hs-accordion-active:hidden ms-auto"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div id="users-accordion-sub-1-child"
                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden">
                                <ul class="pt-2 ps-2">
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 1
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 2
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 3
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="hs-accordion" id="users-accordion-sub-2">
                            <button type="button"
                                class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-900 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Sub Menu 2

                                <svg class="hidden w-4 h-4 hs-accordion-active:block ms-auto"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m18 15-6-6-6 6" />
                                </svg>

                                <svg class="block w-4 h-4 hs-accordion-active:hidden ms-auto"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div id="users-accordion-sub-2-child"
                                class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden ps-2">
                                <ul class="pt-2 ps-2">
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 1
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 2
                                        </a>
                                    </li>
                                    <li>
                                        <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                            href="#">
                                            Link 3
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li> --}}

        </ul>
    </nav>
</div>
