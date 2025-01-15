<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="{{ asset('asset/js/jquery.js') }}"></script>
</head>

<body class="bg-slate-50 dark:bg-gray-900">
    @include('components.header')
    <section >
        @yield('container')
    </section>
</body>

</html>
