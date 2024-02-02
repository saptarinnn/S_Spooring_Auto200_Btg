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
    <x-script />
</body>

</html>
