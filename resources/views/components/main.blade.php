<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/images/h-icon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>H-Gallery</title>

    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/flowbite.js') }}"></script>
</head>

<body class="bg-slate-50 dark:bg-gray-900 ">
    @if (request()->is('admin') || request()->is('admin/*'))
        @include('components.admin-header')
    @else
        @include('components.header')
    @endif
    <main class="">
        @yield('container')
        @include('components.modal')
    </main>
    {{-- @include('components.footer') --}}
</body>

</html>
