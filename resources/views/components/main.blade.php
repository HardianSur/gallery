<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    @vite('resources/css/app.css')

    <script src="{{ asset('asset/js/jquery.js') }}"></script>
    <script src="{{ asset('asset/js/flowbite.js') }}"></script>
</head>

<body class="bg-slate-50 dark:bg-gray-900">
    @include('components.header')
    <section >
        @yield('container')
    </section>
</body>

</html>
