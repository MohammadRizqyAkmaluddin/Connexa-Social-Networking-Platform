<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <x-head :title="trim($__env->yieldContent('title'))" />
</head>
<body class="bg-main overflow-x-hidden align-items-center mx-auto">
    <x-navbar-main/>
 
    <main>
        @yield('content')
    </main>
</body>
</html>