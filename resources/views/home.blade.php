<x-app-layout title="Spooring Auto2000 Bontang">
    <div
        class="container flex flex-col items-center justify-center min-h-screen gap-6 px-4 pt-24 pb-10 mx-auto lg:flex-row">
        <div class="max-w-lg lg:mx-12">
            <h1 class="text-gray-800"><span class="text-3xl md:text-4xl lg:text-5xl spooring">Spooring
                </span><br />
                <span class="text-3xl font-extrabold md:text-[2rem] lg:text-[2.5rem]">Auto<span
                        class="text-red-600">2000</span>
                    Bontang
                </span>
            </h1>

            <p class="mt-4 text-sm text-gray-500 md:text-base">Sistem
                dikembangkan untuk melakukan proses booking Spooring pada <span class="font-extrabold">Auto<span
                        class="text-red-600">2000</span></span> Bontang. Selain proses
                booking sistem ini juga digunakan untuk monitoring proses dari spooring.</p>

            <div class="flex flex-col gap-2 mt-6 md:flex-row">
                <a href="#"
                    class="w-full px-6 py-2.5 text-sm font-medium leading-5 text-center text-white capitalize bg-red-600 rounded-lg hover:bg-red-500 lg:mx-0 lg:w-auto focus:outline-none">Booking
                    Spooring</a>
                <a href="#"
                    class="w-full px-6 py-2.5 text-sm font-medium leading-5 text-center text-gray-700 capitalize bg-gray-200 rounded-lg hover:bg-gray-100 lg:mx-0 lg:w-auto focus:outline-none">Cek
                    Status Spooring</a>
            </div>
        </div>

        <div class="flex items-center justify-center w-full lg:w-1/2">
            <img class="object-cover w-full h-full max-w-lg rounded-md"
                src="{{ asset('img/liz-fitch-r7iqwIe32RA-unsplash.jpg') }}" alt="" />
        </div>
    </div>
</x-app-layout>
