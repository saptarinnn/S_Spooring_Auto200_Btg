<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <x-master.form action="{{ route('users.update', $user->id) }}">
                @method('put')

                <x-master.form-input label="Username" name="username" required="required"
                    value="{{ $user->username }}" />
                @error("username")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Email" name="email" type="email" required="required"
                    value="{{ $user->email }}" />
                @error("email")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Nama Lengkap" name="fullname" required="required"
                    value="{{ $user->fullname }}" />
                @error("fullname")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-button cancel="{{ route('users.index') }}" />
            </x-master.form>
        </x-master.card>
    </section>
</x-app-layout>
