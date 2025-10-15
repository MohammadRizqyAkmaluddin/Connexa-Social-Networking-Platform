<!DOCTYPE html>
<html lang="en">
<x-head/>
<body class="overflow-x-hidden align-items-center mx-auto">

    <x-navbar-first />
    
    <div class="row w-100 h-75 border-bottom">
        <div class="col-5 mx-auto border-end mt-10">
            <div class="d-lg-none mx-auto justify-content-center ms-2 mt-10">
                <h1 class=" fs-2 fw-light text-muted">Where professionals meet and grow together</h1>
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
                    <p class="text-center text-muted fs-15 w-100 mt-3 mx-auto">By clicking Continue to join or sign in, you agree to Connexa's User Agreement, Privacy Policy, and Cookie Policy.</p>
                </div>
                <p class="mt-5 text-center">
                    New to Connexa?
                    <a href="{{ route('register.form') }}" class="register-link fw-bold text-primary m-2">Join Now</a>
                </p>
            </div>
            <div class="d-lg-block d-none align-items-center ms-15">
                <h1 class=" fs-1 fw-light text-darkGrey text-left me-15">Where professionals meet and grow together</h1>
                <div class=" gap-5 align-items-center mt-5 w-75">
                    <x-button-main provider="google" class=""/>
                    <x-button-main provider="microsoft" class=""/>
                    <x-button-main provider="apple" />
                    <div class="d-flex align-items-center mb-2">
                        <hr class="flex-grow-1">
                        <span class="mx-3 mb-1 text-muted">or</span>
                        <hr class="flex-grow-1">
                    </div>
                    <a href="{{'/login'}}"><x-button-main provider="connexa"/></a>
                    <p class="text-center text-muted fs-11 mt-3 mx-auto">By clicking Continue to join or sign in, you agree to Connexa's User Agreement, Privacy Policy, and Cookie Policy.</p>
                </div>
                <p class="mt-5 text-center w-75 ">
                    New to Connexa?
                    <a href="{{ route('register.form') }}" class="register-link fw-bold text-primary m-2">Join Now</a>
                </p>
            </div>
        </div>
        <div class="col-7 hero-section"></div>
    </div>
    <div class="container second-section w-100 pt-10">
        <div class="gap-20 row mx-auto d-lg-flex d-none">
            <div class="col-4 text-left border rounded subsec-second">
                <div class="container pb-12 pt-10">
                    <h2 class="w-100 fs-4 fw-light ps-7">Work safely. Transact with confidence</h2>
                    <p class="w-100 fw-light ps-7 mb-5">your collaboration is protected, from first message to final payment</p>
                    <img src="{{asset('IMG/asset/preview3.png')}}" alt="" class="prev-img">
                </div>
                <div class="container pt-5">
                    <h2 class="w-75 fs-4 fw-light ps-7 ">Keep growing. Learn new skills anytime, anywhere</h2>
                    <p class="w-75 fw-light ps-7 mb-5">we provides free online video-based learning to help improve your skills</p>
                    <img src="{{asset('IMG/asset/preview4.png')}}" alt="" class="prev-img">
                </div>
            </div>
            <div class="col-4 text-left border rounded">
                <div class="container pt-12">
                    <h2 class="w-75 fs-4 fw-light ps-7">Thousands of jobs available from different countries</h2>
                    <p class="w-75 fw-light ps-7 mb-5">Including different contract with various working modes</p>
                    <img src="{{asset('IMG/asset/preview1.png')}}" alt="" class="prev-img">
                </div>
                <div class="container pt-15">
                    <h2 class="w-75 fs-4 fw-light ps-7">Empowering global careers & human resource growth index</h2>
                    <p class="w-75 fw-light ps-7 mb-5">Connexa has opened doors to global opportunities by connecting skilled professionals with companies across continents</p>
                    <img src="{{asset('IMG/asset/preview5.png')}}" alt="" class="prev-img">
                </div>
            </div>
        </div>
        <div class="container row mx-auto d-lg-none border py-5 rounded">
            <div class="col-12 mx-auto text-center">
                <h2 class="w-100 fs-4 fw-light">Work safely. Transact with confidence</h2>
                <p class="w-100 fw-light">your collaboration is protected, from first message to final payment</p>
                <img src="{{asset('IMG/asset/preview3.png')}}" alt="" class="mt-3" style="width: 350px">
            </div>
            <div class="col-12 mx-auto text-center mt-10">
                <h2 class="w-100 fs-4 fw-light">Keep growing. Learn new skills anytime, anywhere</h2>
                <p class="w-100 fw-light">we provides free online video-based learning to help improve your skills</p>
                <img src="{{asset('IMG/asset/preview4.png')}}" alt="" class="mt-3" style="width: 350px">
            </div>
            <div class="col-12 mx-auto text-center mt-10">
                <h2 class="w-100 fs-4 fw-light">Thousands of jobs available from different countries</h2>
                <p class="w-100 fw-light">Including different contract with various working modes</p>
                <img src="{{asset('IMG/asset/preview1.png')}}" alt="" class="mt-3" style="width: 350px">
            </div>
            <div class="col-12 mx-auto text-center mt-10">
                <h2 class="w-100 fs-4 fw-light">Empowering global careers & human resource growth index</h2>
                <p class="w-100 fw-light">Connexa has opened doors to global opportunities by connecting skilled professionals with companies across continents</p>
                <img src="{{asset('IMG/asset/preview5.png')}}" alt="" class="mt-3" style="width: 350px">
            </div>
        </div>
    </div>
    <div class="section w-100 mt-10 bg-brokenWhite mx-auto shadow-sm">
        <div class="container row gap-0 mx-auto justify-content-center">
            <div class="col-6 pt-5">
                <h2 class="w-100 fs-4 fw-light">Learn from the best. Grow with those who’ve been there</h2>
                <p class="w-100 fw-light">Connexa bridges experience and ambition,   helping professionals learn from global pioneers and grow alongside the world’s most influential minds</p>
            </div>
            <div class="col-6 text-center w-100">
                <img src="{{asset('IMG/asset/specialist.png')}}" alt="" class="prev-img-3">
            </div>
        </div>
    </div>
    <div class="section w-100 mt-5 mx-auto text-center">
        <div class="container row mx-auto text-center">
            <div class="col-6 pt-5 text-left w-100">
                <h2 class="w-100 fs-4 fw-light">Find the Right Talent for Your Company</h2>
                <p class="w-100 fw-light mb-5">Post job openings easily and reach thousands of professionals ready to join your team</p>
                <a class="btn btn-outline-primary p-2 px-4 fw-bold rounded-pill" href="#">Post a job</a>
            </div>
            <div class="col-6 text-center w-100">
                <img src="{{asset('IMG/asset/preview6.png')}}" alt="" class="prev-img-2">
            </div>
        </div>
    </div>
    <div class="section w-100 mt-10 bg-primary mx-auto py-3">
        <div class="mx-10 d-lg-flex d-none justify-content-between">
            <div class="d-flex">
                <img class="me-5" src="{{asset('IMG/asset/footer.png')}}" alt="" style="width: 200px;">
            </div>
            <div class="mx-auto text-white d-flex gap-5">
                <div class="pt-5">
                    <h2 class="fs-6">General</h2>
                    <a class="fs-7 nav-link-2 d-block" href="#">Sign In</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Join</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">GitHub</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">About</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Developer</a>
                </div>
                <div class="pt-5">
                    <h2 class="fs-6">Browse Connexa</h2>
                    <a class="fs-7 nav-link-2 d-block" href="#">Jobs</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Learning</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">People</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Companies</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Top Content</a>
                </div>
                <div class="pt-5">
                    <h2 class="fs-6">Bussiness Solution</h2>
                    <a class="fs-7 nav-link-2 d-block" href="#">Promotion Ads</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Recruit Talent</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Marketing</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Companies</a>
                    <a class="fs-7 nav-link-2 d-block" href="#">Top Content</a>
                </div>
            </div>
            <div class="d-flex">
                <img class="" src="{{asset('IMG/asset/download.png')}}" alt="" style="width: 200px;">
            </div>
        </div>

        <div class="container mx-10 d-lg-none d-block text-center">
            <div class="d-block">
                <img src="{{asset('IMG/asset/footer.png')}}" alt="" style="width: 300px;">
            </div>
            <div class="d-block text-white">
                <div class="text-left">
                    <h2 class="fs-2 mb-3">General</h2>
                    <a class="fs-4 nav-link-2 d-block" href="#">Sign In</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Join</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">GitHub</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">About</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Developer</a>
                </div>
                <div class="pt-5">
                    <h2 class="fs-2">Browse Connexa</h2>
                    <a class="fs-4 nav-link-2 d-block" href="#">Jobs</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Learning</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">People</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Companies</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Top Content</a>
                </div>
                <div class="pt-5">
                    <h2 class="fs-2">Bussiness Solution</h2>
                    <a class="fs-4 nav-link-2 d-block" href="#">Promotion Ads</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Recruit Talent</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Marketing</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Companies</a>
                    <a class="fs-4 nav-link-2 d-block" href="#">Top Content</a>
                </div>
            </div>
            <div class="d-block mt-10 pb-10">
                <img class="" src="{{asset('IMG/asset/download2.png')}}" alt="" style="width: 400px;">
            </div>
        </div>
    </div>

    <x-footer-thin :fixedBottom="false" />
</body>
</html>

            