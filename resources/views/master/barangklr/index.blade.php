<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card-subheader link="{{ route('brg-keluar.create') }}" />

        <x-master.table>
            <x-master.table-thead>
                <x-master.table-thead-list name="Nama Barang" />
                <x-master.table-thead-list name="Jumlah Barang Keluar" />
                <x-master.table-thead-list name="Tgl. Barang Keluar" />
                <x-master.table-thead-list name="Adm. Gudang" />
                <x-master.table-thead-list name="" />
            </x-master.table-thead>

            <x-master.table-tbody>
                @foreach ($barangkeluar as $barangklr)
                <tr>
                    <x-master.table-tbody-list name="{{ ucwords($barangklr->barang->namabarang) }}" />
                    <x-master.table-tbody-list
                        name="{{ $barangklr->jmlhbarangklr . ' ' . ucwords($barangklr->barang->satuanbarang) }}" />
                    <x-master.table-tbody-list
                        name="{{ \Carbon\Carbon::parse($barangklr->tglbarangklr)->format('d M, Y') }}" />
                    <x-master.table-tbody-list name="{{ ucwords($barangklr->pengguna->fullname) }}" />
                    <x-master.table-tbody-action-delete delete="{{ route('brg-keluar.destroy', $barangklr->id) }}" />
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

        /* DataTables */
        let table = new DataTable('#data-table');
    </script>
    @endpush

</x-app-layout>
