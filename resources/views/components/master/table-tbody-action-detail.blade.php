<td class="px-4 py-4 text-sm whitespace-nowrap">
    <div class="flex items-center gap-x-4">

        <a href="{{ $detail }}"
            class="font-medium text-gray-500 transition-colors duration-200 hover:text-blue-500 focus:outline-none">
            <i class='bx-xs bx bx-info-circle'></i>
        </a>

        @hasanyrole('mekanik')
            @if ($status == 0)
                <form method="POST" action="{{ $delete }}">
                    @csrf
                    <input name="_method" type="hidden" value="delete">
                    <button type="submit"
                        class="font-medium text-gray-500 transition-colors duration-200 hover:text-red-500 focus:outline-none delete-button">
                        <i class='bx-xs bx bx-trash'></i>
                    </button>
                </form>
            @endif

            @if ($status == 0)
                <form method="POST" action="{{ $konf }}">
                    @csrf
                    @method('put')
                    <button type="submit"
                        class="font-medium text-gray-500 transition-colors duration-200 hover:text-green-500 focus:outline-none delete-konf">
                        <i class='bx-xs bx bx-check-double'></i>
                    </button>
                </form>
            @endif
        @endhasanyrole
    </div>
</td>
