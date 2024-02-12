<td class="px-4 py-4 text-sm whitespace-nowrap">
    <div class="flex items-center gap-x-4">
        <form method="POST" action="{{ $delete }}">
            @csrf
            <input name="_method" type="hidden" value="delete">
            <button type="submit"
                class="font-medium text-gray-500 transition-colors duration-200 hover:text-red-500 focus:outline-none delete-button">
                <i class='bx-xs bx bx-trash'></i>
            </button>
        </form>
    </div>
</td>
