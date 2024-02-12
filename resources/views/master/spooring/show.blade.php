<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <div class="flex items-center justify-between">
                <span class="text-gray-800 ">{{ \Carbon\Carbon::parse($spooring->spooringdate)->format('d M, Y')
                    }}</span>
                @if ($spooring->booking->bookingstatus == 0)
                <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-600 rounded">Menunggu Konfirmasi
                    @elseif ($spooring->booking->bookingstatus == 1)
                    <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-yellow-600 rounded">Check Spooring
                        @elseif ($spooring->booking->bookingstatus == 2)
                        <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-400 rounded">Konfirmasi
                            Pelanggan
                            @elseif ($spooring->booking->bookingstatus == 3)
                            <span class="px-4 py-1 text-sm font-semibold text-gray-100 bg-pink-400 rounded">Proses
                                Pengerjaan Spooring
                                @elseif ($spooring->booking->bookingstatus == 4)
                                <span
                                    class="px-4 py-1 text-sm font-semibold text-gray-100 bg-green-600 rounded">Spooring
                                    Selesai
                                    @elseif ($spooring->booking->bookingstatus == 5)
                                    <span
                                        class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-600 rounded">Pelanggan
                                        Setuju
                                        @elseif ($spooring->booking->bookingstatus == 6)
                                        <span
                                            class="px-4 py-1 text-sm font-semibold text-gray-100 bg-red-600 rounded">Pelanggan
                                            Tidak Setuju
                                            @endif
                                        </span>
            </div>

            <div class="mt-5 text-left">
                <h1 class="mb-2 text-lg font-semibold text-gray-800">Detail Spooring - {{ strtoupper($spooring->id) }}
                </h1>

                <ul class="mb-5 space-y-3">
                    <x-home.list title="Nama" value="{{ ucwords($spooring->booking->fullname) }}" />
                    <x-home.list title="Email" value="{{ ucwords($spooring->booking->email) }}" />
                    <x-home.list title="No. Hp" value="{{ ucwords($spooring->booking->nohp) }}" />
                    <x-home.list title="Kendaraan"
                        value="{{ ucwords($spooring->booking->type) }} - ({{ strtoupper($spooring->booking->plat) }})" />
                    <x-home.list title="Keterangan" value="{{ ucwords($spooring->spooringdesc) }}" />
                </ul>

                @if ($spooring->bookingstatus == 3)
                <x-home.button-modal class="text-white bg-red-600 hover:bg-red-500" id="#detail-spooring-konf">
                    Konfirmasi
                </x-home.button-modal>
                @endif

            </div>
        </x-master.card>
    </section>

</x-app-layout>
