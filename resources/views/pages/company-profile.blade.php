@extends('layouts.app')

@section('title', $company->name)

@section('content')
    <div class="container mb-10">
        <div class="bg-white shadow-sm w-100 rounded mt-11 d-lg-block d-none">
            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded-top w-100 border-none p-0">
            <div class="d-flex">
                <div class="d-block">
                    <div class="d-block px-10">
                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="200" class="border p-2 bg-white mb-3" style="margin-top:-140px">
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
            <div class="tab-pane fade show" id="overview" role="tabpanel">
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
                                        <p class="fs-9 mb-0 text-muted">{{number_format($company->employee)}}+ Total Employees</p>
                                        <p class="fs-9 text-muted">{{number_format($company->experiences_count)}} Employees Listed</p>
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
                                    <a class="d-block text-center border text-decoration-none role-company mt-3" href="#">
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
                                    <a class="d-block text-center border text-decoration-none role-company" href="#">
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
                    <p class="fs-9 text-muted">{{$company->overviews->overview}}</p>
                    <h2 class="fs-6">Website</h2>
                    <p class="fs-9 text-muted">{{$company->website}}</p>
                    <h2 class="fs-6">Page created</h2>
                    <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->created_at)) }}</p>
                    <h2 class="fs-6">Industry</h2>
                    <p class="fs-9 text-muted">{{$company->industry}}</p>
                    <h2 class="fs-6">Company Size</h2>
                    <p class="fs-9 mb-0 text-muted">{{number_format($company->employee)}}+ Total Employees</p>
                    <p class="fs-9 text-muted">{{number_format($company->experiences_count)}} Employees Listed</p>
                    <h2 class="fs-6">Headquarters</h2>
                    <p class="fs-9 text-muted">{{$company->city}}, {{$company->country}}</p>
                    <h2 class="fs-6">Founded</h2>
                    <p class="fs-9 text-muted">{{ date('F j, Y', strtotime($company->established_date)) }}</p>
                </div>
            </div>
            <div class="tab-pane fade show active" id="posts" role="tabpanel">
                <div class="d-flex w-100 gap-2" style="margin-top: 10px">
                    <div class="bg-white shadow-sm w-25 rounded py-5">
                        <div class="d-block text-center">
                            <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" width="50" style="">
                            <h2 class="fs-5 mb-2 mt-5">{{$company->name}}</h2>

                            <p class="fs-7 mb-0">{{ $company->follows_count}} Followers</p>
                            <p class="fs-7 mb-0">{{ $countPosts}} Total post</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-sm w-75 rounded py-3 px-11">
                        <h2 class="fs-6">Overview</h2>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="jobs" role="tabpanel">
                <div class="bg-white shadow-sm w-100 rounded py-3 px-11" style="margin-top: 10px">
                    <h2 class="fs-6">Recently posted jobs</h2>
                </div>
            </div>
            <div class="tab-pane fade show" id="people" role="tabpanel">
                <div class="bg-white shadow-sm w-100 rounded py-3 px-11" style="margin-top: 10px">
                    <h2 class="fs-6">People working here</h2>
                </div>
            </div>
        </div>
    </div>
@endsection
