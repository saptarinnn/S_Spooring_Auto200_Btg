<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card-subheader link="{{ route('users.create') }}" />

        <x-master.table>
            <x-master.table-thead>
                <x-master.table-thead-list name="Username" />
                <x-master.table-thead-list name="Email" />
                <x-master.table-thead-list name="Nama Lengkap" />
                <x-master.table-thead-list name="Login Terakhir" />
                <x-master.table-thead-list name="" />
            </x-master.table-thead>

            <x-master.table-tbody>
                @forelse ($users as $user)
                <tr>
                    <x-master.table-tbody-list name="{{ ucwords($user->username) }}" />
                    <x-master.table-tbody-list name="{{ ucwords($user->email) }}" />
                    <x-master.table-tbody-list name="{{ ucwords($user->fullname) }}" />
                    <x-master.table-tbody-list
                        name="{{ ($user->lastlogin) ? \Carbon\Carbon::parse($user->lastlogin)->format('d M, Y') : '-' }}" />
                    <x-master.table-tbody-action edit="{{ route('users.edit', $user->id) }}"
                        delete="{{ route('users.delete', $user->id) }}" />
                </tr>
                @empty
                <tr>
                    <x-master.table-tbody-list name="Data pengguna tidak tersedia." col="5"
                        class="font-normal text-center text-gray-400" />
                </tr>
                @endforelse
            </x-master.table-tbody>
        </x-master.table>

        {{ $users->links() }}

    </section>

    @push('scripts')
    <script>
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
    </script>

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

</x-app-layout>
