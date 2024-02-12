<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <x-master.form action="{{ route('spooring.update', $spooring->id) }}">
                @method('put')

                <x-master.form-input label="Kendaraan" name="kendaraan" readonly="readonly" required="required"
                    value="{{ ucwords($spooring->booking->type) }} - ( {{ strtoupper($spooring->booking->plat) }} )" />

                <x-home.form-select reuqire="requried" name="konfirmasi" label="Konfirmasi Spooring">
                    <option value="">Pilih salah satu</option>
                    <option value="0">Konfirmasi Pelanggan</option>
                    <option value="1">Proses Pengerjaan</option>
                </x-home.form-select>
                @error("konfirmasi")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-textarea name="spooringdesc" label="Keterangan" required="required" />
                @error("spooringdesc")
                <x-master.form-error message="{{ $message }}" />@enderror

                {{--
                <x-master.form-input label="Username" name="username" required="required"
                    value="{{ $user->username }}" />
                @error("username")
                <x-master.form-error message="{{ $message }}" />@enderror --}}


                <x-master.form-button cancel="{{ route('users.index') }}" />
            </x-master.form>
        </x-master.card>
    </section>
</x-app-layout>
