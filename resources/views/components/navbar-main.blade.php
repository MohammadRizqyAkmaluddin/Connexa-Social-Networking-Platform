    <nav class="navbar navbar-expand-lg bg-white nav-main sticky-top border-bottom px-2 px-lg-0">
        <div class="container mx-auto px-1">
            <!-- DESKTOP LOGO -->
            <a class="navbar-brand d-lg-flex d-none" href="{{route('homepage.page')}}"><img src="{{asset('IMG/logos/connexa3.png')}}" style="width: 100px" class=""></a>
            
            <!-- MOBILE TOP BAR -->
            <div class="d-lg-none d-flex align-items-center justify-content-between w-100 py-1">
                <a class="navbar-brand me-1 p-0" href="{{route('homepage.page')}}">
                    <img src="{{asset('IMG/logos/connexa3.png')}}" style="width: 85px" alt="Connexa Logo">
                </a>
                <form class="position-relative flex-grow-1 mx-2" role="search" action="{{ route('search.page') }}" method="GET" style="max-width: 170px;">
                    <input
                        class="form-control fs-8 ps-5 pe-2 py-1 rounded-pill"
                        type="search"
                        name="q"
                        placeholder="Search"
                        value="{{ request('q') }}"
                        autocomplete="off"
                    />
                    <i class="fa-solid fa-magnifying-glass position-absolute search-icon fs-8 text-muted" style="left: 10px; top: 50%; transform: translateY(-50%);"></i>
                </form>
                <div class="d-flex align-items-center gap-2">
                    <div class="dropdown">
                        <a class="dropdown-toggle no-caret" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}"
                                alt="Profile"
                                class="rounded-circle border"
                                style="width: 32px; height: 32px; object-fit: cover;">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{route('user.page', Auth::user()->user_id)}}">
                                    <img src="{{ asset('IMG/uploads/profile/' . Auth::user()->profile_image) }}"
                                    alt="Profile"
                                    class="rounded-circle border"
                                    style="width: 45px; height: 45px; object-fit: cover;">
                                    <div class="d-block ms-2" style="max-width: 180px">
                                        <h6 class="mb-0 fs-7 fw-bold text-dark">{{ Auth::user()->name }}</h6>
                                        <p class="fs-9 text-muted mb-0 text-truncate">{{ Auth::user()->headline }}</p>
                                    </div>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="px-3"><h6 class="fs-8 text-muted fw-bold mb-1">Accounts</h6></div></li>
                            <li><a class="dropdown-item px-3 fs-8" href="#">Settings & Privacy</a></li>
                            <li><a class="dropdown-item px-3 fs-8" href="#">Help</a></li>
                            <li><a class="dropdown-item px-3 fs-8" href="#">Language</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><div class="px-3"><h6 class="fs-8 text-muted fw-bold mb-1">Manage</h6></div></li>
                            <li><a class="dropdown-item px-3 fs-8" href="#">Post & Activity</a></li>
                            <li><a class="dropdown-item px-3 fs-8" href="{{ route('jobs.page', ['modal' => 'applied']) }}">Jobs Applications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
                                    @csrf
                                    <button class="w-100 text-start px-3 py-1 bg-transparent border-0 fs-8 text-danger fw-bold" type="submit">Sign Out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <button class="navbar-toggler p-1 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon" style="width: 1.25em; height: 1.25em;"></span>
                    </button>
                </div>
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
                        <a class="nav-link d-flex fw-light text-center fs-12 {{ request()->is('network') ? 'active' : '' }}" href="{{ route('network.page') }}">
                            <div class="d-block">
                                <i class="bi bi-people-fill d-block fs-5"></i>Network
                            </div>
                            @if($invitationCount > 0)
                                <span class="badge d-flex justify-content-center bg-danger fs-14 rounded-circle text-center align-items-center" style="height:15px; width:15px; margin-left: -13px">{{ $invitationCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-12 {{ request()->is('jobs') ? 'active' : '' }}" href="{{ route('jobs.page') }}"><i class="bi bi-briefcase-fill d-block fs-5"></i>Jobs</a>
                    </li>
                    <li class="nav-item align-items-end">
                        <a class="nav-link d-flex fw-light text-center fs-12 {{ request()->is('message') ? 'active' : '' }}" href="{{ route('message.page') }}">
                            <div class="d-block">
                            <i class="bi bi-chat-dots-fill d-block fs-5"></i>Message
                            </div>
                            @if($unreadUsersCount > 0)
                                <span class="badge d-flex justify-content-center bg-danger fs-10 rounded-circle text-center align-items-center" style="height:15px; width:15px; margin-left: -15px">{{ $unreadUsersCount }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex fw-light text-center fs-12 {{ request()->is('notification') ? 'active' : '' }}" href="{{ route('notification.page') }}">
                            <div class="d-block">
                            <i class="bi bi-bell-fill d-block fs-5"></i>Notification
                            </div>
                            @if($notificationCount > 0)
                                <span class="badge d-flex justify-content-center bg-danger fs-10 rounded-circle text-center align-items-center" style="height:15px; width:15px; margin-left: -24px">{{ $notificationCount }}</span>
                            @endif
                        </a>
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
                                <a class="dropdown-item d-flex" href="{{route('user.page', Auth::user()->user_id)}}">
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
                            <li><a class="dropdown-item ps-5 fs-8" href="{{ route('jobs.page', ['modal' => 'applied']) }}">Jobs Applications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><form action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                    @csrf
                                    <button class="fs-8 ps-3 ms-1 pe-30 bg-transparent border-0" type="submit">Sign Out</button>
                                </form>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item dropdown d-lg-flex d-none">
                        <a class="nav-link border-start ps-4 dropdown-toggle no-caret fw-light text-center fs-12 {{ request()->is('business') ? 'active' : '' }}" href="{{ route('business.page') }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bar-chart-line-fill d-block fs-5"></i>Business
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="top:62px">
                            @if($companies->count() > 0)
                            <div class="dropdown-sections d-flex p-4" style="width: 550px">
                                <div class="w-50 pe-5 border-end">
                                        <div class="d-block justify-content-between mb-3">
                                            <h2 class="fs-6 mb-0 py-auto">Page Management list</h2>
                                            @if($companies->count() > 4)
                                                <a class="text-lightGrey fs-10 mb-0 text-decoration-none" href="{{route('business.page')}}"
                                                    onmouseover="this.querySelector('p').style.textDecoration='underline'"
                                                    onmouseout="this.querySelector('p').style.textDecoration='none'">
                                                    <p>Show all {{$companies->count()}}</p>
                                                </a>
                                            @endif
                                        </div>
                                        @foreach($companies->take(4) as $company)
                                            <div class="nav-tabs">
                                                <a class="dropdown-item nav-link d-flex align-items-center py-2"
                                                href="{{route('manage.show', $company->company_id)}}">
                                                    <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}"
                                                        style="width: 30px; height: 30px; object-fit:contain" class="me-2">
                                                    <div>
                                                        <p class="mb-0 fs-8 fw-semibold">{{$company->name}}</p>
                                                        <p class="mb-0 fs-9 fw-light text-muted">{{$company->sector}}</p>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                </div>
                                <div class="w-50 ms-5">
                                    <h2 class="fs-6 mb-3">Business & Others</h2>
                                    <ul class="list-unstyled mt-5">
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-badge-ad-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Advertise</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Boost your business sales</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-mortarboard-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Learn with Connexa</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Courses to develop your employee</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-capslock-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Recruit Skilled Workers</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Find, attract and recruit talent</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('create.page')}}" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-buildings-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Create New Company Page</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11 lh-1">Page for any scale of your company</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @else
                            <div class="dropdown-sections d-flex p-4" style="width: 300px">
                                <div class="mx-auto">
                                    <h2 class="fs-6 mb-3">Business & Others</h2>
                                    <ul class="list-unstyled mt-5">
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-badge-ad-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Advertise</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Boost your business sales</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-mortarboard-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Learn with Connexa</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Courses to develop your employee</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-capslock-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Recruit Skilled Workers</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11">Find, attract and recruit talent</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('create.page')}}" class="text-decoration-none d-block text-dark"
                                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                                <div class="d-flex align-items-center gap-2">
                                                    <i class="bi bi-buildings-fill text-lightPrimary"></i>
                                                    <h2 class=" fw-semibold fs-7 mb-0">Create New Company Page</h2>
                                                </div>
                                                <p class="text-muted fw-light fs-11 lh-1">Page for any scale of your company</p>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-light text-center fs-11 {{ request()->is('learning') ? 'active' : '' }}" href="{{ route('learning.page') }}"><i class="bi bi-person-video3 d-block fs-5"></i></i>Learning</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

