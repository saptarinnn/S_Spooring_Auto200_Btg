<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.table>
            <x-master.table-thead>
                <x-master.table-thead-list name="Booking" />
                <x-master.table-thead-list name="Mekanik" />
                <x-master.table-thead-list name="Booking" />
                <x-master.table-thead-list name="Spooring" />
                <x-master.table-thead-list name="Status" />
                <x-master.table-thead-list name="" />
            </x-master.table-thead>

            <x-master.table-tbody>
                @foreach ($spoorings as $spooring)
                <tr>
                    <x-master.table-tbody-list
                        name="{{ ucwords($spooring->booking->fullname) }} - {{ ucwords($spooring->booking->nohp) }} ({{ strtoupper($spooring->booking->plat) }})" />
                    <x-master.table-tbody-list name="{{ ucwords($spooring->pengguna->fullname) }}" />
                    <x-master.table-tbody-list
                        name="{{ \Carbon\Carbon::parse($spooring->spooringdate)->format('d M, Y') }}" />
                    <x-master.table-tbody-list
                        name="{{ \Carbon\Carbon::parse($spooring->booking->bookingdate)->format('d M, Y') }}" />

                    @if($spooring->booking->bookingstatus == 1)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Proses Spooring"
                        style="color: rgb(199, 179, 0) !important" />
                    @elseif($spooring->booking->bookingstatus == 2)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Konfirmasi Pelanggan"
                        style="color: rgb(0, 152, 199) !important" />
                    @elseif($spooring->booking->bookingstatus == 3)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Proses Pengerjaan Spooring"
                        style="color: rgb(199, 0, 172) !important" />
                    @elseif($spooring->booking->bookingstatus == 4)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Spooring Selesai"
                        style="color: rgb(0, 199, 83) !important" />
                    @elseif($spooring->booking->bookingstatus == 5)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Pelanggan Setuju"
                        style="color: rgb(0, 152, 199) !important" />
                    @elseif($spooring->booking->bookingstatus == 6)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Pelanggan Tidak Setuju"
                        style="color: rgb(199, 30, 0) !important" />
                    @endif

                    <x-master.table-tbody-action-spooring status="{{ $spooring->booking->bookingstatus }}"
                        detail="{{ route('spooring.show', $spooring->id) }}"
                        edit="{{ route('spooring.edit', $spooring->id) }}"
                        proses="{{ route('spooring.confirm', $spooring->id) }}" />
                </tr>
                @endforeach
            </x-master.table-tbody>
        </x-master.table>

    </section>

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

    <script>
        /* Delete Button */
        $('.delete-button').click(function (e) {
            e.preventDefault();
            let form =  $(this).closest("form");
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        /* Konfirmation Button */
        $('.delete-konf').click(function (e) {
            e.preventDefault();
            let form =  $(this).closest("form");
            Swal.fire({
                title: "Are you sure?",
                text: "Sure to confirm booking data!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, confirm it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        /* Konfirmation confirm-finish */
        $('.confirm-finish').click(function (e) {
            e.preventDefault();
            let form =  $(this).closest("form");
            // Swal.fire({
            //     title: "Are you sure?",
            //     text: "Is the spooring process complete?",
            //     icon: "warning",
            //     showCancelButton: true,
            //     confirmButtonColor: "#3085d6",
            //     cancelButtonColor: "#d33",
            //     confirmButtonText: "Yes, process complete it!"
            //     }).then((result) => {
            //     if (result.isConfirmed) {
            //         form.submit();
            //     }
            // });
            Swal.fire({
                title: "Keterangan spooring",
                input: "text",
                inputAttributes: {
                    autocapitalize: "off"
                },
                showCancelButton: true,
                confirmButtonText: "Simpan",
                showLoaderOnConfirm: true,
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#keterangan-success').val(result.value)
                    form.submit();
                    // Swal.fire({
                    // });
                }
            });
        });

        /* DataTables */
        let table = new DataTable('#data-table');
    </script>
    @endpush

</x-app-layout>
