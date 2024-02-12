<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <x-master.form action="{{ route('barang.update', $barang->id) }}">
                @method('put')

                <x-master.form-input label="Nama Barang" name="namabarang" required="required"
                    value="{{ $barang->namabarang }}" />
                @error("namabarang")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Satuan Barang" name="satuanbarang" required="required"
                    value="{{ $barang->satuanbarang }}" />
                @error("satuanbarang")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-button cancel="{{ route('barang.index') }}" />
            </x-master.form>
        </x-master.card>
    </section>
</x-app-layout>
