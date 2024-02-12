<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        {{--
        <x-master.card-subheader link="{{ route('booking.create') }}" /> --}}

        <x-master.table>
            <x-master.table-thead>
                <x-master.table-thead-list name="Nama Pelanggan" />
                <x-master.table-thead-list name="Plat Kendaraan" />
                <x-master.table-thead-list name="No. Hp" />
                <x-master.table-thead-list name="Booking" />
                <x-master.table-thead-list name="Status" />
                <x-master.table-thead-list name="" />
            </x-master.table-thead>

            <x-master.table-tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <x-master.table-tbody-list name="{{ ucwords($booking->fullname) }}" />
                    <x-master.table-tbody-list name="{{ strtoupper($booking->plat) }}" />
                    <x-master.table-tbody-list name="{{ ucwords($booking->nohp) }}" />
                    <x-master.table-tbody-list
                        name="{{ \Carbon\Carbon::parse($booking->bookingdate)->format('d M, Y') }}" />
                    @if ($booking->bookingstatus == 0)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Menunggu Konfirmasi"
                        style="color: rgb(94, 94, 255) !important" />
                    @elseif($booking->bookingstatus == 1)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Check Spooring"
                        style="color: rgb(199, 179, 0) !important" />
                    @elseif($booking->bookingstatus == 2)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Konfirmasi Pelanggan"
                        style="color: rgb(0, 152, 199) !important" />
                    @elseif($booking->bookingstatus == 3)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Proses Pengerjaan Spooring"
                        style="color: rgb(199, 0, 172) !important" />
                    @elseif($booking->bookingstatus == 4)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Spooring Selesai"
                        style="color: rgb(0, 199, 83) !important" />
                    @elseif($booking->bookingstatus == 5)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Pelanggan Setuju"
                        style="color: rgb(0, 152, 199) !important" />
                    @elseif($booking->bookingstatus == 6)
                    <x-master.table-tbody-list-span class="text-sm font-semibold" name="Pelanggan Tidak Setuju"
                        style="color: rgb(199, 30, 0) !important" />
                    @endif
                    <x-master.table-tbody-action-detail status="{{ $booking->bookingstatus }}"
                        detail="{{ route('booking.show', $booking->id) }}"
                        delete="{{ route('booking.destroy', $booking->id) }}"
                        konf="{{ route('booking.update', $booking->id) }}" />
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

        /* DataTables */
        let table = new DataTable('#data-table');
    </script>
    @endpush

</x-app-layout>
