<x-guest-layout title="Spooring Auto2000 Bontang">
    {{-- Navigation --}}
    <x-navigation />

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
                <x-home.button-modal class="text-white bg-red-600 hover:bg-red-500" id="#booking-spooring">
                    Booking Spooring
                </x-home.button-modal>
                <x-home.button-modal class="text-gray-700 bg-gray-200 hover:bg-gray-100" id="#cek-status-spooring">
                    Cek Status Spooring
                </x-home.button-modal>
            </div>
        </div>

        <div class="flex items-center justify-center w-full lg:justify-end">
            <img class="object-cover w-full h-full max-w-lg rounded-md lg:max-w-xl"
                src="{{ asset('img/liz-fitch-r7iqwIe32RA-unsplash.jpg') }}" alt="" />
        </div>
    </div>

    {{-- Modal Booking Spooring --}}
    <x-home.modal id="booking-spooring">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Booking Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan masukkan data untuk booking spooring <span class="font-semibold">Auto<span
                        class="text-red-600">2000</span>
                    Bontang</span> .
            </p>
        </div>

        <form class="" method="GET" action="{{ route('success-booking') }}">
            @csrf
            <div class="grid">
                <!-- Form Group -->
                <x-home.form-input name="nama" label="Nama Lengkap" />
                <x-home.form-input name="plat" label="Plat Kendaraan" />
                <x-home.form-input name="jenis" label="Jenis Kendaraan" />
                <x-home.form-input type="number" name="no_hp" label="No. Hp" />
                <x-home.form-input type="email" name="email" label="Email" />
                <x-home.form-input type="date" name="tgl_booking" label="Tanggal Booking" />
                <!-- End Form Group -->

                <x-home.button>Booking Spooring</x-home.button>
            </div>
        </form>
    </x-home.modal>

    {{-- Modal Cek Status Spooring --}}
    <x-home.modal id="cek-status-spooring">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Cek Status Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan masukkan token booking untuk melihat status spooring.
            </p>
        </div>

        <form class="" method="GET" action="{{ route('detail-spooring') }}">
            @csrf
            <div class="grid">
                <!-- Form Group -->
                <x-home.form-input name="token" label="Token Booking" />
                <!-- End Form Group -->

                <x-home.button>Cari Token</x-home.button>
            </div>
        </form>
    </x-home.modal>

</x-guest-layout>
