<x-app-layout title="Dashboard | Spooring Auto2000 Bontang">
    <section class="container px-4 pb-10 mx-auto">
        <x-master.card-header title="{{ $title }}" subtitle="{{ $subtitle }}" />

        <div class="flex items-center justify-between py-5 mt-6 bg-white border rounded-lg shadow-sm px-9">
            <div class="w-full">
                <h3 class="font-medium text-gray-600">Pilih Tahun Spooring</h3>
            </div>
            <form method="POST" class="flex w-1/3 gap-4" action="{{ route('laporan-spooring.print') }}">
                @csrf
                <select name="thn_spooring" id="thn_spooring"
                    class="block w-full px-4 py-2 mt-1 text-sm text-gray-600 border-gray-200 rounded-lg focus:border-red-500 focus:ring-red-500">
                    @foreach (range($tahun_sekarang, $tahun) as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
                <button class="px-4 text-sm text-white bg-red-500 border-none rounded-lg" type="submit">Print</button>
            </form>
        </div>


    </section>

    @push('scripts')
    @endpush
</x-app-layout>
