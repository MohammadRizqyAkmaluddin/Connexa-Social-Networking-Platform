<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-head :title="trim($__env->yieldContent('title'))" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-main overflow-x-hidden align-items-center mx-auto">
    <x-navbar-main/>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
</body>
</html>
