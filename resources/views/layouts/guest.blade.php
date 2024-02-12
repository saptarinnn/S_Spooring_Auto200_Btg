<!DOCTYPE html>
<html lang="en">

<head>
    <x-head title="{{ $title }}" />
</head>

<body>

    {{ $slot }}

    {{-- Script --}}
    <x-script />

    {{-- Optional Script --}}
    @stack('scripts')
</body>

</html>
