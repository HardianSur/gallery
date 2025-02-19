<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>H-Gallery</title>
    @vite('resources/css/app.css')
</head>

<body>
    {{-- @include('components.header') --}}
    <section class="bg-white dark:bg-gray-900 ">
        @include('components.sidebar')
        <div class="p-4 sm:ml-64">
            @yield('container')
        </div>
    </section>
</body>

</html>
