<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">
        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <!-- Mekanik -->
        @hasanyrole('mekanik')
            <div class="grid gap-2 mt-4 md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-4">
                <x-master.card-dashboard title="Booking Baru" data="{{ count($booking_baru) }}" subtitle="Booking"
                    color="bg-blue-600" icon="bx bx-bookmark-alt-plus" link="{{ route('booking.index') }}" />

                <x-master.card-dashboard title="Total Spooring" data="{{ count($spooring_mekanik) }}" subtitle="Spooring"
                    color="bg-fuchsia-600" icon="bx bxs-car-mechanic" link="{{ route('spooring.index') }}" />

                <x-master.card-dashboard title="Spooring Selesai" data="{{ count($spooring_selesai) }}" subtitle="Spooring"
                    color="bg-green-600" icon="bx bx-check-double" link="{{ route('spooring.index') }}" />

                <x-master.card-dashboard title="Spooring Gagal" data="{{ count($spooring_gagal) }}" subtitle="Spooring"
                    color="bg-red-600" icon="bx bx-x" link="{{ route('spooring.index') }}" />
            </div>
        @endhasanyrole

        <!-- Gudang -->
        @hasanyrole('gudang')
            <div class="grid gap-2 mt-4 md:grid-cols-1 xl:grid-cols-3">
                <x-master.card-dashboard title="Total Barang" data="{{ count($barang) }}" subtitle="Barang"
                    color="bg-blue-600" icon="bx bx-package" link="{{ route('barang.index') }}" />

                <x-master.card-dashboard title="Total Barang Masuk" data="{{ count($barang_masuk) }}" subtitle="Barang"
                    color="bg-fuchsia-600" icon="bx bx-archive-in" link="{{ route('brg-masuk.index') }}" />

                <x-master.card-dashboard title="Total Barang Keluar" data="{{ count($barang_keluar) }}" subtitle="Barang"
                    color="bg-green-600" icon="bx bx-archive-out" link="{{ route('brg-keluar.index') }}" />
            </div>
        @endhasanyrole

        <!-- Kepala Bengkel -->
        @hasanyrole('kbengkel')
            <div class="grid gap-2 mt-4 md:grid-cols-1 xl:grid-cols-3">
                <x-master.card-dashboard title="Total Barang" data="{{ count($barang) }}" subtitle="Barang"
                    color="bg-blue-600" icon="bx bx-package" link="{{ route('barang.index') }}" />

                <x-master.card-dashboard title="Total Barang Masuk" data="{{ count($barang_masuk) }}" subtitle="Barang"
                    color="bg-fuchsia-600" icon="bx bx-archive-in" link="{{ route('brg-masuk.index') }}" />

                <x-master.card-dashboard title="Total Barang Keluar" data="{{ count($barang_keluar) }}" subtitle="Barang"
                    color="bg-green-600" icon="bx bx-archive-out" link="{{ route('brg-keluar.index') }}" />
            </div>
            <div class="p-6 mt-6 bg-white border rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="font-medium text-gray-600">Spooring Report</h3>
                    <select name="slct_spooring" id="slct_spooring"
                        class="block w-1/2 px-4 py-2 mt-1 text-sm text-gray-600 border-gray-200 rounded-lg sm:w-1/4 focus:border-red-500 focus:ring-red-500">
                        @foreach (range($tahun_sekarang, $tahun) as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <canvas id="myChart" class="w-full mx-auto mt-8 md:w-1/2"></canvas>
            </div>
        @endhasanyrole

        <!-- Admin -->
        @hasanyrole('admin')
            <div class="grid gap-2 mt-4 md:grid-cols-1 xl:grid-cols-3">
                <x-master.card-dashboard title="Total Barang" data="{{ count($barang) }}" subtitle="Barang"
                    color="bg-blue-600" icon="bx bx-package" link="{{ route('barang.index') }}" />

                <x-master.card-dashboard title="Total Barang Masuk" data="{{ count($barang_masuk) }}" subtitle="Barang"
                    color="bg-fuchsia-600" icon="bx bx-archive-in" link="{{ route('brg-masuk.index') }}" />

                <x-master.card-dashboard title="Total Barang Keluar" data="{{ count($barang_keluar) }}" subtitle="Barang"
                    color="bg-green-600" icon="bx bx-archive-out" link="{{ route('brg-keluar.index') }}" />
            </div>
            <div class="p-6 mt-6 bg-white border rounded-lg shadow">
                <div class="flex items-center justify-between">
                    <h3 class="font-medium text-gray-600">Spooring Report</h3>
                    <select name="slct_spooring" id="slct_spooring"
                        class="block w-1/2 px-4 py-2 mt-1 text-sm text-gray-600 border-gray-200 rounded-lg sm:w-1/4 focus:border-red-500 focus:ring-red-500">
                        @foreach (range($tahun_sekarang, $tahun) as $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
                <canvas id="myChart" class="w-full mx-auto mt-8 md:w-1/2"></canvas>
            </div>
        @endhasanyrole


    </section>

    @push('scripts')
        <script>
            const ctx = document.getElementById('myChart');
            var labelChart = [
                'Total Booking', 'Total Spooring', 'Spooring Selesai', 'Spooring Gagal'
            ];
            var valueChart = [
                {{ $cbooking }}, {{ $cspooring }}, {{ $cspooring_selesai_all }}, {{ $cspooring_gagal_all }}
            ]
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labelChart,
                    datasets: [{
                        data: valueChart,
                        backgroundColor: [
                            '#ffc6ff',
                            '#a0c4ff',
                            '#caffbf',
                            '#ffadad'
                        ],
                        hoverOffset: 6
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            $("#slct_spooring").change(function() {
                var data = new FormData();
                data.append("slctSpooring", $("#slct_spooring option:selected").val());
                $.ajax({
                    url: `${window.origin}/dashboard`,
                    type: "POST",
                    data: data,
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    processData: false,
                    contentType: false,
                    global: false,
                    dataType: "json",
                    success: function(response) {
                        myChart.data.datasets[0].data = response.data;
                        myChart.update();
                    },
                });
            });
        </script>
    @endpush
</x-app-layout>
