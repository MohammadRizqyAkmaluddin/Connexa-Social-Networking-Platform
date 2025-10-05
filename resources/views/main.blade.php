<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Afacad:ital,wght@0,400..700;1,400..700&family=Amatic+SC:wght@400;700&family=Bebas+Neue&family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Caudex:ital,wght@0,400;0,700;1,400;1,700&family=Covered+By+Your+Grace&family=Gabarito:wght@400..900&family=Gloock&family=Koulen&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Teko:wght@300..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <link rel="icon" href="{{ asset('IMG/logos/connexa1.png') }}" class="img-fluid" style="width:120px;" type="image/png">
    <title>Connexa</title>  
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body class="overflow-x-hidden">

    <nav class="navbar mt-3">
    <div class="container-fluid">

        <!-- TOP ROW -->
        <div class="container d-flex w-100 align-items-center justify-content-between justify-content-lg-start">

            <!-- SIGN IN (MOBILE LEFT) -->
            <div class="d-flex d-lg-none">
                <a class="btn btn-outline-primary fs-6 fw-bold p-3 px-4 rounded-pill" href="{{ route('login.form') }}">
                Sign in
                </a>
            </div>

            <!-- BRAND CENTER ON MOBILE -->
            <a class="navbar-brand mx-auto mx-lg-0" href="#">
                <!-- Logo besar (desktop) -->
                <img src="{{ asset('IMG/logos/connexa3.png') }}"
                    alt="Logo Desktop"
                    class="d-none d-lg-block"
                    style="width:150px;">

                <!-- Logo kecil (mobile) -->
                <img src="{{ asset('IMG/logos/connexa3.png') }}"
                    alt="Logo Mobile"
                    class="d-block d-lg-none"
                    style="width:100px;">
            </a>

            <!-- JOIN NOW (MOBILE RIGHT) -->
            <div class="d-flex d-lg-none">
                <a class="btn btn-primary fs-6 fw-bold p-3 px-4 rounded-pill" href="{{ route('register.form') }}">
                Join now
                </a>
            </div>

            <!-- DESKTOP LINKS (center on desktop) -->
            <div class="d-none d-lg-flex nav-links gap-7 mx-auto">
                <a class="nav-link text-muted text-center" href="#"><i class="fa-solid fa-briefcase d-block"></i>Jobs</a>
                <a class="nav-link text-muted text-center" href="#"><i class="fa-solid fa-people-group d-block"></i>People</a>
                <a class="nav-link text-muted text-center" href="#"><i class="fa-solid fa-arrow-trend-up d-block"></i>Top Content</a>
                <a class="nav-link text-muted text-center" href="#"><i class="fa-solid fa-building d-block"></i>Companies</a>
            </div>

            <!-- DESKTOP BUTTONS (kanan di desktop) -->
            <div class="d-none d-lg-flex gap-2">
                <a class="btn btn-outline-primary fs-6 fw-bold p-3 px-4 rounded-pill" href="{{ route('login.form') }}">Sign in</a>
                <a class="btn btn-primary fs-6 fw-bold p-3 px-4 rounded-pill" href="{{ route('register.form') }}">Join now</a>
            </div>

        </div>

        <!-- MOBILE LINKS (row bawah di mobile) -->
        <div class="d-flex d-lg-none w-100 justify-content-center mt-4">
        <div class="nav-links-mobile d-flex gap-2 gap-sm-4 gap-md-5 flex-row flex-wrap justify-content-center">
            <a class="nav-link text-muted text-center px-2" href="#"><i class="fa-solid fa-briefcase d-block"></i>Jobs</a>
            <a class="nav-link text-muted text-center px-2" href="#"><i class="fa-solid fa-people-group d-block"></i>People</a>
            <a class="nav-link text-muted text-center px-2" href="#"><i class="fa-solid fa-arrow-trend-up d-block"></i>Top Content</a>
            <a class="nav-link text-muted text-center px-2" href="#"><i class="fa-solid fa-building d-block"></i>Companies</a>
        </div>
        </div>

    </div>
    </nav>
    
    <div class="row w-100">
        <div class="container col-5 mx-auto border-end mt-10">
            <div class="d-lg-none mx-auto justify-content-center ms-2 mt-10">
                <h1 class=" fs-3 text-muted">Where professionals meet and grow together</h1>
                <div class=" gap-5 align-items-start mt-5 ">
                    <x-button-main provider="google" class="fs-10"/>
                    <x-button-main provider="microsoft" class="fs-10"/>
                    <x-button-main provider="apple" class="fs-10"/>
                    <div class="d-flex align-items-center mb-2">
                        <hr class="flex-grow-1">
                        <span class="mx-3 mb-1 text-muted">or</span>
                        <hr class="flex-grow-1">
                    </div>
                    <a href="{{'/login'}}"><x-button-main provider="connexa" class="fs-10"/></a>
                    <p class="text-center text-muted fs-15 w-100 mt-3 mx-auto">By clicking Continue to join or sign in, you agree to LinkedIn’s User Agreement, Privacy Policy, and Cookie Policy.</p>
                </div>
            </div>
            <div class="d-lg-block d-none align-items-center ms-10 mt-10">
                <h1 class=" fs-1 text-muted w-75">Where professionals meet and grow together</h1>
                <div class=" gap-5 align-items-start mt-5 pe-15 w-75">
                    <x-button-main provider="google" class=""/>
                    <x-button-main provider="microsoft" class=""/>
                    <x-button-main provider="apple" />
                    <div class="d-flex align-items-center mb-2">
                        <hr class="flex-grow-1">
                        <span class="mx-3 mb-1 text-muted">or</span>
                        <hr class="flex-grow-1">
                    </div>
                    <a href="{{'/login'}}"><x-button-main provider="connexa"/></a>
                    <p class="text-center text-muted fs-11 w-75 mt-3 mx-auto">By clicking Continue to join or sign in, you agree to LinkedIn’s User Agreement, Privacy Policy, and Cookie Policy.</p>
                </div>
            </div>
             <p class="mt-5 text-center">
                New to Connexa?
                <a href="{{ route('register.form') }}" class="register-link fw-bold text-primary m-2">Join Now</a>
            </p>
        </div>
        <div class="col-7 hero-section"></div>
    </div>

    <div class="second-section bg-muted w-100">
        KONTOL
    </div>

</body>
</html>
