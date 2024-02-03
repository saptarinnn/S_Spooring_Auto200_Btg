<x-guest-layout title="Detail Spooring | Spooring Auto2000 Bontang">
    {{-- Navigation --}}
    <x-navigation />

    <div class="flex items-center justify-center min-h-screen px-4 mx-auto bg-gray-100 sm:px-6 lg:px-8">
        <div class="container px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
            <div class="flex items-center justify-between">
                <span class="text-sm text-gray-800">Mar 10, 2019</span>
                <a class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-600 rounded" tabindex="0"
                    role="button">Proses</a>
            </div>

            <div class="mt-5 text-left">
                <h1 class="mb-2 text-lg font-semibold text-gray-800">Detail Spooring - XYZ123</h1>

                <ul class="mb-5 space-y-3 text-sm">
                    <x-list title="Nama" value="Saptarino" />
                    <x-list title="Kendaraan" value="Honda Civic Turbo - (KT 4003 QA)" />
                    <x-list title="Keterangan" value="Lorem ipsum dolor sit, amet consectetur adipisicing elit. Amet
                    nobis qui porro rem architecto deserunt facere quasi est cumque, fugit, ad quae autem ea
                    neque ipsum unde aspernatur hic dicta." />
                </ul>

                <x-button-modal class="text-white bg-red-600 hover:bg-red-500" id="#detail-spooring-konf">
                    Konfirmasi
                </x-button-modal>

            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Detail Spooring --}}
    <x-modal id="detail-spooring-konf">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Konfirmasi Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan Konfirmasi Spooring Untuk Melanjutkan Proses.
            </p>
        </div>

        <form class="" method="GET" action="{{ route('detail-spooring') }}">
            @csrf
            <div class="grid">
                <!-- Form Group -->
                <x-select name="konf-spooring" label="Konfirmasi Spooring">
                    <option value="">Pilih Salah Satu</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                </x-select>

                <div>
                    <label for="keterangan" class="text-sm font-medium text-gray-500">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full mt-1 border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500"></textarea>
                    </textarea>
                    <span class="text-xs font-medium text-red-500">* Silahkan diisi jika menjawab tidak.</span>
                </div>
                <!-- End Form Group -->

                <x-button>Cari Token</x-button>
            </div>
        </form>
    </x-modal>
</x-guest-layout>
