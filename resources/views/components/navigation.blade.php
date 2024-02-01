<header class="fixed w-full bg-white">
    <nav x-data="{ isOpen: false }" class="px-6 py-4 shadow">
        <div class="container mx-auto lg:items-center lg:justify-between lg:flex">
            <div class="flex items-center justify-between">
                <a href="#" class="mx-auto ">
                    <img class="w-auto h-10 sm:h-12" src="{{ asset('img/logo.png') }}" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="flex items-center lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="absolute inset-x-0 z-20 w-full px-6 py-4 mt-3 transition-all duration-300 ease-in-out bg-white shadow-md lg:bg-transparent lg:dark:bg-transparent lg:shadow-none dark:bg-gray-900 lg:mt-0 lg:p-0 lg:top-0 lg:relative lg:w-auto lg:opacity-100 lg:translate-x-0 lg:flex lg:items-center">
                <a href="#"
                    class="block px-3 py-2 text-sm font-medium text-gray-600 rounded-lg dark:text-gray-200 hover:bg-gray-100 lg:mx-2">Home</a>

                <a href="#"
                    class="block px-3 py-2 mt-2 text-sm font-medium text-gray-600 transition-colors duration-300 bg-gray-100 rounded-lg sm:mt-0 dark:text-gray-200 hover:bg-gray-100 lg:mx-2">
                    <i class=' bx-xs bx bx-user'></i>
                    Sign In
                </a>
            </div>

        </div>
    </nav>
</header>
