<button type="button" {{ $attributes->merge(['class' => 'w-full px-6 py-2.5 text-sm font-medium leading-5 text-center
    capitalize rounded-lg lg:mx-0 lg:w-auto focus:outline-none'.$class]) }}
    data-hs-overlay="{{ $id }}">
    {{ $slot }}
</button>
