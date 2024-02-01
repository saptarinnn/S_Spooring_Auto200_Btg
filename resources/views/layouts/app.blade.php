<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    {{-- GoogleFonts --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Romanesco&display=swap"
        rel="stylesheet">
    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- TailwindCSS --}}
    @vite('resources/css/app.css')
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
