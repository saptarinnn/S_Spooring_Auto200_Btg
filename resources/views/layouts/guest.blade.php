<!DOCTYPE html>
<html lang="en">

<head>
    <x-head title="{{ $title }}" />
</head>

<body>
    {{-- Navigation --}}
    <x-navigation />

    {{ $slot }}

    {{-- Script --}}
    <script src="{{ asset('js/preline.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
