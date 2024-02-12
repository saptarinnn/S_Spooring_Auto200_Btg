<x-guest-layout title="Login | Spooring Auto2000 Bontang">
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            {{-- Background --}}
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url(../img/homepage.jpg)">
                <div class="flex items-center h-full px-20 bg-gray-500 bg-opacity-60">
                    <div>
                        <img class="w-auto h-12 sm:h-16" src="{{ asset('img/logo.png') }}" alt="">

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
                        <a href="{{ route('home') }}" class="flex justify-center mx-auto">
                            <img class="w-auto h-8 sm:h-10" src="{{ asset('img/logo.png') }}" alt="">
                        </a>
                    </div>

                    <div class="mt-8">
                        <form class="" method="POST" action="{{ route('login.process') }}">
                            @csrf

                            <x-home.form-input name="username" label="Username" required="" />
                            @error("username")
                            <x-master.form-error message="{{ $message }}" />@enderror

                            <x-home.form-input type="password" name="password" label="Password" required="" />
                            @error("password")
                            <x-master.form-error message="{{ $message }}" />@enderror


                            <x-home.button>Sign in</x-home.button>

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
