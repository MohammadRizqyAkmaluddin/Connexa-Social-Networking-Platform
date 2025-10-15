    <nav class="navbar navbar-expand-lg bg-white nav-main sticky-top border-bottom">
        <div class="container mx-auto">
            <a class="navbar-brand d-lg-flex d-none" href="{{route('homepage.page')}}"><img src="{{asset('IMG/logos/connexa3.png')}}" style="width: 100px" alt=""></a>
            <div class="navbar-brand d-lg-none d-flex">
                <a class="navbar-brand d-lg-none me-3" href="{{route('homepage.page')}}"><img src="{{asset('IMG/logos/connexa3.png')}}" class="mb-3" style="width: 100px" alt=""></a>
                <form class="position-relative ms-3" role="search" action="/search" method="GET">
                    <input id="mainSearch2" class="form-control fs-7 ps-6 pb-2 rounded-pill" style="width: 200px" type="search" name="q" placeholder="Search" aria-label="Search" autocomplete="off"/>
                    <i class="fa-solid fa-magnifying-glass position-absolute search-icon fs-8 ps-1 pb-2 text-muted"></i>
                </form>
            </div>
            <div class="navbar-brand d-lg-none d-flex">
                <li class="dropdown list-unstyled">
                        <a class="dropdown-toggle no-caret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}" 
                                alt="Profile" 
                                class="rounded-circle border" 
                                style="width: 35px; height: 35px">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start">
                            <li>
                                <a class="dropdown-item d-flex" href="#">
                                    <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}" 
                                    alt="Profile" 
                                    class="rounded-circle border" 
                                    style="width: 60px; height: 60px">
                                    <div class="d-block ms-3 mt-1 align-items-center gap-0" style="width: 250px">
                                        <h2 class="fs-6 lf-1" style="white-space: normal; word-wrap: break-word;">{{ Auth::user()->name }}</h2>
                                        <p class="fs-8 text-truncate mb-3 lh-1"  style="white-space: normal; word-wrap: break-word;">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 11, ' ...') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="ps-5"><h2 class="fs-6">Accounts</h2></div></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Settings & Privacy</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Help</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Language</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="ps-5"><h2 class="fs-6">Manage</h2></div></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Post & Activity</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Jobs Applicant</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                    @csrf
                                    <button class="fs-8 ps-3 ms-1 pe-30 bg-transparent border-0" type="submit">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                        
                    </li>
                <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse bg-white rounded" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <form class="d-lg-flex d-none position-relative search" role="search" action="/search" method="GET">
                        <input id="mainSearch" class="form-control fs-7 ps-6 pb-2 rounded-pill" style="width: 300px" type="search" name="q" placeholder="Search" aria-label="Search" autocomplete="off"/>
                        <i class="fa-solid fa-magnifying-glass position-absolute search-icon fs-8 ps-1 text-muted"></i>
                    </form> 
                </ul>
                <ul class="navbar-nav gap-3 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('homepage') ? 'active' : '' }}" href="{{ route('homepage.page') }}"><i class="bi bi-house-door-fill d-block fs-5"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('network') ? 'active' : '' }}" href="{{ route('network.page') }}"><i class="bi bi-people-fill d-block fs-5"></i>Network</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('jobs') ? 'active' : '' }}" href="{{ route('jobs.page') }}"><i class="bi bi-briefcase-fill d-block fs-5"></i>Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('message') ? 'active' : '' }}" href="{{ route('message.page') }}"><i class="bi bi-chat-dots-fill d-block fs-5"></i>Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('notification') ? 'active' : '' }}" href="{{ route('notification.page') }}"><i class="bi bi-bell-fill d-block fs-5"></i>Notification</a>
                    </li>
                    
                    <li class="nav-item dropdown d-lg-block d-none">
                        <a class="nav-link border-start ps-4 dropdown-toggle no-caret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}" 
                                alt="Profile" 
                                class="rounded-circle border" 
                                style="width: 35px; height: 35px">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="top:62px">
                            <li>
                                <a class="dropdown-item d-flex" href="#">
                                    <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}" 
                                    alt="Profile" 
                                    class="rounded-circle border" 
                                    style="width: 60px; height: 60px">
                                    <div class="d-block ms-3 mt-1 align-items-center gap-0" style="width: 250px">
                                        <h2 class="fs-6 lf-1" style="white-space: normal; word-wrap: break-word;">{{ Auth::user()->name }}</h2>
                                        <p class="fs-8 text-truncate mb-3 lh-1"  style="white-space: normal; word-wrap: break-word;">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 11, ' ...') }}</p>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="ps-5 mt-4"><h2 class="fs-6">Accounts</h2></div></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Settings & Privacy</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Help</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Language</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="ps-5 mt-4"><h2 class="fs-6">Manage</h2></div></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Post & Activity</a></li>
                            <li><a class="dropdown-item ps-5 fs-8" href="#">Jobs Applicant</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                    @csrf
                                    <button class="fs-8 ps-3 ms-1 pe-30 bg-transparent border-0" type="submit">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                        
                    </li>
                    <li class="nav-item border-start ps-3">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('business') ? 'active' : '' }}" href="{{ route('business.page') }}"><i class="bi bi-bar-chart-line-fill d-block fs-5"></i>Business</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-11 {{ request()->is('learning') ? 'active' : '' }}" href="{{ route('learning.page') }}"><i class="bi bi-person-video3 d-block fs-5"></i></i>Learning</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

