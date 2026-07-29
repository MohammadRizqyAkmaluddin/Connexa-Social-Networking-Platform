@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="d-lg-flex mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
        <div class="content1 mt-8"
            style="width: 270px; height: 89.9vh;
                    position: sticky; top:76px">
            <div class="bg-white shadow-sm w-100 rounded px-5 mx-auto py-4 mb-3">
                <h2 class="fs-5 mb-5">Job Preferences</h2>
                <form action="{{ route('jobs.page') }}" method="GET">
                    <h2 class="mb-2 fw-semibold fs-7 d-flex align-items-start gap-2">Search <p class="fw-light fs-10 mb-0 text-muted">( Title, Location, Company )</p></h2>
                    <input class="mb-4 rounded-pill px-3 py-2 fs-8 border w-100" type="text" name="search" value="{{ request('search') }}" placeholder="Ex: Web Developer">
                </form>
                <form action="{{ route('jobs.page') }}" method="GET" id="filterForm">
                    <h2 class="mb-2 fw-semibold fs-7 d-flex align-items-start gap-2">Min Salary <p class="fw-light fs-10 mb-0 text-muted">( IDR )</p></h2>
                    <input class="mb-4 rounded px-3 py-2 rounded-pill border fs-8 w-100"
                        type="text" name="min_salary"
                        value="{{ request('min_salary') }}"
                        placeholder="Ex: 3.500.000"
                        onchange="document.getElementById('filterForm').submit()">
                    <h2 class="mb-2 fw-semibold fs-7 d-flex align-items-start gap-2">Working Mode</h2>
                    <select class= "mb-4 w-100 rounded-pill fs-7 py-2 px-3" name="mode" onchange="document.getElementById('filterForm').submit()">
                        <option value="">All Modes</option>
                        <option value="OS" {{ request('mode') == 'OS' ? 'selected' : '' }}>On-site</option>
                        <option value="HY" {{ request('mode') == 'HY' ? 'selected' : '' }}>Hybrid</option>
                        <option value="RE" {{ request('mode') == 'RE' ? 'selected' : '' }}>Remote</option>
                    </select>
                    <h2 class="mb-2 fw-semibold fs-7 d-flex align-items-start gap-2">Employment</h2>
                    <select class="mb-4 w-100 rounded-pill fs-7 py-2 px-3" name="employment" onchange="document.getElementById('filterForm').submit()">
                        <option value="">All Employments</option>
                        <option value="FT" {{ request('employment') == 'FT' ? 'selected' : '' }}>Full-time</option>
                        <option value="PT" {{ request('employment') == 'PT' ? 'selected' : '' }}>Part-time</option>
                        <option value="IN" {{ request('employment') == 'IN' ? 'selected' : '' }}>Internship</option>
                        <option value="CO" {{ request('employment') == 'CO' ? 'selected' : '' }}>Contract</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="content2 mt-8 gap-10"
            style="width: 650px;">
            <div class="content1 text-center align-items-center mx-auto" style="height: 70px; position: sticky; top:75.5px">
                <div class="bg-white shadow-sm w-100 rounded mb-3 h-100 px-4 py-3 d-flex">
                    <button class="btn d-flex align-items-center gap-3 text-dark fw-semibold px-4 py-0" data-bs-target="#saved" data-bs-toggle="modal"
                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                        <i class="bi bi-bookmarks fs-6"></i> <h2 class="fs-7 mb-0">Saved Jobs</h2>
                    </button>
                    <div class="border-end"></div>
                    <button class="btn d-flex align-items-center gap-3 text-dark fw-semibold px-4 py-0" data-bs-target="#appliedModal" data-bs-toggle="modal"
                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                        <i class="bi bi-file-earmark-check fs-6"></i> <h2 class="fs-7 mb-0">Application</h2>
                    </button>
                </div>
            </div>

            <div class="modal fade" id="appliedModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content px-5 pt-3">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 d-flex align-items-center gap-2 mb-0" id="exampleModalToggleLabel3">Applied Jobs <p class="fw-light fs-6 mb-0">( {{$applied->count()}} )</p></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:700px" >
                            @foreach($applied as $appliedJob)
                                    <a href="{{route('application.show', $appliedJob->applicant_id)}}" class="d-flex gap-3 w-100 border-0 bg-transparent align-items-start text-dark text-start text-decoration-none"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">

                                        <img src="{{asset('IMG/uploads/logo/' . $appliedJob->job->company->logo)}}" width="50" height="50" class="mt-3">
                                        <div class="d-flex border-bottom p-3 w-100 flex-column flex-md-row">
                                            <div class="d-block w-100 w-md-50">
                                                <h2 class="fs-6 mb-0 text-primary">{{ $appliedJob->job->title }}</h2>
                                                <p class="fs-9 mb-0">{{ $appliedJob->job->company->name }}</p>
                                                <p class="fs-9 mb-0 text-muted">{{ $appliedJob->job->company->city }}, {{ $appliedJob->job->company->country }}</p>
                                                
                                                {{-- MOBILE ONLY: Salary, employment_type & job mode right under city, country --}}
                                                <div class="d-block d-md-none fs-10 text-muted mt-2">
                                                    <div class="d-flex gap-1">
                                                        <p class="mb-0 text-success fw-semibold">{{ $appliedJob->job->salary ? 'Rp' . number_format($appliedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                        @if($appliedJob->job->salary)
                                                        <p class="mb-0 text-success fw-semibold">-</p>
                                                        <p class="mb-0 text-success fw-semibold">{{ 'Rp' . number_format($appliedJob->job->salary->max_salary, 0, ',', '.') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex gap-1 mt-1">
                                                        <p class="mb-0 fw-semibold text-mutedbold">{{$appliedJob->job->employment->employment_type}}</p>|
                                                        <p class="mb-0">{{$appliedJob->job->mode->mode}}</p>
                                                    </div>
                                                </div>

                                                <p class="fs-11 mb-0 text-muted mt-1 mt-md-0">{{$appliedJob->job->created_at->diffForHumans()}}</p>
                                            </div>

                                            {{-- DESKTOP ONLY: Right side salary & employment info --}}
                                            <div class="d-none d-md-block fs-10 w-25 ms-4 text-muted">
                                                <div class="d-flex gap-1">
                                                    <p class="mb-0 text-success">{{ $appliedJob->job->salary ? 'Rp' . number_format($appliedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                    @if($appliedJob->job->salary)
                                                    <p class="mb-0">-</p>
                                                    <p class="mb-0 text-success">{{ 'Rp' . number_format($appliedJob->job->salary->max_salary, 0, ',', '.') }}</p>
                                                    @endif
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p class="mb-0 fw-semibold text-mutedbold">{{$appliedJob->job->employment->employment_type}}</p>|
                                                    <p class="mb-0">{{$appliedJob->job->mode->mode}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </a>
                            @endforeach
                        </div>
                        <div class="modal-footer border-0 align-items-center mx-auto ">
                            <p class="text-muted fs-8 text-center w-100">We will notify you when there is an update on your application.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="saved" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel3">Saved jobs</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @foreach($saved as $savedJob)
                                <button class="d-flex gap-3 w-100 border-0 bg-transparent align-items-start text-dark text-start text-decoration-none" data-bs-target="#jobDetailSaved{{$savedJob->job->job_id}}" data-bs-toggle="modal"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                    <img src="{{asset('IMG/uploads/logo/' . $savedJob->job->company->logo)}}" width="50" height="50" class="mt-3">
                                    <div class="d-flex border-bottom p-3 w-100 flex-column flex-md-row">
                                            <div class="d-block w-100 w-md-50">
                                                <h2 class="fs-6 mb-0 text-primary">{{ $savedJob->job->title }}</h2>
                                                <p class="fs-9 mb-0">{{ $savedJob->job->company->name }}</p>
                                                <p class="fs-9 mb-0 text-muted">{{ $savedJob->job->company->city }}, {{ $savedJob->job->company->country }}</p>
                                                
                                                {{-- MOBILE ONLY: Salary, employment_type & job mode right under city, country --}}
                                                <div class="d-block d-md-none fs-10 text-muted mt-2">
                                                    <div class="d-flex gap-1">
                                                        <p class="mb-0 text-success fw-semibold">{{ $savedJob->job->salary ? 'Rp' . number_format($savedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                        @if($savedJob->job->salary)
                                                        <p class="mb-0 text-success fw-semibold">-</p>
                                                        <p class="mb-0 text-success fw-semibold">{{ 'Rp' . number_format($savedJob->job->salary->max_salary, 0, ',', '.') }}</p>
                                                        @endif
                                                    </div>
                                                    <div class="d-flex gap-1 mt-1">
                                                        <p class="mb-0 fw-semibold text-mutedbold">{{$savedJob->job->employment->employment_type}}</p>|
                                                        <p class="mb-0">{{$savedJob->job->mode->mode}}</p>
                                                    </div>
                                                </div>

                                                <p class="fs-11 mb-0 text-muted mt-1 mt-md-0">{{$savedJob->job->created_at->diffForHumans()}}</p>
                                            </div>

                                            {{-- DESKTOP ONLY: Right side salary & employment info --}}
                                            <div class="d-none d-md-block fs-10 w-25 ms-4 text-muted">
                                                <div class="d-flex gap-1">
                                                    <p class="mb-0 text-success">{{ $savedJob->job->salary ? 'Rp' . number_format($savedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                    @if($savedJob->job->salary)
                                                    <p class="mb-0">-</p>
                                                    <p class="mb-0 text-success">{{ 'Rp' . number_format($savedJob->job->salary->max_salary, 0, ',', '.') }}</p>
                                                    @endif
                                                </div>
                                                <div class="d-flex gap-1">
                                                    <p class="mb-0 fw-semibold text-mutedbold">{{$savedJob->job->employment->employment_type}}</p>|
                                                    <p class="mb-0">{{$savedJob->job->mode->mode}}</p>
                                                </div>
                                            </div>
                                        </div>
                                </button>
                                <div class="modal fade" id="jobDetailSaved{{$savedJob->job->job_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog-start">
                                        <div class="modal-content px-5 pt-3" style="height: 800px; overflow-y:auto">
                                            <div class="modal-header">
                                                <a href="{{route('company.show', $savedJob->job->company->company_id)}}" class="d-flex gap-2 text-decoration-none">
                                                    <img src="{{asset('IMG/uploads/logo/' . $savedJob->job->company->logo)}}" width="30">
                                                    <h1 class="modal-title fs-6 text-dark" id="exampleModalToggleLabel1">{{$savedJob->job->company->name}}</h1>
                                                </a>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="fs-4">{{$savedJob->job->title}}</h2>
                                                <p class="text-muted fs-7">{{$savedJob->job->company->city}}, {{$savedJob->job->company->country}}<i class="bi bi-dot"></i>{{$savedJob->job->created_at->diffForHumans()}}<i class="bi bi-dot"></i>Total {{$savedJob->job->applicant->count()}} applicants</p>
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="d-blockr">
                                                        <p class="fs-11 fw-light mb-0">Modes</p>
                                                        <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$savedJob->job->mode->mode}}</h3>
                                                    </div>
                                                    <div class="d-block">
                                                        <p class="fs-11 fw-light mb-0">Employment</p>
                                                        <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$savedJob->job->employment->employment_type}}</h3>
                                                    </div>
                                                    <div class="d-block">
                                                        <p class="fs-11 fw-light mb-0">Salary Range</p>
                                                        <div class="d-flex fs-7 gap-1 border rounded px-3 py-2">
                                                            <p class="mb-0 text-success">{{ $savedJob->job->salary ? 'Rp' . number_format($savedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                            @if($savedJob->job->salary)
                                                            <p class="mb-0">-</p>
                                                            @endif
                                                            <p class="mb-0 text-success">{{ $savedJob->job->salary ? 'Rp' . number_format($savedJob->job->salary->max_salary, 0, ',', '.') : '' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-1 mt-4">
                                                    @if($savedJob->job->is_applied)
                                                        <div class="d-flex align-items-center text-success">
                                                            <p class="mb-0 me-1"><i class="bi bi-check-circle-fill"></i> Application already submitted</p>
                                                        </div>
                                                    @else
                                                        <button class="btn btn-primary rounded-pill px-4 pt-0 fw-bold mb-0" data-bs-target="#jobModalSecond{{$savedJob->job->job_id}}" data-bs-toggle="modal">Quick Apply</button>
                                                    @endif
                                                    <form action="{{route('save.store')}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="job_id" value="{{$savedJob->job->job_id}}">
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            @if($savedJob->job->is_saved)
                                                                <h2 class="bg-hover border rounded-pill px-4 py-2 fs-6 mb-0 text-primary fw-bold">Saved</h2>
                                                            @else
                                                                <h2 class="bg-hover text-muted border rounded-pill px-4 py-2 fs-6 mb-0">Save</h2>
                                                            @endif
                                                        </button>
                                                    </form>
                                                </div>
                                                <p class="fs-8 mt-5 text-justify">{{$savedJob->job->company->overviews->overview}}</p>
                                                <div class="mt-5">
                                                    <h2 class="fs-5 fw-semibold mb-4">About the job</h2>
                                                    {!! $savedJob->job->job_details !!}
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <p class="mx-auto text-muted fs-8">Caution, there are no fees charged in the recruitment process</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="modal-footer border-0">

                        </div>
                    </div>
                </div>
            </div>

            <div class="shadow-sm bg-white w-100 rounded mt-3 px-4 py-3 scroll-area" style="height: 720px; overflow-y:auto;">
                <div class="d-flex flex-column" style="min-height:700px;">


                    <div class="flex-grow-1">
                        @foreach($jobs as $job)
                        <button class="d-flex gap-3 w-100 border-0 bg-transparent align-items-start text-dark text-start text-decoration-none" data-bs-target="#jobModalFirst{{$job->job_id}}" data-bs-toggle="modal"
                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                            <img src="{{asset('IMG/uploads/logo/' . $job->company->logo)}}" width="50" height="50" class="mt-3">
                            <div class="d-flex border-bottom p-3 w-100 flex-column flex-md-row">
                                    <div class="d-block w-100 w-md-50">
                                        <h2 class="fs-6 mb-0 text-primary">{{ $job->title }}</h2>
                                        <p class="fs-9 mb-0">{{ $job->company->name }}</p>
                                        <p class="fs-9 mb-0 text-muted">{{ $job->company->city }}, {{ $job->company->country }}</p>
                                        
                                        {{-- MOBILE ONLY: Salary, employment_type & job mode right under city, country --}}
                                        <div class="d-block d-md-none fs-10 text-muted mt-2">
                                            <div class="d-flex gap-1">
                                                <p class="mb-0 text-success fw-semibold">{{ $job->salary ? 'Rp' . number_format($job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                @if($job->salary)
                                                <p class="mb-0 text-success fw-semibold">-</p>
                                                <p class="mb-0 text-success fw-semibold">{{ 'Rp' . number_format($job->salary->max_salary, 0, ',', '.') }}</p>
                                                @endif
                                            </div>
                                            <div class="d-flex gap-1 mt-1">
                                                <p class="mb-0 fw-semibold text-mutedbold">{{$job->employment->employment_type}}</p>|
                                                <p class="mb-0">{{$job->mode->mode}}</p>
                                            </div>
                                        </div>

                                        <p class="fs-11 mb-0 text-muted mt-1 mt-md-0">{{$job->created_at->diffForHumans()}}</p>
                                    </div>

                                    {{-- DESKTOP ONLY: Right side salary & employment info --}}
                                    <div class="d-none d-md-block fs-10 w-25 ms-4 text-muted">
                                        <div class="d-flex gap-1">
                                            <p class="mb-0 text-success">{{ $job->salary ? 'Rp' . number_format($job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                            @if($job->salary)
                                            <p class="mb-0">-</p>
                                            <p class="mb-0 text-success">{{ 'Rp' . number_format($job->salary->max_salary, 0, ',', '.') }}</p>
                                            @endif
                                        </div>
                                        <div class="d-flex gap-1">
                                            <p class="mb-0 fw-semibold text-mutedbold">{{$job->employment->employment_type}}</p>|
                                            <p class="mb-0">{{$job->mode->mode}}</p>
                                        </div>
                                    </div>
                                </div>
                        </button>
                        <div class="modal fade" id="jobModalFirst{{$job->job_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel1" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-start">
                                <div class="modal-content px-5 pt-3" style="height: 800px; overflow-y:auto">
                                    <div class="modal-header">
                                        <a href="{{route('company.show', $job->company->company_id)}}" class="d-flex gap-2 text-decoration-none">
                                            <img src="{{asset('IMG/uploads/logo/' . $job->company->logo)}}" width="30">
                                            <h1 class="modal-title fs-6 text-dark" id="exampleModalToggleLabel1">{{$job->company->name}}</h1>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h2 class="fs-4">{{$job->title}}</h2>
                                        <p class="text-muted fs-7">{{$job->company->city}}, {{$job->company->country}}<i class="bi bi-dot"></i>{{$job->created_at->diffForHumans()}}<i class="bi bi-dot"></i>Total {{$job->applicant->count()}} applicants</p>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="d-blockr">
                                                <p class="fs-11 fw-light mb-0">Modes</p>
                                                <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$job->mode->mode}}</h3>
                                            </div>
                                            <div class="d-block">
                                                <p class="fs-11 fw-light mb-0">Employment</p>
                                                <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$job->employment->employment_type}}</h3>
                                            </div>
                                            <div class="d-block">
                                                <p class="fs-11 fw-light mb-0">Salary Range</p>
                                                <div class="d-flex fs-7 gap-1 border rounded px-3 py-2">
                                                    <p class="mb-0 text-success">{{ $job->salary ? 'Rp' . number_format($job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                                    @if($job->salary)
                                                    <p class="mb-0">-</p>
                                                    @endif
                                                    <p class="mb-0 text-success">{{ $job->salary ? 'Rp' . number_format($job->salary->max_salary, 0, ',', '.') : '' }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-1 mt-4">
                                            @if($job->is_applied)
                                                <div class="d-flex align-items-center text-success">
                                                    <p class="mb-0 me-1"><i class="bi bi-check-circle-fill"></i> Application already submitted</p>
                                                </div>
                                            @else
                                                <button class="btn btn-primary rounded-pill px-4 pt-0 fw-bold mb-0" data-bs-target="#jobModalSecond{{$job->job_id}}" data-bs-toggle="modal">Quick Apply</button>
                                            @endif
                                            <form action="{{route('save.store')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="job_id" value="{{$job->job_id}}">
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if($job->is_saved)
                                                        <h2 class="bg-hover border rounded-pill px-4 py-2 fs-6 mb-0 text-primary fw-bold">Saved</h2>
                                                    @else
                                                        <h2 class="bg-hover text-muted border rounded-pill px-4 py-2 fs-6 mb-0">Save</h2>
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                        <p class="fs-8 mt-5 text-justify">{{$job->company->overviews->overview}}</p>
                                        <div class="mt-5">
                                            <h2 class="fs-5 fw-semibold mb-4">About the job</h2>
                                            {!! $job->job_details !!}
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <p class="mx-auto text-muted fs-8">Caution, there are no fees charged in the recruitment process</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="jobModalSecond{{$job->job_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                            <div class="modal-dialog modal-lg modal-dialog-start">
                                <div class="modal-content px-5 pt-3" style="max-height: 800px; overflow-y:auto">
                                    <form class="apply-form" action="{{route('application.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                                        <input type="hidden" name="job_id" value="{{$job->job_id}}">
                                        <input type="hidden" name="status" value="On Progress">
                                        <div class="modal-header align-items-center">
                                            <h1 class="modal-title fs-5 border-end pe-3" id="exampleModalToggleLabel2">Apply to {{$job->company->name}}</h1>
                                            <h1 class="modal-title fs-8 ms-3">As {{$job->title}}</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}" width="60" height="60" class="rounded-circle">
                                                <div class="d-block ms-4">
                                                    <h2 class="fs-6 mt-3 fw-semibold mb-0">{{Auth::user()->name}}</h2>
                                                    <p class="fs-8 lh-1 mb-0">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 16, ' ...') }}</p>
                                                    <p class="fs-8 lh-1 text-muted">{{Auth::user()->city}}, {{Auth::user()->country}}</p>
                                                </div>
                                            </div>
                                            <div class="gap-3 mb-5">
                                                <div class="d-block">
                                                    <h2 class="fs-6 mb-0 mt-4">Resume</h2>
                                                    <p class="fs-8 text-muted">Please upload your updated resume</p>
                                                    <div class="d-flex gap-4 align-items-start">

                                                        <label for="formFile_{{ $job->job_id }}"
                                                            class="upload-btn px-3 py-1 fw-semibold rounded-pill text-primary border border-primary">
                                                            Upload Resume
                                                        </label>

                                                        <input name="resume_file"
                                                            type="file"
                                                            id="formFile_{{ $job->job_id }}"
                                                            accept=".pdf, .doc, .docx"
                                                            style="display:none;">

                                                        <div id="fileNameContainer_{{ $job->job_id }}"></div>
                                                    </div>
                                                </div>

                                                <div class="d-block">
                                                    <h2 class="fs-6 mb-0 d-flex align-items-center mt-4">
                                                        Portfolio
                                                        <p class="text-muted fs-8 mb-0 ms-2 fw-light">(optional)</p>
                                                    </h2>
                                                    <p class="fs-8 text-muted">Please upload your portfolio</p>

                                                    <div class="d-flex gap-4 align-items-start">

                                                        <label for="portfolio_{{ $job->job_id }}"
                                                            class="upload-btn px-3 py-1 fw-semibold rounded-pill text-primary border border-primary">
                                                            Upload Portfolio
                                                        </label>

                                                        <input name="portfolio_file"
                                                            type="file"
                                                            id="portfolio_{{ $job->job_id }}"
                                                            accept=".pdf, .doc, .docx"
                                                            style="display:none;">

                                                        <div id="fileNamePortfolio_{{ $job->job_id }}"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h2 class="fs-6 mb-0 d-flex align-items-center">Cover Letter <p class="text-muted fs-8 mb-0 ms-2 fw-light">(optional)</p></h2>
                                            <p class="fs-8 text-muted">Please upload your updated resume</p>
                                            <textarea name="cover_letter" id="editor-{{$job->job_id}}" class="form-control rounded">{!! old('cover_letter') !!}</textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <p class="mx-auto text-muted fs-8">Caution, there are no fees charged in the recruitment process</p>
                                            <button type="submit" class="btn btn-primary fw-bold rounded-pill px-4">Send Application</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-auto pt-3">
                        {{ $jobs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function removeFormat(num) {
    return num.replace(/\./g, "");
}

document.getElementById("min_salary").addEventListener("input", function () {
    let original = removeFormat(this.value);
    if (!isNaN(original) && original !== "") {
        this.value = formatNumber(original);
    }
});

document.getElementById("min_salary").addEventListener("change", function () {
    let original = removeFormat(this.value);

    this.value = original;

    document.getElementById("filterForm").submit();
});

</script>

@if(request()->has('applied_page'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    let modalEl = document.getElementById('appliedModal');
    if (modalEl) {
        let modal = new bootstrap.Modal(modalEl);
        modal.show();
    }
});
</script>
@endif


@endsection


