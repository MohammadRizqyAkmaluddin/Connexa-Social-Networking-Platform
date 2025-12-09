@extends('layouts.app')

@section('title', 'Recruitment')

@section('content')
    <div class="container mt-10" style="width: 1000px">
        <div class=" pb-5 shadow-sm bg-white rounded">
            <div class="d-flex ps-4 align-items-center gap-3">
                <a href="{{route('manage.show', $job->company->company_id)}}" class="text-dark"><i class="bi bi-arrow-left fs-4"></i></a>
                <h1 class="fs-4 pt-3 ">Recruitment Dashboard</h1>
            </div>
            <div class="px-5 d-flex mt-3 justify-content-between">
                <div class="d-flex align-items-center gap-3">
                    <img src="{{asset('IMG/uploads/logo/'.$job->company->logo)}}" width="50" height="50">
                    <div class="d-block">
                        <h2 class="fs-6 mb-0">{{$job->title}}</h2>
                        <div class="d-flex align-items-center">
                            <p class="fs-13 mb-0">{{ $job->company->city }}</p>
                            <i class="bi bi-dot"></i>
                            <p class="fs-13 mb-0">{{$job->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
                <div class="d-flex gap-3 align-items-end text-center">
                    <div class="d-block align-items-center text-center">
                        <p class="mb-0 fs-9">status</p>
                        <p class="bg-success text-white px-3 py-0 rounded fs-9 fw-bold mb-1">Active</p>
                    </div>
                    <div class="form-check form-switch align-items-center text-center">
                        <input class="form-check-input" type="checkbox" value="" id="switchCheckChecked" checked>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-3 px-5 py-3 shadow-sm bg-white rounded">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-block">
                    <h2 class="fs-5 mb-0">Applicants</h2>
                    <p class="fs-8 mb-0">List of an applicants candidates</p>
                </div>
                <div class="d-flex gap-3">
                    <form method="GET" class="d-flex gap-3">
                        <input class="rounded-pill px-3 py-1 fs-8 border w-100"
                            type="text"
                            name="search"
                            placeholder="Search Headline or Name"
                            value="{{ request('search') }}">

                        <select class="rounded-pill fs-7 py-1 px-2"
                                style="width: 200px"
                                name="major"
                                onchange="this.form.submit()">
                            <option value="">All Major</option>
                            @foreach($majors as $major)
                                <option value="{{ $major->major_id }}"
                                    {{ request('major') == $major->major_id ? 'selected' : '' }}>
                                    {{ $major->major }}
                                </option>
                            @endforeach
                        </select>

                        <select class="rounded-pill fs-7 py-1 px-2"
                                style="width: 150px"
                                name="status"
                                onchange="this.form.submit()">
                            <option value="">All Status</option>
                            @foreach($job->applicant->unique('status') as $s)
                                <option value="{{ $s->status }}"
                                    {{ request('status') == $s->status ? 'selected' : '' }}>
                                    {{ $s->status }}
                                </option>
                            @endforeach
                        </select>
                    </form>

                </div>
            </div>
        </div>

        <div class="mt-3 border px-5 pt-4 shadow-sm bg-white rounded" style="height: 580px">
            <div class="d-block w-100">
                <h2 class="fs-7 mb-0">Top Listed</h2>
                <p class="fs-9 mb-0">Candidates that fullfill all the aditional submission</p>
                <div class="d-flex mb-4 gap-3 p-3 scroll-area" style="overflow-x:auto;">
                    @foreach($job->applicant as $index => $app)
                    @if($app->portfolio_file && $app->cover_letter)
                        <button class="d-block text-start btn border shadow-sm rounded p-2 mt-2 bg-white" data-bs-target="#applicant{{$app->applicant_id}}" data-bs-toggle="modal">
                            <div class="d-flex gap-3 mb-3 align-items-center" style="width: 410px;">
                                <img src="{{asset('IMG/uploads/profile/' . $app->user->profile_image)}}" class="rounded-circle" style="width: 40px; height:40px; object-fit:cover;">
                                <div class="d-block">
                                    <h2 class="mb-1 fs-7">{{$app->user->name}}</h2>
                                    <p class="mb-0 fs-11 lh-1 text-truncate-2">{{$app->user->headline}}</p>
                                </div>
                            </div>
                            <div class="d-flex pt-2 justify-content-between">
                                <div class="d-flex gap-2">
                                    @if($app->portfolio_file)
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Portfolio <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                    @else
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Portfolio <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                    @endif
                                    <div class="border-end"></div>
                                    @if($app->resume_file)
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Resume <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                    @else
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Resume <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                    @endif
                                    <div class="border-end"></div>
                                    @if($app->cover_letter)
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Cover Letter <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                    @else
                                        <p class="fs-8 mb-0 align-items-center fw-semibold">Cover Letter <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                    @endif
                                </div>
                                @if($app->status == 'Rejected')
                                    <p class="mb-0 fs-10 text-danger px-3 fw-semibold bg-rejected rounded">{{$app->progress}} Rejected</p>
                                @elseif($app->status == 'Pass')
                                    <p class="mb-0 fs-10 text-success px-3 fw-semibold bg-pass rounded">{{$app->progress}} Pass</p>
                                @else
                                    <p class="mb-0 fs-10 text-primary px-3 fw-semibold bg-progress rounded">{{$app->progress}} On Progress</p>
                                @endif
                            </div>
                        </button>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="d-block text-start border-top pt-4">
                <h2 class="fs-7 mb-3">All Applicants</h2>
                <div class="px-3 pb-2 rounded">

                    <div class="row">
                        @foreach($applicants as $app)
                        <div class="col-6 text-start">
                            <button class="border btn w-100 text-start shadow-sm rounded p-2 mt-2 bg-white" data-bs-target="#applicant{{$app->applicant_id}}" data-bs-toggle="modal">
                                <div class="d-flex gap-3 mb-3 align-items-center">
                                    <img src="{{asset('IMG/uploads/profile/' . $app->user->profile_image)}}"
                                        class="rounded-circle"
                                        style="width: 40px; height:40px; object-fit:cover;">
                                    <div>
                                        <h2 class="mb-1 fs-7">{{$app->user->name}}</h2>
                                        <p class="mb-0 fs-11 lh-1 text-truncate-2">{{$app->user->headline}}</p>
                                    </div>
                                </div>

                                <div class="d-flex pt-2 justify-content-between">
                                    <div class="d-flex gap-2">
                                        @if($app->portfolio_file)
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Portfolio <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                        @else
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Portfolio <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                        @endif
                                        <div class="border-end"></div>
                                        @if($app->resume_file)
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Resume <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                        @else
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Resume <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                        @endif
                                        <div class="border-end"></div>
                                        @if($app->cover_letter)
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Cover Letter <i class="bi bi-circle-fill fs-15 text-success"></i></p>
                                        @else
                                            <p class="fs-8 mb-0 align-items-center fw-semibold">Cover Letter <i class="bi bi-circle-fill fs-15 text-lightGrey"></i></p>
                                        @endif
                                    </div>
                                    @if($app->status == 'Rejected')
                                        <p class="mb-0 fs-10 text-danger px-3 fw-semibold bg-rejected rounded">{{$app->progress}} Rejected</p>
                                    @elseif($app->status == 'Pass')
                                        <p class="mb-0 fs-10 text-success px-3 fw-semibold bg-pass rounded">{{$app->progress}} Pass</p>
                                    @else
                                        <p class="mb-0 fs-10 text-primary px-3 fw-semibold bg-progress rounded">{{$app->progress}} On Progress</p>
                                    @endif
                                </div>
                            </button>
                        </div>
                        @endforeach
                    </div>


                    <div class="mt-auto pt-4">
                        {{ $applicants->links('pagination::bootstrap-5') }}
                    </div>

                    @foreach($job->applicant as $app)
                    <div class="modal fade" id="applicant{{$app->applicant_id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-start">
                            <div class="modal-content px-5 pt-3">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 d-flex align-items-center gap-2 mb-0" id="exampleModalToggleLabel3">Manage Application</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body scroll-area align-items-center justify-content-center text-center w-100" style="overflow-y: auto; height:680px" >
                                    <div class="mb-3 align-items-center justify-content-center text-center">
                                        <div class="d-block">
                                            <img src="{{asset('IMG/uploads/profile/' . $app->user->profile_image)}}"
                                                class="rounded-circle mb-3"
                                                style="width: 140px; height:140px; object-fit:cover;">
                                            <div class="d-block align-items-center justify-content-center mx-auto" style="width: 500px">
                                                <h2 class="mb-1 fs-5">{{$app->user->name}}</h2>
                                                <p class="mb-4 fs-7 lh-1">{{$app->user->headline}}</p>
                                                <a href="{{route('user.page', $app->user->user_id)}}" class="text-decoration-none text-light bg-primary py-2 px-3 rounded-pill fs-7 fw-bold">Check profile</a>
                                            </div>
                                        </div>
                                        <div class="d-block border-top border-bottom py-5 my-5 justify-content-center align-items-center mx-auto text-center">
                                            <h2 class="fs-6 mb-4">Application Progress</h2>
                                            @if ($app->status == 'Pass')

                                                <div class="d-flex gap-5 justify-content-center">
                                                    <div class="d-block align-items-center text-start ">
                                                        <div class="d-flex align-items-center" style="margin-right:-35px">
                                                            <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                            <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                        </div>
                                                        <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                        <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                    </div>
                                                    <div class="d-block align-items-center text-start ">
                                                        <div class="d-flex align-items-center" style="margin-right:-35px">
                                                            <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                            <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                        </div>
                                                        <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                                        <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                    </div>
                                                    <div class="d-block align-items-center text-start ">
                                                        <div class="d-flex align-items-center" style="margin-right:-35px">
                                                            <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                            <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                        </div>
                                                        <p class="mb-0 fs-7 text-success">Technical Test</p>
                                                        <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                    </div>
                                                    <div class="d-block align-items-center text-start ">
                                                        <div class="d-flex align-items-center" style="margin-right:-35px">
                                                            <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                            <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                        </div>
                                                        <p class="mb-0 fs-7 text-success">HR Interview</p>
                                                        <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                    </div>
                                                    <div class="d-block align-items-center text-start ">
                                                        <div class="d-flex align-items-center">
                                                            <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                        </div>
                                                        <p class="mb-0 fs-7 text-success">Passed</p>
                                                        <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex gap-3 justify-content-center text-start">
                                                    <div class="d-block">
                                                        <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                        <p class="fs-8 mb-3">Application Passed</p>
                                                    </div>
                                                    <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">This candidate has passed all stages of selection, you can contact him to provide further recruitment information.</h2>
                                                </div>

                                            @elseif ($app->status == 'Rejected')
                                                @if ($app->progress == 'Interview')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Technical Test</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-danger fw-semibold">HR Interview</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3 justify-content-start mx-14 text-start">
                                                        <div class="d-block w-100">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">Rejected | HR Interview</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light border-start ps-3">This candidates already disqualified for this job, but you can still offer other jobs that are more suited to the potential of this candidate by sending a private message </h2>
                                                    </div>

                                                @elseif ($app->progress == 'Test')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-danger fw-semibold">Technical Test</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">HR Interview</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3 justify-content-start mx-14 text-start">
                                                        <div class="d-block w-100">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">Rejected | Technical Test</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light border-start ps-3">This candidates already disqualified for this job, but you can still offer other jobs that are more suited to the potential of this candidate by sending a private message </h2>
                                                    </div>

                                                @elseif ($app->progress == 'Review')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-danger fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Technical Test</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">HR Interview</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex gap-3 justify-content-start mx-14 text-start">
                                                        <div class="d-block w-100">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">Rejected | Application Review</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light border-start ps-3">This candidates already disqualified for this job, but you can still offer other jobs that are more suited to the potential of this candidate by sending a private message </h2>
                                                    </div>
                                                @endif

                                            @elseif ($app->status == 'On Progress')
                                                @if ($app->progress == 'Interview')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-primary w-100" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Technical Test</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-primary fw-semibold">HR Interview</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3 justify-content-center text-start">
                                                        <div class="d-block">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">On Going | HR Interview</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">This candidate has passed technical test step, you can contact him to provide direction regarding the interview.</h2>
                                                    </div>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form action="{{route('reject.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <button class="btn btn-outline-danger fs-7">Reject Application</button>
                                                        </form>
                                                        <form action="{{route('progress.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <input type="hidden" name="progress" value="Interview">
                                                            <input type="hidden" name="status" value="Pass">
                                                            <button class="btn btn-outline-primary fs-7">Proceed Next Step</button>
                                                        </form>
                                                    </div>

                                                @elseif ($app->progress == 'Test')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-success w-100 text-success" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-primary w-100" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start justify-content-center">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-primary fw-semibold">Technical Test</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">HR Interview</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3 justify-content-center text-start">
                                                        <div class="d-block">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">On Going | Technical Test</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">This candidate has passed resume screening step, you can contact him to provide direction regarding the technical test.</h2>
                                                    </div>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form action="{{route('reject.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <button class="btn btn-outline-danger fs-7">Reject Application</button>
                                                        </form>
                                                        <form action="{{route('progress.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <input type="hidden" name="progress" value="Interview">
                                                            <input type="hidden" name="status" value="On Progress">
                                                            <button class="btn btn-outline-primary fs-7">Proceed Next Step</button>
                                                        </form>
                                                    </div>

                                                @elseif ($app->progress == 'Review')

                                                    <div class="d-flex gap-5 justify-content-center">
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                                                <div class="bg-primary w-100" style="height:3px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                                            <p class="text-muted fs-13">{{ $app->created_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-primary fw-semibold">Application Review</p>
                                                            <p class="text-muted fs-13">{{ $app->updated_at->format('d/m/Y') }}</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Technical Test</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                                <div class="bg-lightGrey w-100" style="height:2px"></div>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">HR Interview</p>
                                                        </div>
                                                        <div class="d-block align-items-center text-start ">
                                                            <div class="d-flex align-items-center">
                                                                <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                                            </div>
                                                            <p class="mb-0 fs-7 text-lightGrey fw-normal">Passed</p>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3 justify-content-center text-start">
                                                        <div class="d-block">
                                                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                                                            <p class="fs-8 mb-3">On Going | Application Review</p>
                                                        </div>
                                                        <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">This candidate has applied for the job, you can determine whether this candidate is worthy to proceed to the next step after considering eligibility.</h2>
                                                    </div>
                                                    <div class="d-flex justify-content-end gap-3">
                                                        <form action="{{route('reject.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <button class="btn btn-outline-danger fs-7">Reject Application</button>
                                                        </form>
                                                        <form action="{{route('progress.update')}}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="applicant_id" value="{{$app->applicant_id}}">
                                                            <input type="hidden" name="progress" value="Test">
                                                            <input type="hidden" name="status" value="On Progress">
                                                            <button class="btn btn-outline-primary fs-7">Proceed Next Step</button>
                                                        </form>
                                                    </div>

                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer align-items-end border-top">
                                    <button type="button" class="btn btn-primary" data-bs-target="#message{{$app->applicant_id}}" data-bs-toggle="modal">Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach($job->applicant as $app)
                        <div class="modal fade" id="message{{$app->applicant_id}}" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                            <div class="modal-dialog modal-md modal-dialog-start">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="modal-title d-flex align-items-center gap-2 text-start text-decoration-none text-dark w-100"
                                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                            <img src="{{asset('IMG/uploads/profile/' . $app->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block">
                                                <h2 class="fs-7 mb-1">{{$app->user->name}}</h2>
                                                <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$app->user->headline}}</p>
                                            </div>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body scroll-area" style="overflow-y: auto; height:auto">
                                        <form action="{{route('message.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="sender_id" value="{{Auth::user()->user_id}}">
                                            <input type="hidden" name="receiver_id" value="{{$app->user->user_id}}">
                                            <input type="hidden" name="status" value="New">
                                            <input type="hidden" name="category" value="Job">
                                            <div class="chat-input bg-white p-3 border-top align-items-end justify-content-end">
                                                <textarea type="text" name="message" class="form-control fs-7 scroll-area chat-style" placeholder="Type a message..." ></textarea>
                                                <button type="submit" class="border-0 px-4 mt-2 py-1 bg-primary text-light rounded-pill align-items-end text-end">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection
