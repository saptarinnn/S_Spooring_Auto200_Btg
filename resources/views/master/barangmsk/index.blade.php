<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        @hasanyrole('admin|gudang')
            <x-master.card-subheader link="{{ route('brg-masuk.create') }}" />
        @endhasanyrole

        <x-master.table>
            <x-master.table-thead>
                <x-master.table-thead-list name="Nama Barang" />
                <x-master.table-thead-list name="Jumlah Barang Masuk" />
                <x-master.table-thead-list name="Tgl. Barang Masuk" />
                <x-master.table-thead-list name="Adm. Gudang" />
                @hasanyrole('admin|gudang')
                    <x-master.table-thead-list name="" />
                @endhasanyrole
            </x-master.table-thead>

            <x-master.table-tbody>
                @foreach ($barangmasuk as $barangmsk)
                    <tr>
                        <x-master.table-tbody-list name="{{ ucwords($barangmsk->barang->namabarang) }}" />
                        <x-master.table-tbody-list
                            name="{{ $barangmsk->jmlhbarangmsk . ' ' . ucwords($barangmsk->barang->satuanbarang) }}" />
                        <x-master.table-tbody-list
                            name="{{ \Carbon\Carbon::parse($barangmsk->tglbarangmsk)->format('d M, Y') }}" />
                        <x-master.table-tbody-list name="{{ ucwords($barangmsk->pengguna->fullname) }}" />
                        @hasanyrole('admin|gudang')
                            <x-master.table-tbody-action-delete delete="{{ route('brg-masuk.destroy', $barangmsk->id) }}" />
                        @endhasanyrole
                    </tr>
                @endforeach
            </x-master.table-tbody>
        </x-master.table>

    </section>

    @push('scripts')
        @if (session()->has('message'))
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
            $('.delete-button').click(function(e) {
                e.preventDefault();
                let form = $(this).closest("form");
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

            /* DataTables */
            let table = new DataTable('#data-table');
        </script>
    @endpush

</x-app-layout>
