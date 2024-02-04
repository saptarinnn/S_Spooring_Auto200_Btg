<!DOCTYPE html>
<html lang="en">

<head>
    <x-head title="{{ $title }}" />
</head>

<body>

    {{ $slot }}

    {{-- Script --}}
    <x-script />
</body>

</html>
