<td class="px-4 py-4 text-sm whitespace-nowrap">
    <div class="flex items-center gap-x-4">

        <a href="{{ $detail }}"
            class="font-medium text-gray-500 transition-colors duration-200 hover:text-blue-500 focus:outline-none">
            <i class='bx-xs bx bx-info-circle'></i>
        </a>

        @if ($status == 1)
        <a href="{{ $edit }}"
            class="font-medium text-gray-500 transition-colors duration-200 hover:text-blue-500 focus:outline-none">
            <i class='bx-xs bx bx-pencil'></i>
        </a>
        @endif

        @if ($status == 3 || $status == 5)
        <form action="{{ $proses }}" method="POST">
            @csrf
            <input name="keterangan" id="keterangan-success" type="hidden" value="">
            <button type="submit"
                class="font-medium text-gray-500 transition-colors duration-200 hover:text-green-500 confirm-finish focus:outline-none">
                <i class='bx-xs bx bx-check-double'></i>
            </button>
        </form>
        @endif

    </div>
</td>
