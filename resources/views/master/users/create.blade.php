<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <x-master.form action="{{ route('users.store') }}">
                <x-master.form-input label="Username" name="username" required="required" />
                @error("username")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Email" name="email" type="email" required="required" />
                @error("email")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Nama Lengkap" name="fullname" required="required" />
                @error("fullname")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-home.form-select label="Role" name="role">
                    <option value="">Pilih salah satu ...</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ ucwords($role->name) }}</option>
                    @endforeach
                </x-home.form-select>
                @error("role")
                <x-master.form-error message="{{ $message }}" />@enderror


                <x-master.form-button cancel="{{ route('users.index') }}" />
            </x-master.form>
        </x-master.card>
    </section>
</x-app-layout>
