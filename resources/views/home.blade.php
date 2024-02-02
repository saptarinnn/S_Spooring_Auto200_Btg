<x-app-layout title="Spooring Auto2000 Bontang">
    <div
        class="container flex flex-col items-center justify-center min-h-screen gap-6 px-4 pt-24 pb-10 mx-auto sm:px-6 lg:px-8 lg:justify-between lg:flex-row">
        <div class="max-w-lg">
            <h1 class="text-gray-800"><span class="text-3xl md:text-4xl lg:text-5xl spooring">Spooring
                </span><br />
                <span class="text-3xl font-extrabold md:text-[2rem] lg:text-[2.5rem]">Auto<span
                        class="text-red-600">2000</span>
                    Bontang
                </span>
            </h1>

            <p class="mt-4 text-base text-gray-500">Sistem
                dikembangkan untuk melakukan proses booking Spooring pada <span class="font-extrabold">Auto<span
                        class="text-red-600">2000</span></span> Bontang. Selain proses
                booking sistem ini juga digunakan untuk monitoring proses dari spooring.</p>

            <div class="flex flex-col gap-2 mt-10 md:flex-row">
                <button type="button"
                    class="w-full px-6 py-2.5 text-sm font-medium leading-5 text-center text-white capitalize bg-red-600 rounded-lg hover:bg-red-500 lg:mx-0 lg:w-auto focus:outline-none"
                    data-hs-overlay="#booking-spooring">
                    Booking Spooring</button>
                <button type="button"
                    class="w-full px-6 py-2.5 text-sm font-medium leading-5 text-center text-gray-700 capitalize bg-gray-200 rounded-lg hover:bg-gray-100 lg:mx-0 lg:w-auto focus:outline-none"
                    data-hs-overlay="#cek-status-spooring">
                    Cek Status Spooring</button>
            </div>
        </div>

        <div class="flex items-center justify-center w-full lg:justify-end">
            <img class="object-cover w-full h-full max-w-lg rounded-md lg:max-w-xl"
                src="{{ asset('img/liz-fitch-r7iqwIe32RA-unsplash.jpg') }}" alt="" />
        </div>
    </div>

    {{-- Modal Booking Spooring --}}
    <x-modal id="booking-spooring">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Booking Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan masukkan data untuk booking spooring <span class="font-semibold">Auto<span
                        class="text-red-600">2000</span>
                    Bontang</span> .
            </p>
        </div>

        <form class="" method="POST" action="">
            @csrf
            <div class="grid gap-y-4">
                <!-- Form Group -->
                <x-input name="nama" label="Nama Lengkap" />
                <x-input name="plat" label="Plat Kendaraan" />
                <x-input name="jenis" label="Jenis Kendaraan" />
                <x-input type="number" name="no_hp" label="No. Hp" />
                <x-input type="email" name="email" label="Email" />
                <x-input type="date" name="tgl_booking" label="Tanggal Booking" />
                <!-- End Form Group -->

                <button type="submit"
                    class="w-full py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Booking Spooring
                </button>
            </div>
        </form>
    </x-modal>

    {{-- Modal Cek Status Spooring --}}
    <x-modal id="cek-status-spooring">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Cek Status Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan masukkan token booking untuk melihat status spooring.
            </p>
        </div>

        <form class="" method="POST" action="">
            <div class="grid gap-y-4">
                <!-- Form Group -->
                <x-input name="token" label="Token Booking" />
                <!-- End Form Group -->

                <button type="submit"
                    class="w-full py-2 text-sm font-semibold text-white bg-red-600 rounded-lg hover:bg-red-700">
                    Cek Token
                </button>
            </div>
        </form>
    </x-modal>

</x-app-layout>
