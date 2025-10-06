
<style>

</style>

<nav class="navbar mt-3">
    <div class="container-fluid">

        <!-- TOP ROW -->
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">

            <!-- SIGN IN (MOBILE LEFT) -->
            <div class="d-flex d-lg-none">
                <a class="btn btn-outline-primary fs-6 fw-bold p-3 px-4 rounded-pill" href="{{ route('login.form') }}">
                Sign in
                </a>
            </div>

            <!-- BRAND CENTER ON MOBILE -->
            <a class="navbar-brand mx-auto mx-lg-0" href="{{route('main.page')}}">
                <img src="{{ asset('IMG/logos/connexa3.png') }}"
                    alt="Logo Desktop"
                    class="d-none d-lg-block"
                    style="width:150px;">
                    
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
            <li class="d-none d-lg-flex nav-item gap-5 mx-auto">
                <a class="nav-link text-center fs-8" href="#"><i class="fa-solid fa-briefcase d-block fs-5"></i>Jobs</a>
                <div class="border-end"></div>
                <a class="nav-link text-center fs-8" href="#"><i class="fa-solid fa-people-group d-block fs-5"></i>People</a>
                <div class="border-end"></div>
                <a class="nav-link text-center fs-8" href="#"><i class="fa-solid fa-arrow-trend-up d-block fs-5"></i>Top Content</a>
                <div class="border-end"></div>
                <a class="nav-link text-center fs-8" href="#"><i class="fa-solid fa-building d-block fs-5"></i>Companies</a>
                <div class="border-end"></div>
                <a class="nav-link text-center" href="#"><i class="fa-solid fa-graduation-cap d-block"></i></i>Learning</a>
            </li>

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

