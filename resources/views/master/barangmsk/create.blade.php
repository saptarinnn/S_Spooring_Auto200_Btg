<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">

        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <x-master.card>
            <x-master.form action="{{ route('brg-masuk.store') }}">

                <x-home.form-select label="Nama Barang" name="barang_id">
                    <option value="" class="text-sm">Pilih barang</option>
                    @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}" class="text-sm">{{ ucwords($barang->namabarang) }} - {{
                        $barang->jumlahstock . ' ' . ucwords($barang->satuanbarang ) }}</option>
                    @endforeach
                </x-home.form-select>
                @error("barang_id")
                <x-master.form-error message="{{ $message }}" />@enderror

                <input type="hidden" value="{{ Auth::user()->id }}" name="pengguna_id">
                <x-master.form-input label="Adm. Gudang" name="pengguna" required="required" readonly="readonly"
                    value="{{ ucwords(Auth::user()->fullname) }}" />
                @error("pengguna_id")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Jumlah Barang Masuk" type="number" name="jmlhbarangmsk"
                    required="required" />
                @error("jmlhbarangmsk")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-input label="Tgl. Barang Masuk" type="date" name="tglbarangmsk" required="required" />
                @error("tglbarangmsk")
                <x-master.form-error message="{{ $message }}" />@enderror

                <x-master.form-button cancel="{{ route('brg-masuk.index') }}" />
            </x-master.form>
        </x-master.card>
    </section>
</x-app-layout>
