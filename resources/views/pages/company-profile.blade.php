@extends('layouts.app')

@section('title', $company->name)

@section('content')
    <div class="container mb-10">
        <div class="bg-white shadow-sm w-100 rounded mt-10 d-lg-block d-none">
            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded-top w-100">
            <div class="d-flex">
                <div class="d-block">
                    <div class="d-block px-10">
                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" class="border p-2 bg-white mb-3" style="margin-top:-140px; width:200px; height:200px; object-fit:contain">
                        <h2 class="ms-3">{{ $company->name }}</h2>
                        <p class="ms-3">{{ $company->tagline }}</p>
                        <div class="d-flex fs-7 gap-2 text-muted ms-3">
                            <p>{{ $company->industry}} Company</p>
                            <p>|</p>
                            <p>{{ $company->city}},</p>
                            <p>{{ $company->country}}</p>
                            <p>|</p>
                            <p>{{ $company->follows_count}} Followers</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 ms-11">
                        @php $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id); @endphp
                        <form action="{{route('follow.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            <button type="submit" class="btn follow-btn text-white bg-primary text-center py-0 px-5 rounded-pill">
                                @if($isFollowed)
                                    <i class="bi bi-check-lg fs-6 d-flex fst-normal fw-bold gap-1 py-2 lh-1">Following</i>
                                @else
                                    <i class="bi bi-plus-lg fs-6 d-flex fst-normal fw-bold gap-1 py-2 lh-1">Follow</i>
                                @endif
                            </button>
                        </form>
                        <a href="{{$company->website}}"><button class="btn follow-btn text-primary fw-bold border-primary text-center py-1 px-5  rounded-pill">Website <i class="bi bi-box-arrow-in-up-right"></i></button></a>
                    </div>
                </div>
                <div class="d-block">
                    @if($company->parentRelation && $company->parentRelation->parentCompany)
                        <div class="d-block my-3">
                            <p class="text-muted fs-10 mb-1">Subsidiary of</p>
                            <a href="{{ route('company.show', $company->parentRelation->parentCompany->company_id) }}" class="text-decoration-none text-center d-flex rounded px-3 pt-2 mb-2">
                                <img src="{{ asset('IMG/uploads/logo/' . $company->parentRelation->parentCompany->logo) }}"
                                    width="40" height="40"
                                    class="rounded bg-white me-2 mt-1">
                                <div class="d-block text-start">
                                    <div class="mt-1 text-dark fw-semibold">{{ $company->parentRelation->parentCompany->name }}</div>
                                    <p class="fs-9 text-muted">{{ $company->parentRelation->parentCompany->industry }}</p>
                                </div>
                            </a>
                        </div>
                    @elseif($company->subsidiaries && $company->subsidiaries->isNotEmpty())
                        <div class="my-3">
                            <p class="text-muted fs-10 mb-3">Affiliated Pages</p>
                            <div class="row">
                                @foreach($company->subsidiaries as $subsidiary)
                                    @if($subsidiary->childCompany)
                                        <div class="col-12">
                                            <a href="{{ route('company.show', $subsidiary->childCompany->company_id) }}" class="text-decoration-none text-center d-flex rounded px-3">
                                                <img src="{{ asset('IMG/uploads/logo/' . $subsidiary->childCompany->logo) }}"
                                                    width="40" height="40"
                                                    class="rounded bg-white me-2 mt-1">
                                                <div class="d-block text-start">
                                                    <div class="text-dark fw-semibold fs-6">{{ $subsidiary->childCompany->name }}</div>
                                                    <p class="fs-9 text-muted text-truncate-1">{{ $subsidiary->childCompany->industry }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <ul class="nav nav-tabs mt-5 border-top ps-10" id="companyTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="about-tab" data-bs-toggle="tab"
                            data-bs-target="#about" type="button" role="tab">About</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="post-tab" data-bs-toggle="tab"
                            data-bs-target="#posts" type="button" role="tab">Posts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="job-tab" data-bs-toggle="tab"
                            data-bs-target="#jobs" type="button" role="tab">Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="posts-tab" data-bs-toggle="tab"
                            data-bs-target="#people" type="button" role="tab">People</button>
                </li>
            </ul>
        </div>
        <div class="bg-white shadow-sm w-100 rounded mt-11 d-lg-none">
            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded-top w-100 border-none p-0">
            <div class="d-flex">
                <div class="d-block">
                    <div class="d-block p-5">
                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="100" class="border p-2 bg-white mb-3" style="margin-top:-80px">
                        <h2 class="ms-3">{{ $company->name }}</h2>
                        <p class="ms-3">{{ $company->tagline }}</p>
                        <div class="d-block fs-7 text-muted ms-3" style="width: 250px">
                            <p class="mb-0">{{ $company->industry}} Company</p>
                            <p>{{ $company->city}}, {{ $company->country}}</p>
                            <p>{{ $company->follows_count}} Followers</p>
                        </div>
                    </div>
                    <div class="d-block gap-2 ms-6">
                        @php $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id); @endphp
                        <form action="{{route('follow.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            <button type="submit" class="btn follow-btn text-white bg-primary text-center py-0 px-5 rounded-pill">
                                @if($isFollowed)
                                    <i class="bi bi-check-lg fs-6 d-flex fst-normal fw-bold gap-1 py-2 lh-1">Following</i>
                                @else
                                    <i class="bi bi-plus-lg fs-6 d-flex fst-normal fw-bold gap-1 py-2 lh-1">Follow</i>
                                @endif
                            </button>
                        </form>
                        <a href="{{$company->website}}"><button class="btn follow-btn text-primary fw-bold border-primary text-center py-1 px-6 mt-3 rounded-pill">Website <i class="bi bi-box-arrow-in-up-right"></i></button></a>
                    </div>
                </div>
                <div class="d-block">
                    @if($company->parentRelation && $company->parentRelation->parentCompany)
                        <div class="d-block my-3">
                            <p class="text-muted fs-10 mb-1">Subsidiary of</p>
                            <a href="{{ route('company.show', $company->parentRelation->parentCompany->company_id) }}" class="text-decoration-none text-center d-flex rounded px-3 pt-2 mb-2">
                                <img src="{{ asset('IMG/uploads/logo/' . $company->parentRelation->parentCompany->logo) }}"
                                    width="40" height="40"
                                    class="rounded bg-white me-2 mt-1">
                                <div class="d-block text-start">
                                    <div class="mt-1 text-dark fw-semibold">{{ $company->parentRelation->parentCompany->name }}</div>
                                    <p class="fs-9 text-muted">{{ $company->parentRelation->parentCompany->industry }}</p>
                                </div>
                            </a>
                        </div>
                    @elseif($company->subsidiaries && $company->subsidiaries->isNotEmpty())
                        <div class="my-3">
                            <p class="text-muted fs-10 mb-3">Affiliated Pages</p>
                            <div class="row">
                                @foreach($company->subsidiaries as $subsidiary)
                                    @if($subsidiary->childCompany)
                                        <div class="col-12">
                                            <a href="{{ route('company.show', $subsidiary->childCompany->company_id) }}" class="text-decoration-none text-center d-flex rounded px-3">
                                                <img src="{{ asset('IMG/uploads/logo/' . $subsidiary->childCompany->logo) }}"
                                                    width="30" height="30"
                                                    class="rounded bg-white me-2 mt-1">
                                                <div class="d-block text-start">
                                                    <div class="text-dark fw-semibold fs-6">{{ $subsidiary->childCompany->name }}</div>
                                                    <p class="fs-9 text-muted text-truncate-1">{{ $subsidiary->childCompany->industry }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <ul class="nav nav-tabs mt-5 border-top ps-10" id="companyTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                            data-bs-target="#overview" type="button" role="tab">General</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="about-tab" data-bs-toggle="tab"
                            data-bs-target="#about" type="button" role="tab">About</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="post-tab" data-bs-toggle="tab"
                            data-bs-target="#posts" type="button" role="tab">Posts</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="job-tab" data-bs-toggle="tab"
                            data-bs-target="#jobs" type="button" role="tab">Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="posts-tab" data-bs-toggle="tab"
                            data-bs-target="#people" type="button" role="tab">People</button>
                </li>
            </ul>
        </div>
        <div class="tab-content mt-3" id="companyTabsContent">
            <div class="tab-pane fade show active" id="overview" role="tabpanel">
                @if($company->overviews)
                <div class="bg-white shadow-sm w-100 rounded py-5 px-11" style="margin-top: 10px">
                    <h2 class="fs-5">Overview</h2>
                    <p class="fs-9 text-muted">{{$company->overviews->overview}}</p>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border-none">
                            <h2 class="accordion-header ">
                            <button class="accordion-button text-dark bg-transparent border-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Show all details
                            </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="d-block">
                                        <h2 class="fs-7">Website</h2>
                                        <p><a class="fs-9 mt-0" href="{{$company->website}}">{{$company->website}}</a></p>
                                    </div>
                                    <div class="d-block">
                                        <h2 class="fs-7">Page Created</h2>
                                        <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->created_at)) }}</p>
                                    </div>
                                    <div class="d-block">
                                        <h2 class="fs-7">Industry</h2>
                                        <p class="fs-9 text-muted">{{$company->industry}}</p>
                                    </div>
                                    <div class="d-block">
                                        <h2 class="fs-7">Company Size</h2>
                                        <p class="fs-9 mb-0 text-muted">{{$company->employee}}+ Total Employees</p>
                                        <p class="fs-9 text-muted">{{ $binusStudent->count() }}+ Employees Listed</p>
                                    </div>
                                    <div class="d-block">
                                        <h2 class="fs-7">Headquarters</h2>
                                        <p class="fs-9 text-muted">{{$company->city}}, {{$company->country}}</p>
                                    </div>
                                    <div class="d-block">
                                        <h2 class="fs-7">Founded</h2>
                                        <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->established_date)) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @php $countRoles = $company->roles->count(); @endphp
                @php $countPosts = $company->posts->count(); @endphp
                <div class="d-lg-flex d-none gap-3" style="margin-top: 10px">
                    @if($company->posts->isNotEmpty() && $company->roles->isNotEmpty())
                        @if($countRoles < 3)
                            <div class="bg-white shadow-sm rounded py-4 px-11">
                                <h2 class="fs-5 mb-4">Board of directors</h2>
                                <div class="d-block">
                                    @foreach($company->roles as $role)
                                    <a class="d-block text-center border text-decoration-none role-company mt-3" href="{{route('user.page', $role->user->user_id)}}">
                                        <div style="width:150px; height:150px; overflow:hidden; margin:0 auto;">
                                            <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                                style="width:100%; height:100%; object-fit:cover;">
                                        </div>
                                        <h2 class="fs-7 mb-0 mt-3 text-dark fw-bold">{{$role->user->name}}</h2>
                                        <p class="text-muted fs-9 mt-1">{{$role->role}}</p>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="bg-white shadow-sm rounded py-4 px-11">
                                <h2 class="fs-5 mb-4">Board of directors</h2>
                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                                    @foreach($company->roles as $role)
                                    <a class="d-block text-center border text-decoration-none role-company" href="{{route('user.page', $role->user->user_id)}}">
                                        <div style="width:150px; height:150px; overflow:hidden; margin:0 auto;">
                                            <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                                style="width:100%; height:100%; object-fit:cover;">
                                        </div>
                                        <h2 class="fs-7 mb-0 mt-3 text-dark fw-bold">{{$role->user->name}}</h2>
                                        <p class="text-muted fs-9 mt-1">{{$role->role}}</p>
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="bg-white shadow-sm rounded pt-4 w-100">
                            <h2 class="fs-5 mb-3 px-11">Page posts</h2>
                            <div class="d-flex gap-2 px-11">
                                <x-company-post :company="$company"/>
                            </div>
                            <a href="#" class="w-100 mt-5 pb-3 pt-1 text-center align-items-center justify-content-center d-inline-flex border-top mx-auto text-decoration-none">
                                <div class="d-flex text-dark mt-3 mb-0">
                                    <h2 class="fs-6 mb-0">Show all {{$countPosts}} posts</h2>
                                    <i class="bi bi-arrow-right ms-1 fs-6"></i>
                                </div>
                            </a>
                        </div>
                    @elseif($company->roles->isNotEmpty() && $company->posts->isEmpty())
                        <div class="bg-white shadow-sm w-100 rounded py-3 px-11">
                            <h2 class="fs-5 mb-4">Board of directors</h2>
                            <div class="d-flex gap-3">
                                @foreach($company->roles as $role)
                                <a class="d-block text-center border text-decoration-none role-company" href="#">
                                    <div style="width:150px; height:150px; overflow:hidden;">
                                        <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}" style="width:100%; height:100%; object-fit:cover;">
                                    </div>
                                    <h2 class="fs-7 mb-0 mt-3 text-dark fw-bold">{{$role->user->name}}</h2>
                                    <p class="text-muted fs-9 mt-1">{{$role->role}}</p>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
                <div class="d-lg-none" style="margin-top: 10px">
                    @if($company->roles->isNotEmpty())
                    <div class="bg-white shadow-sm rounded py-4 px-11">
                        <h2 class="fs-6 mb-4">Board of directors</h2>
                        <div>
                            @foreach($company->roles as $role)
                            <a class="d-block text-center text-decoration-none role-company" href="#">
                                <div class="shadow-sm" style="width:300px; height:150px; overflow:hidden; margin:0 auto;">
                                    <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                        style="width:100%; height:100%; object-fit:cover;">
                                </div>
                                <h2 class="fs-7 mb-0 mt-3 text-dark fw-bold">{{$role->user->name}}</h2>
                                <p class="text-muted fs-9 mt-1">{{$role->role}}</p>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($company->posts->isNotEmpty())
                    <div class="bg-white shadow-sm rounded py-4 px-11 w-100" style="margin-top: 10px">
                        <h2 class="fs-6">Page posts</h2>
                        <div class="d-flex gap-2">
                            <x-company-post :company="$company"/>
                        </div>
                        <a href="#" class="w-100 mt-5 pb-3 pt-1 text-center align-items-center justify-content-center d-inline-flex border-top mx-auto text-decoration-none">
                            <div class="d-flex text-dark mt-3 mb-0">
                                <h2 class="fs-6 mb-0">Show all {{$countPosts}} posts</h2>
                                <i class="bi bi-arrow-right ms-1 fs-6"></i>
                            </div>
                        </a>
                    </div>
                    @endif
                </div>
                @if($company->jobs->isNotEmpty())
                <div class="bg-white shadow-sm w-100 rounded py-3 align-items-center mx-auto" style="margin-top: 10px">
                    <div class="d-block px-11">
                        <h2 class="fs-5 mb-4">Recently posted jobs</h2>
                        @php $countJobs = $company->jobs->count(); @endphp
                        <div class="d-flex">
                            <div class="d-lg-flex d-none">
                            @foreach($company->jobs->take(3) as $job)
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-2" style="width: 300px"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                    <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="35" height="35" class="me-3">
                                    <div class="d-block">
                                        <h2 class="fs-6 mb-0">{{ $job->title }}</h2>
                                        <p class="text-muted fs-13 mb-0">{{ $company->city }}</p>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="d-lg-none gap-5">
                            @foreach($company->jobs->take(3) as $job)
                                <a href="#" class="d-flex align-items-center text-decoration-none text-dark p-2" style="width: 300px"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                    <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="35" height="35" class="me-3">
                                    <div class="d-block">
                                        <h2 class="fs-6 mb-0">{{ $job->title }}</h2>
                                        <p class="text-muted fs-13 mb-0">{{ $company->city }}</p>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="#" class="w-100 mt-5 text-center align-items-center justify-content-center d-inline-flex border-top pt-2 mx-auto text-decoration-none">
                        <div class="d-flex text-dark mt-3">
                            <h2 class="fs-6">Show all {{ $countJobs }} jobs</h2>
                            <i class="bi bi-arrow-right ms-1 fs-6"></i>
                        </div>
                    </a>
                </div>
                @endif
                @if($company->experiences->isNotEmpty())
                <div class="bg-white shadow-sm w-100 rounded py-3 px-11" style="margin-top: 10px">
                    <h2 class="fs-5 mb-4">People highlights</h2>
                    <div class="d-lg-flex d-none justify-content-between">
                        <div class="d-block">
                            <h2 class="fs-7 mb-4">employees who active and verified in connexa</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @php $binus = "C009" @endphp
                                        @foreach($company->experiences->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($company->experiences->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->user->name)[1] ?? $user->user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-7 mb-4">employees who studied at Binus University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($binusStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($binusStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-7 mb-4">employees who studied at Harvard University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $harvardStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-none justify-content-between">
                        <div class="d-block">
                           <h2 class="fs-6 mb-4">employees who active and verified in connexa</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @php $binus = "C009" @endphp
                                        @foreach($company->experiences->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($company->experiences->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->user->name)[1] ?? $user->user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-6 mb-4">employees who studied at Binus University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($binusStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $binusStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($binusStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-block">
                            <h2 class="fs-7 mb-4">employees who studied at Harvard University</h2>
                            <div class="d-flex">
                                <div class="d-block">
                                    <div class="d-flex">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}" width="50" height="50" class="rounded-circle img-general">
                                        @endforeach
                                        <p class="d-flex border rounded-circle align-items-center justify-content-center fs-8" style="width: 50px; height:50px;">{{ $harvardStudent->count() }}+</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        @foreach($harvardStudent->take(4) as $user)
                                            <p class="fs-12">{{ explode(' ', $user->name)[1] ?? $user->name }},</p>
                                        @endforeach
                                        <p class="fs-12">& others</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="tab-pane fade show" id="about" role="tabpanel">
                <div class="bg-white shadow-sm w-100 rounded py-4 px-11" style="margin-top: 10px">
                    <h2 class="fs-5">Overview</h2>
                    @if($company->overviews)
                    <p class="fs-9 text-muted">{{$company->overviews->overview}}</p>
                    @endif
                    <h2 class="fs-6">Website</h2>
                    <p class="fs-9 text-muted">{{$company->website}}</p>
                    <h2 class="fs-6">Page created</h2>
                    <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->created_at)) }}</p>
                    <h2 class="fs-6">Industry</h2>
                    <p class="fs-9 text-muted">{{$company->industry}}</p>
                    <h2 class="fs-6">Company Size</h2>
                    <p class="fs-9 mb-0 text-muted">{{$company->employee}}+ Total Employees</p>
                    <p class="fs-9 text-muted">{{ $binusStudent->count() }}+ Employees Listed</p>
                    <h2 class="fs-6">Headquarters</h2>
                    <p class="fs-9 text-muted">{{$company->city}}, {{$company->country}}</p>
                    <h2 class="fs-6">Founded</h2>
                    <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->established_date)) }}</p>
                </div>
            </div>
            <div class="tab-pane fade show" id="posts" role="tabpanel">
                <div class="d-flex w-100 gap-2" style="margin-top: 10px">
                    <div class="bg-white shadow-sm w-25 h-25 rounded py-5">
                        <div class="d-block text-center">
                            <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" width="50" style="">
                            <h2 class="fs-5 mb-2 mt-5">{{$company->name}}</h2>
                            <p class="fs-7 mb-0">{{ $company->follows_count}} Followers</p>
                            @if($countPosts > 0)
                            <p class="fs-7 mb-0">{{ $countPosts}} Total post</p>
                            @else
                            <p class="fs-7 mb-0 text-muted mt-7">No posts yet</p>
                            @endif
                        </div>
                    </div>
                    @if($countPosts > 0)
                    <div class="bg-white shadow-sm w-75 rounded">
                        <h2 class="fs-5 ms-5 mt-4">Page posts</h2>
                        <div class="d-flex gap-2 mx-5">
                            <x-company-post :company="$company"/>
                        </div>
                        <a href="#" class="w-100 mt-5 pb-3 pt-1 text-center align-items-center justify-content-center d-inline-flex border-top mx-auto text-decoration-none">
                            <div class="d-flex text-dark mt-3 mb-0">
                                <h2 class="fs-6 mb-0">Show all {{$countPosts}} posts</h2>
                                <i class="bi bi-arrow-right ms-1 fs-6"></i>
                            </div>
                        </a>
                    </div>
                    @else
                    <div class="bg-white shadow-sm w-75 rounded">
                        <div class="d-block w-100 text-center py-5">
                            <img src="{{asset('IMG/asset/post.png')}}" width="150">
                            <h2 class="mb-0 mt-3 fs-4">No posts yet</h2>
                            <p class="mb-0 fs-7 mt-2 text-muted">Check back later for posts!</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="tab-pane fade show" id="jobs" role="tabpanel">
                <div class="bg-white shadow-sm w-100 rounded align-items-center mx-auto" style="margin-top: 10px">
                    <div class="d-flex px-7 py-4 justify-content-between align-items-center gap-2">
                        <div class="d-block">
                            <h2 class="fs-5">Interested in joining us in the future?</h2>
                            <p>Candidates who show interest in a company are 2x more likely to be contacted by recruiters.</p>
                            @php $isInterested = $company->interested->contains('user_id', Auth::user()->user_id); @endphp
                            <form action="{{route('interest.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="company_id" value="{{$company->company_id}}">
                                @if($isInterested)
                                    <div class="d-flex align-items-center text-success">
                                        <p class="mb-0 me-1"><i class="bi bi-check-circle-fill"></i> You’ve expressed interest.</p>
                                        <button type="submit" class="bg-hover rounded p-1 text-success fw-semibold">undo</button>
                                    </div>
                                @else
                                    <button type="submit" class="btn follow-btn text-primary fw-semibold border-primary text-center py-1 px-3 rounded-pill">i'm Interested</button>
                                @endif
                            </form>
                        </div>
                        <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" width="60" height="60">
                    </div>
                </div>
                @if($company->jobs->isNotEmpty())
                <div class="bg-white shadow-sm w-100 rounded align-items-center mx-auto" style="margin-top: 10px">
                    <div class="d-block px-7">
                        <h2 class="fs-5 mb-4 pt-4">Recently posted jobs</h2>
                        @php $countJobs = $company->jobs->count(); @endphp
                        <div class="d-flex">
                            <div class="d-lg-flex d-none gap-3">
                            @foreach($company->jobs->take(4) as $job)
                                <a href="#" class="d-flex shadow-sm-hover align-items-start text-decoration-none text-dark p-2 border rounded" style="width: 200px">
                                    <div class="d-flex justify-content-between w-100 h-100 py-3 px-2">
                                        <div class="d-block">
                                            <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="40" height="40" class="me-3 mb-3">
                                            <h2 class="fs-6 mb-0">{{ $job->title }}</h2>
                                            <p class="text-muted fs-13 mb-0">{{ $company->city }}</p>
                                            <div class="fs-13 text-muted">{{$job->created_at->diffForHumans()}}</div>
                                        </div>
                                        @php $isSaved = $job->jobsaved->contains('user_id', Auth::user()->user_id); @endphp
                                        <form action="{{route('save.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                                            <button type="submit" class="bg-hover border-none p-1 rounded-circle">
                                                @if($isSaved)
                                                    <i class="bi bi-bookmark-fill"></i>
                                                @else
                                                   <i class="bi bi-bookmark"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                            <div class="d-lg-none d-sm-flex gap-2">
                            @foreach($company->jobs->take(2) as $job)
                                <a href="#" class="d-flex shadow-sm-hover align-items-start text-decoration-none text-dark p-2 border rounded" style="width: 200px">
                                    <div class="d-flex justify-content-between w-100 h-100 py-3 px-2">
                                        <div class="d-block">
                                            <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="40" height="40" class="me-3 mb-3">
                                            <h2 class="fs-6 mb-0">{{ $job->title }}</h2>
                                            <p class="text-muted fs-13 mb-0">{{ $company->city }}</p>
                                            <div class="fs-13 text-muted">{{$job->created_at->diffForHumans()}}</div>
                                        </div>
                                        @php $isSaved = $job->jobsaved->contains('user_id', Auth::user()->user_id); @endphp
                                        <form action="{{route('save.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{$job->job_id}}">
                                            <button type="submit" class="bg-hover border-none p-1">
                                                @if($isSaved)
                                                    <i class="bi bi-bookmark-fill"></i>
                                                @else
                                                   <i class="bi bi-bookmark"></i>
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </a>
                            @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="#" class="w-100 mt-5 text-center align-items-center justify-content-center d-inline-flex border-top py-1 mx-auto text-decoration-none">
                        <div class="d-flex text-dark mt-3">
                            <h2 class="fs-6">Show all {{ $countJobs }} jobs</h2>
                            <i class="bi bi-arrow-right ms-1 fs-6"></i>
                        </div>
                    </a>
                </div>
                @elseif($company->jobs->isEmpty())
                <div class="bg-white shadow-sm w-100 rounded align-items-center mx-auto" style="margin-top: 10px">
                    <div class="d-block text-center px-7 py-5">
                        <img src="{{asset('IMG/asset/briefcase.png')}}" width="50px">
                        <p class="fw-semibold mt-4 mb-0">{{$company->name}} is not currently recruiting employees</p>
                        <p class="fs-10 text-muted">get job vacancy notifications update from this company by clicking interest</p>
                    </div>
                </div>
                @endif
            </div>
            <div class="tab-pane fade show" id="people" role="tabpanel">
                <div class="bg-white shadow-sm w-100 rounded py-4 px-11" style="margin-top: 10px">
                    <h2 class="fs-5">People highlights</h2>
                    <div class="d-flex w-100 justify-content-between">
                    <div class="mt-4 border rounded p-3">
                        <h2 class="fw-semibold mb-3 fs-6">Where they studied</h2>
                        @if(!empty($educationPercentages))
                            @foreach($educationPercentages as $univ => $percent)
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <span class="fw-medium text-muted fs-8">{{ $univ }}</span>
                                        <span class="text-muted fs-8">{{ $percent }}%</span>
                                    </div>
                                    <div class="progress" style="height: 15px; width:300px">
                                        <div class="progress-bar bg-primary"
                                            role="progressbar"
                                            style="width: {{ $percent }}%;"
                                            aria-valuenow="{{ $percent }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    </div>
                    <div class="container mt-4">
                        <div class="row g-3" id="experienceContainer">
                            @foreach($company->experiences as $index => $user)
                                @php $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                                    ->where('user_target', $user->user->user_id)
                                                    ->exists();
                                @endphp
                                <div class="col-6 col-md-4 experience-item"
                                    style="{{ $index >= 6 ? 'display:none;' : '' }}"> {{-- sembunyikan setelah item ke-6 --}}
                                    <a href="#" class="rounded border d-block text-decoration-none" style="width: 100%; height:100%;">
                                        <div class="d-block pb-5">
                                            <img src="{{ asset('IMG/cover/' . $user->user->cover_image) }}"
                                                class="rounded-top" width="100%" height="120" style="object-fit: cover;">
                                            <div class="d-block text-center">
                                                <img src="{{ asset('IMG/uploads/profile/' . $user->user->profile_image) }}"
                                                    width="100" height="100"
                                                    class="img-general rounded-circle"
                                                    style="margin-top:-40px; object-fit: cover;">
                                                <div class="d-block mx-2">
                                                    <h2 class="fs-6 mt-3 text-truncate-1 fw-semibold text-dark mb-1">
                                                        {{ $user->user->name }}
                                                    </h2>
                                                    <p class="fs-10 lh-1 text-truncate-2 text-muted mx-4">
                                                        {{ $user->user->headline }}
                                                    </p>
                                                </div>
                                            </div>
                                            @if(Auth::id() != $user->user->user_id)
                                                <form action="{{ route('connect.store') }}" method="POST" class="d-flex justify-content-center">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="{{ $user->user->user_id }}">
                                                    @if($isRequested)
                                                        <button type="submit"
                                                                class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill">
                                                            <i class="bi bi-clock-history"></i> Pending
                                                        </button>
                                                    @else
                                                        <button type="submit"
                                                                class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill">
                                                            <i class="bi bi-person-plus-fill"></i> Connect
                                                        </button>
                                                    @endif
                                                </form>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        @if($company->experiences->count() > 6)
                        <div class="text-center mt-4">
                            <button id="viewMoreBtn" class="btn btn-outline-primary rounded-pill px-4">
                                View more results
                            </button>
                        </div>
                        @endif
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const items = document.querySelectorAll(".experience-item");
        const viewMoreBtn = document.getElementById("viewMoreBtn");
        let visibleCount = 6; // awalnya 6 item (2 baris)
        const step = 6; // tiap kali klik, tambah 6 item (2 baris)

        viewMoreBtn?.addEventListener("click", function() {
            for (let i = visibleCount; i < visibleCount + step; i++) {
                if (items[i]) items[i].style.display = "block";
            }
            visibleCount += step;

            // kalau sudah habis, sembunyikan tombol
            if (visibleCount >= items.length) {
                viewMoreBtn.style.display = "none";
            }
        });
    });
    </script>
    @endsection
