<x-guest-layout title="Detail Spooring | Spooring Auto2000 Bontang">
    {{-- Navigation --}}
    <x-navigation />

    <div class="flex items-center justify-center min-h-screen px-4 mx-auto bg-gray-100 sm:px-6 lg:px-8">
        <div class="container px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
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
                                        class="px-4 py-1 text-sm font-semibold text-gray-100 bg-blue-400 rounded">Pelanggan
                                        Setuju
                                        @elseif ($booking->bookingstatus == 6)
                                        <span
                                            class="px-4 py-1 text-sm font-semibold text-gray-100 bg-red-400 rounded">Pelanggan
                                            Tidak Setuju
                                            @endif
                                        </span>
            </div>

            <div class="mt-5 text-left">
                <h1 class="mb-2 text-lg font-semibold text-gray-800">Detail Spooring - {{ strtoupper($booking->id) }}
                </h1>

                <ul class="mb-5 space-y-3">
                    <x-home.list title="Nama" value="{{ ucwords($booking->fullname) }}" />
                    <x-home.list title="Email" value="{{ ucwords($booking->email) }}" />
                    <x-home.list title="No. Hp" value="{{ ucwords($booking->nohp) }}" />
                    <x-home.list title="Kendaraan"
                        value="{{ ucwords($booking->type) }} - ({{ strtoupper($booking->plat) }})" />
                    <x-home.list title="Keterangan" value="{{ ucwords($booking->bookingdesc) }}" />
                </ul>

                @if ($booking->bookingstatus == 2)
                <x-home.button-modal class="text-white bg-red-600 hover:bg-red-500" id="#detail-spooring-konf">
                    Konfirmasi
                </x-home.button-modal>
                @endif

            </div>
        </div>
    </div>

    {{-- Modal Konfirmasi Detail Spooring --}}
    <x-home.modal id="detail-spooring-konf">
        <div class="mb-4 text-center">
            <h1 class="block text-2xl font-semibold text-gray-700">Konfirmasi Spooring</h1>
            <p class="mt-1 text-gray-600">
                Silahkan Konfirmasi Spooring Untuk Melanjutkan Proses.
            </p>
        </div>


        <form class="" method="POST" action="{{ route('home-booking-confirm', $booking->id) }}">
            @csrf
            <div class="grid">
                <!-- Form Group -->
                <x-home.form-select name="konf_spooring" label="Konfirmasi Spooring">
                    <option value="">Pilih Salah Satu</option>
                    <option value="ya">Ya</option>
                    <option value="tidak">Tidak</option>
                </x-home.form-select>

                {{-- <div>
                    <label for="keterangan" class="font-medium text-gray-500 ">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" rows="3"
                        class="w-full mt-1 border-gray-300 rounded-lg focus:border-red-500 focus:ring-red-500"></textarea>
                    </textarea>
                </div> --}}
                <!-- End Form Group -->

                <x-home.button>Konfirmasi</x-home.button>
            </div>
        </form>
    </x-home.modal>

    @push('scripts')
    @if(session()->has('message'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: `{{ session()->get('message') }}`,
        });
    </script>
    @endif
    @endpush
</x-guest-layout>
