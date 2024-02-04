<!DOCTYPE html>
<html lang="en">

<head>
    <x-head title="{{ $title }}" />
</head>

<body class="bg-gray-50">

    {{-- Navigaton --}}
    <x-master.navigation />

    {{-- Sidebar --}}
    <x-master.sidebar />

    {{-- Content --}}
    <div class="w-full px-4 pt-10 sm:px-6 md:px-8 lg:ps-72">
        {{ $slot }}
    </div>



    {{-- Script --}}
    <x-script />
</body>

</html>
