@extends('layouts.app')

@section('title', 'Jobs')

@section('content')
    <div class="d-lg-flex mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
        <div class="content1 mt-8"
            style="width: 280px; height: 89.9vh;
                    position: sticky; top:76px">
            <div class="bg-white shadow-sm w-100 rounded pb-3 mb-3 h-100">

            </div>
        </div>
        <div class="content2 mt-8 gap-10"
            style="width: 650px;">
            <div class="content1" style="height: 70px; position: sticky; top:75.5px">
                <div class="bg-white shadow-sm w-100 rounded mb-3 h-100 p-2">
                    p
                </div>
            </div>
            <div class="shadow-sm bg-white w-100 rounded mt-3 px-4 py-3 scroll-area" style="height: 720px; overflow-y:auto;">
                <div class="d-flex flex-column" style="min-height:700px;">

                    <div class="flex-grow-1">
                        @foreach($jobs as $job)
                        <a href="#" class="d-flex gap-3 align-items-start text-dark text-decoration-none"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                            <img src="{{asset('IMG/uploads/logo/' . $job->company->logo)}}" width="50" height="50" class="mt-3">
                            <div class="d-flex border-top border-bottom p-3 w-100">
                                <div class="d-block w-50 ">
                                    <h2 class="fs-6 mb-0 text-primary">{{ $job->title }}</h2>
                                    <p class="fs-9 mb-0">{{ $job->company->name }}</p>
                                    <p class="fs-9 mb-0 text-muted">{{ $job->company->city }}, {{ $job->company->country }}</p>
                                    <p class="fs-11 mb-0 text-muted">{{$job->created_at->diffForHumans()}}</p>
                                </div>
                                <div class="d-block fs-10 w-25 ms-4 text-muted">
                                    <div class="d-flex gap-1">
                                        <p class="mb-0 text-success">{{ $job->salary ? 'Rp' . number_format($job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                                        @if($job->salary)
                                        <p class="mb-0">-</p>
                                        @endif
                                        <p class="mb-0 text-success">{{ $job->salary ? 'Rp' . number_format($job->salary->max_salary, 0, ',', '.') : '' }}</p>
                                    </div>
                                    <div class="d-flex gap-1">
                                        <p class="mb-0 fw-semibold text-mutedbold">{{$job->employment->employment_type}}</p>|
                                        <p class="mb-0">{{$job->mode->mode}}</p>
                                    </div>

                                </div>
                            </div>

                        </a>
                        @endforeach
                    </div>

                    <!-- Pagination links -->
                    <div class="mt-auto pt-3">
                        {{ $jobs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>

        </div>
    </div>




@endsection
