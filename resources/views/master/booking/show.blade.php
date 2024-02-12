<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <div class="flex items-center justify-between">
                <span class="text-gray-800 ">{{ \Carbon\Carbon::parse($booking->bookingdate)->format('d M, Y')
                    }}</span>
                @if ($booking->bookingstatus == 0)
                <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-600 rounded">Menunggu Konfirmasi
                    @elseif ($booking->bookingstatus == 1)
                    <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-yellow-600 rounded">Check Spooring
                        @elseif ($booking->bookingstatus == 2)
                        <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-400 rounded">Konfirmasi
                            Pelanggan
                            @elseif ($booking->bookingstatus == 3)
                            <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-pink-400 rounded">Proses
                                Pengerjaan Spooring
                                @elseif ($booking->bookingstatus == 4)
                                <span
                                    class="px-4 py-1 text-sm font-semibold text-gray-100 bg-green-600 rounded">Spooring
                                    Selesai
                                    @elseif ($booking->bookingstatus == 5)
                                    <span
                                        class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-600 rounded">Pelanggan
                                        Setuju
                                        @elseif ($booking->bookingstatus == 6)
                                        <span
                                            class="px-4 py-1 text-sm font-semibold text-gray-100 bg-red-600 rounded">Pelanggan
                                            Tidak Setuju
                                            @endif
                                        </span>
            </div>

            <div class="mt-5 text-left">
                <h1 class="mb-2 text-lg font-semibold text-gray-800">Detail Booking Spooring - {{
                    strtoupper($booking->id) }}
                </h1>

                <ul class="mb-5 space-y-3">
                    <x-home.list title="Nama" value="{{ ucwords($booking->fullname) }}" />
                    <x-home.list title="Email" value="{{ ucwords($booking->email) }}" />
                    <x-home.list title="No. Hp" value="{{ ucwords($booking->nohp) }}" />
                    <x-home.list title="Kendaraan"
                        value="{{ ucwords($booking->type) }} - ({{ strtoupper($booking->plat) }})" />
                    <x-home.list title="Keterangan" value="{{ ucwords($booking->bookingdesc) }}" />
                </ul>
            </div>
        </x-master.card>
    </section>

</x-app-layout>
