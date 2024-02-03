<x-guest-layout title="Login | Spooring Auto2000 Bontang">
    <div class="bg-white dark:bg-gray-900">
        <div class="flex justify-center h-screen">
            {{-- Background --}}
            <div class="hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(../img/liz-fitch-r7iqwIe32RA-unsplash.jpg)">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-60">
                    <div>
                        <h1 class="text-white"><span class="text-3xl md:text-4xl lg:text-5xl spooring">Spooring
                            </span><br />
                            <span class="text-3xl font-extrabold md:text-[2rem] lg:text-[2.5rem]">Auto<span
                                    class="text-red-600">2000</span>
                                Bontang
                            </span>
                        </h1>

                        <p class="max-w-xl mt-3 text-gray-200">
                            Sistem dikembangkan untuk melakukan proses booking Spooring pada <span
                                class="font-extrabold">Auto<span class="text-red-600">2000</span></span> Bontang. Selain
                            proses booking sistem ini juga digunakan untuk monitoring proses dari spooring.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Auth --}}
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <div class="flex justify-center mx-auto">
                            <img class="w-auto h-8 sm:h-10" src="{{ asset('img/logo.png') }}" alt="">
                        </div>
                    </div>

                    <div class="mt-8">
                        <form class="" method="POST" action="">
                            @csrf

                            <x-input name="username" label="Username" />
                            <x-input type="password" name="password" label="Password" />

                            <x-button>Sign in</x-button>

                        </form>

                        <p class="mt-6 text-sm text-center text-gray-400">Pelayanan Spooring <span
                                class="font-bold">Auto<span class="text-red-600">2000</span></span> Bontang.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
