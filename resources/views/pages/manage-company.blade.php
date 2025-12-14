@extends('layouts.app')

@section('title', 'Manage')

@section('content')
    <div class="container d-lg-flex mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
        <div class="content2 mt-8 w-100 w-md-90 w-lg-75">
            <div class="bg-white ps-4 py-3 d-flex shadow-sm w-100 rounded" style="margin-bottom: 10px">
                <div class="d-flex me-5 align-items-center rounded-top">
                    <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" width="50" class="p-2 bg-white">
                </div>
                <div class="d-flex">
                    <ul class="nav nav-tabs align-items-center justify-content-center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-light active border-0" id="configuration-tab" data-bs-toggle="tab" data-bs-target="#configuration-tab-pane" type="button" role="tab" aria-controls="configuration-tab-pane" aria-selected="true">Configuration</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-light border-0" id="analytics-tab" data-bs-toggle="tab" data-bs-target="#analytics-tab-pane" type="button" role="tab" aria-controls="analytics-tab-pane" aria-selected="false">Analytics</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-light border-0" id="recruitment-tab" data-bs-toggle="tab" data-bs-target="#recruitment-tab-pane" type="button" role="tab" aria-controls="recruitment-tab-pane" aria-selected="false">Recruitment</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-light border-0" id="posts-tab" data-bs-toggle="tab" data-bs-target="#posts-tab-pane" type="button" role="tab" aria-controls="posts-tab-pane" aria-selected="false">Company Content</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="configuration-tab-pane" role="tabpanel" aria-labelledby="configuration-tab" tabindex="0">
                    <div class="content1" >
                        <div class="shadow-sm mb-3" style="margin-bottom:-10px">
                            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded w-100 border-none p-0">
                        </div>
                    </div>
                    <div class="bg-white rounded p-4  shadow-sm" style="height: 538px; overflow-y:auto;">
                        <div class="d-block">
                            <div class="d-flex gap-4">
                                <div class="d-block align-items-center border p-4">
                                    <div class="d-block">
                                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="150" class="border p-2 bg-white mb-3">
                                    </div>
                                    <h2 class="mb-3">{{$company->name}}</h2>
                                    {{-- <p>{{$company->tagline}}</p> --}}
                                    <div class="d-block">
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Industry</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->industry}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Headquarter</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->city}} | {{$company->country}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Website</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->website}}</p>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Comapny Size</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->employee}}+ total employees</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block align-items-center">
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-0">Overview</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                        </div>
                                        <p class="mb-0 fs-8 text-muted text-justify">{{$company->overviews->overview}}</p>
                                    </div>
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-3">Boards of directors</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-2 bg-transparent"><i class="bi bi-plus-square text-muted"></i></button>
                                        </div>
                                        <div class="d-flex gap-3">
                                            @foreach($company->roles as $role)
                                                <div class="d-block align-items-center text-center border ">
                                                    <div style="width:150px; height:150px; overflow:hidden; margin:0 auto;">
                                                        <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                                            style="width:100%; height:100%; object-fit:cover;">
                                                    </div>
                                                    <div class="d-block py-2">
                                                        <h2 class="fs-7 mb-0">{{$role->user->name}}</h2>
                                                        <h2 class="fs-8 mb-0 text-muted fw-light">{{$role->role}}</h2>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="analytics-tab-pane" role="tabpanel" aria-labelledby="analytics-tab" tabindex="0">
                    <div class="content1" >
                        <div class="shadow-sm mb-3" style="margin-bottom:-10px">
                            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded w-100 border-none p-0">
                        </div>
                    </div>
                    <div class="bg-white rounded p-4  shadow-sm" style="height: 538px; overflow-y:auto;">
                        <div class="d-block">
                            <div class="d-flex gap-4">
                                <div class="d-block align-items-center border p-4">
                                    <div class="d-block">
                                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="150" class="border p-2 bg-white mb-3">
                                    </div>
                                    <h2 class="mb-3">{{$company->name}}</h2>
                                    {{-- <p>{{$company->tagline}}</p> --}}
                                    <div class="d-block">
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Industry</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->industry}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Headquarter</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->city}} | {{$company->country}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Website</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->website}}</p>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Comapny Size</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->employee}}+ total employees</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block align-items-center">
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-0">Overview</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                        </div>
                                        <p class="mb-0 fs-8 text-muted text-justify">{{$company->overviews->overview}}</p>
                                    </div>
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-3">Boards of directors</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                        </div>
                                        <div class="d-flex gap-3">
                                            @foreach($company->roles as $role)
                                                <div class="d-block align-items-center text-center border ">
                                                    <div style="width:150px; height:150px; overflow:hidden; margin:0 auto;">
                                                        <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                                            style="width:100%; height:100%; object-fit:cover;">
                                                    </div>
                                                    <div class="d-block py-2">
                                                        <h2 class="fs-7 mb-0">{{$role->user->name}}</h2>
                                                        <h2 class="fs-8 mb-0 text-muted fw-light">{{$role->role}}</h2>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="recruitment-tab-pane" role="tabpanel" aria-labelledby="recruitment-tab" tabindex="0">
                    @if($company->jobs->isNotEmpty())
                        <div class="bg-white shadow-sm w-100 rounded align-items-center mx-auto" style="margin-top: 10px">
                            <div class="d-block px-7 py-4">
                                <h2 class="fs-5 mb-3 d-flex">Active Posted Jobs <p class="text-muted fw-light fs-7 mt-1 ms-2">( {{$company->jobs->count()}} Jobs )</p></h2>

                                <div class="d-flex p-4 scroll-area inner-shadow" style="overflow-x:auto;">
                                    <div class="d-flex gap-3" >
                                        @foreach($company->jobs->take(5) as $job)
                                            <a href="{{route('recruitment.show', $job->job_id)}}" class="d-flex shadow-sm-hover align-items-center text-decoration-none text-dark border rounded" style="width: 300px">
                                                <div class="d-flex align-items-start justify-content-center py-3 px-3">
                                                    <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="40" height="40" class="me-3 mb-3">
                                                    <div class="d-block">
                                                        <h2 class="fs-6 mb-0 text-truncate-1">{{ $job->title }}</h2>
                                                        <div class="d-flex align-items-center text-muted">
                                                            <p class="fs-13 mb-0">{{ $company->city }}</p>
                                                            <i class="bi bi-dot"></i>
                                                            <p class="fs-13 mb-0">{{$job->created_at->diffForHumans()}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($company->jobs->isEmpty())
                        <div class="bg-white shadow-sm w-100 rounded align-items-center mx-auto" style="margin-top: 10px">
                            <div class="d-block text-center px-7 py-5">
                                <img src="{{asset('IMG/asset/briefcase.png')}}" width="50px">
                                <p class="fw-semibold mt-4 mb-0">Not yet posted any jobs</p>
                            </div>
                        </div>
                    @endif

                    <div class="bg-white rounded px-7 py-5 shadow-sm" style="height: 480px; overflow-y:auto; margin-top: 10px">
                        <h2 class="mb-0 fs-5">Create Jobs</h2>
                        <p class="mb-0 fs-7 text-muted">Open recruitment for specific position</p>

                        <form action="{{ route('job.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            <div class="d-block gap-3">
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label fs-8 mb-1 text-mutedbold fw-semibold">Title</label>
                                    <input type="text" name="title" class="form-control fs-7" id="exampleFormControlInput1" placeholder="Title">
                                </div>
                                <div class="d-flex gap-3">
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label fs-8 mb-1 text-mutedbold fw-semibold">Mode</label>
                                        <select name="mode_id" class="form-select fs-7" aria-label="Default select example">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($mode as $mod)
                                                <option value="{{$mod->mode_id}}">{{$mod->mode}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label fs-8 mb-1 text-mutedbold fw-semibold">Employment</label>
                                        <select name="employment_id" class="form-select fs-7" aria-label="Default select example">
                                            <option value="" selected disabled>Select</option>
                                            @foreach($employment as $em)
                                                <option value="{{$em->employment_id}}">{{$em->employment_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label fs-8 mb-1 text-mutedbold fw-semibold">Min Salary</label>
                                        <input type="number" name="min_salary" class="form-control fs-7"  placeholder="RP 3.000.000">
                                    </div>
                                    <div>
                                        <label for="exampleFormControlInput1" class="form-label fs-8 mb-1 text-mutedbold fw-semibold">Max Salary</label>
                                        <input type="number" name="max_salary" class="form-control fs-7"  placeholder="RP 5.000.000">
                                    </div>
                                </div>
                            </div>

                            <label for="job_details">Job Details</label>
                            <textarea name="job_details" id="editor" class="form-control">{!! old('job_details') !!}</textarea>

                            <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        </form>

                    </div>
                </div>
                <div class="tab-pane fade" id="posts-tab-pane" role="tabpanel" aria-labelledby="posts-tab" tabindex="0">
                    <div class="content1" >
                        <div class="shadow-sm mb-3" style="margin-bottom:-10px">
                            <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded w-100 border-none p-0">
                        </div>
                    </div>
                    <div class="bg-white rounded p-4  shadow-sm" style="height: 538px; overflow-y:auto;">
                        <div class="d-block">
                            <div class="d-flex gap-4">
                                <div class="d-block align-items-center border p-4">
                                    <div class="d-block">
                                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}" width="150" class="border p-2 bg-white mb-3">
                                    </div>
                                    <h2 class="mb-3">{{$company->name}}</h2>
                                    {{-- <p>{{$company->tagline}}</p> --}}
                                    <div class="d-block">
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Industry</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->industry}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Headquarter</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->city}} | {{$company->country}}</p>
                                        </div>
                                        <div class="d-block mb-3">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Website</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->website}}</p>
                                        </div>
                                        <div class="d-block">
                                            <div class="d-flex">
                                                <h3 class="fs-9 mb-0">Comapny Size</h3>
                                                <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                            </div>
                                            <p class="mb-0 fs-12 text-muted">{{$company->employee}}+ total employees</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-block align-items-center">
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-0">Overview</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                        </div>
                                        <p class="mb-0 fs-8 text-muted text-justify">{{$company->overviews->overview}}</p>
                                    </div>
                                    <div class="d-block p-3">
                                        <div class="d-flex">
                                            <h3 class="fs-9 mb-3">Boards of directors</h3>
                                            <button class="fs-10 py-0 border-0 align-items-start mb-1 bg-transparent"><i class="bi bi-pencil-square text-muted"></i></button>
                                        </div>
                                        <div class="d-flex gap-3">
                                            @foreach($company->roles as $role)
                                                <div class="d-block align-items-center text-center border ">
                                                    <div style="width:150px; height:150px; overflow:hidden; margin:0 auto;">
                                                        <img src="{{ asset('IMG/uploads/profile/' . $role->user->profile_image) }}"
                                                            style="width:100%; height:100%; object-fit:cover;">
                                                    </div>
                                                    <div class="d-block py-2">
                                                        <h2 class="fs-7 mb-0">{{$role->user->name}}</h2>
                                                        <h2 class="fs-8 mb-0 text-muted fw-light">{{$role->role}}</h2>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
