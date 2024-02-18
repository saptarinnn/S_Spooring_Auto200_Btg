<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <form action="{{ route('homepages.store') }}" class="" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $homepage->id ?? '' }}">

                <img src="{{ (!empty($homepage->head)) ? asset('storage/' . $homepage->head) : '' }}" alt=""
                    class="mt-6 rounded-lg w-80">
                <x-master.form-file name="head" label="Head" />
                @error("head")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-textarea name="subhead" label="Subhead" required="required" value="{{ $homepage->subhead ?? ''
                    }}" />
                @error("subhead")
                <x-master.form-error message="{{ $message }}" />@enderror

                <img src="{{ (!empty($homepage->image)) ? asset('storage/' . $homepage->image) : '' }}" alt=""
                    class="mt-6 rounded-lg w-80">
                <x-master.form-file name="image" label="Image Head" />
                @error("image")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input name="facebook" label="Facebook" value="{{ $homepage->facebook ?? ''
                    }}" />
                @error("facebook")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input name="instagram" label="Instagram" value="{{ $homepage->instagram ?? ''
                    }}" />
                @error("instagram")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input name="youtube" label="Youtube" value="{{ $homepage->youtube ?? ''
                    }}" />
                @error("youtube")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-button cancel="{{ route('homepages.index') }}" />
            </form>
        </x-master.card>

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
