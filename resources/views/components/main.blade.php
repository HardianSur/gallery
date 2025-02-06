<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>Document</title>

    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/flowbite.js') }}"></script>
</head>

<body class="bg-slate-50 dark:bg-gray-900">
    @include('components.header')
    <main class="flex-1">
        @yield('container')
        @include('components.modal')
    </main>
    @include('components.footer')
</body>

</html>
