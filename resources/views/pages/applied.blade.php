@extends('layouts.app')

@section('title', 'Application')

@section('content')
    <div class=" d-lg-block justify-content-center mt-9 p-2" style="gap: 1rem;">
        <div class="container-fluid shadow-sm bg-white rounded p-4 scroll-area" style="height: 90vh; width:700px; overflow-y:auto">
            <a href="{{route('company.show', $appliedJob->job->company->company_id)}}" class="d-flex gap-3 text-decoration-none align-items-center">
                <img src="{{asset('IMG/uploads/logo/' . $appliedJob->job->company->logo)}}" width="50">
                <div class="d-block gap-2">
                    <h2 class="fs-4 mb-0 text-dark">{{$appliedJob->job->title}}</h2>
                    <div class="d-flex align-items-center">
                        <h1 class="fs-6 mb-0 text-dark fw-light pe-3 me-3 h-50">{{$appliedJob->job->company->name}}</h1>
                    </div>
                </div>
            </a>
            <div class="d-block mt-4">
                <p class="fs-8 mb-0 text-muted">{{$appliedJob->job->company->industry}} Company</p>
                <p class="text-muted fs-7">{{$appliedJob->job->company->city}}, {{$appliedJob->job->company->country}}<i class="bi bi-dot"></i>{{$appliedJob->job->created_at->diffForHumans()}}<i class="bi bi-dot"></i>Total {{$appliedJob->job->applicant->count()}} applicants</p>
                <div class="d-flex align-items-center gap-3">
                    <div class="d-blockr">
                        <p class="fs-11 fw-light mb-0">Modes</p>
                        <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$appliedJob->job->mode->mode}}</h3>
                    </div>
                    <div class="d-block">
                        <p class="fs-11 fw-light mb-0">Employment</p>
                        <h3 class="fs-7 fw-semibold mb-0 px-3 py-2 border rounded">{{$appliedJob->job->employment->employment_type}}</h3>
                    </div>
                    <div class="d-block">
                        <p class="fs-11 fw-light mb-0">Salary Range</p>
                        <div class="d-flex fs-7 gap-1 border rounded px-3 py-2">
                            <p class="mb-0 text-success">{{ $appliedJob->job->salary ? 'Rp' . number_format($appliedJob->job->salary->min_salary, 0, ',', '.') : 'Not showing salary' }}</p>
                            @if($appliedJob->job->salary)
                            <p class="mb-0">-</p>
                            @endif
                            <p class="mb-0 text-success">{{ $appliedJob->job->salary ? 'Rp' . number_format($appliedJob->job->salary->max_salary, 0, ',', '.') : '' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-block border-top border-bottom py-5 my-5">
                <h2 class="fs-6 mb-4">Application Progress</h2>
                @if ($appliedJob->status == 'Pass')

                    <div class="d-flex gap-5">
                        <div class="d-block align-items-center text-start ">
                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                            </div>
                            <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                            <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="d-block align-items-center text-start ">
                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                            </div>
                            <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                            <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="d-block align-items-center text-start ">
                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                            </div>
                            <p class="mb-0 fs-7 text-success">Technical Test</p>
                            <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="d-block align-items-center text-start ">
                            <div class="d-flex align-items-center" style="margin-right:-35px">
                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                                <div class="bg-success w-100 text-success" style="height:2px"></div>
                            </div>
                            <p class="mb-0 fs-7 text-success">HR Interview</p>
                            <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="d-block align-items-center text-start ">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-circle-fill fs-9 text-success"></i>
                            </div>
                            <p class="mb-0 fs-7 text-success">Hired</p>
                            <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="d-block">
                            <h3 class="fs-7 mb-0">Detail Status:</h3>
                            <p class="fs-8 mb-3">Application Passed | Hired</p>
                        </div>
                        <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">The hiring team will contact you personally for further information, please actively check your message notifications.</h2>
                    </div>

                @elseif ($appliedJob->status == 'Rejected')
                    @if ($appliedJob->progress == 'Interview')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Technical Test</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-danger fw-semibold">HR Interview</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                </div>
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-block w-75">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">Rejected | HR Interview</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light border-start ps-3">Unfortunately, {{$appliedJob->job->company->name}} has decided not to move forward with your {{$appliedJob->job->title}} application at this time.</h2>
                        </div>

                    @elseif ($appliedJob->progress == 'Test')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-danger fw-semibold">Technical Test</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
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
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-block w-75">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">Rejected | Technical Test</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light border-start ps-3">Unfortunately, {{$appliedJob->job->company->name}} has decided not to move forward with your {{$appliedJob->job->title}} application at this time.</h2>
                        </div>

                    @elseif ($appliedJob->progress == 'Review')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-x-circle-fill fs-9 text-danger"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-danger fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
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
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="d-block w-75">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">Rejected | Application Review</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light border-start ps-3">Unfortunately, {{$appliedJob->job->company->name}} has decided not to move forward with your {{$appliedJob->job->title}} application at this time.</h2>
                        </div>
                    @endif

                @elseif ($appliedJob->status == 'On Progress')
                    @if ($appliedJob->progress == 'Interview')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-primary w-100" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Technical Test</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-primary fw-semibold">HR Interview</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-circle-fill fs-9 text-lightGrey"></i>
                                </div>
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-block">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">On Going | HR Interview</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">The hiring team will contact you personally for further information, please actively check your message notifications.</h2>
                        </div>

                    @elseif ($appliedJob->progress == 'Test')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-success w-100 text-success" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-primary w-100" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start justify-content-center">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-primary fw-semibold">Technical Test</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
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
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-block">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">On Going | Technical Test</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">The hiring team will contact you personally for further information, please actively check your message notifications.</h2>
                        </div>

                    @elseif ($appliedJob->progress == 'Review')

                        <div class="d-flex gap-5">
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-success"></i>
                                    <div class="bg-primary w-100" style="height:3px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-success fw-semibold">Applied</p>
                                <p class="text-muted fs-13">{{ $appliedJob->created_at->format('d/m/Y') }}</p>
                            </div>
                            <div class="d-block align-items-center text-start ">
                                <div class="d-flex align-items-center" style="margin-right:-35px">
                                    <i class="bi bi-circle-fill fs-9 text-primary"></i>
                                    <div class="bg-lightGrey w-100" style="height:2px"></div>
                                </div>
                                <p class="mb-0 fs-7 text-primary fw-semibold">Application Review</p>
                                <p class="text-muted fs-13">{{ $appliedJob->updated_at->format('d/m/Y') }}</p>
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
                                <p class="mb-0 fs-7 text-lightGrey fw-normal">Hired</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="d-block">
                                <h3 class="fs-7 mb-0">Detail Status:</h3>
                                <p class="fs-8 mb-3">On Going | Application Review</p>
                            </div>
                            <h2 class="fs-8 mb-0 fw-light w-50 border-start ps-3">The hiring team will contact you personally for further information, please actively check your message notifications.</h2>
                        </div>

                    @endif
                @endif
            </div>

            <div>
                <h2 class="fs-6 mb-4">Detail Submitted</h2>
                <div class="d-flex align-items-center mb-3">
                    <img src="{{asset('IMG/uploads/profile/' . $appliedJob->user->profile_image)}}" width="60" height="60" class="rounded-circle">
                    <div class="d-block ms-4">
                        <h2 class="fs-6 mt-3 fw-semibold mb-2">{{$appliedJob->user->name}}</h2>
                        <p class="fs-8 lh-1 mb-2">{{$appliedJob->user->headline }}</p>
                        <p class="fs-8 lh-1 text-muted">{{$appliedJob->user->city}}, {{$appliedJob->user->country}}</p>
                    </div>
                </div>
                @php
                    function fileBadge($file) {
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));

                        return match ($ext) {
                            'pdf'  => ['label' => 'PDF',  'bg' => 'bg-danger'],
                            'docx' => ['label' => 'DOCX', 'bg' => 'bg-primary'],
                            'doc'  => ['label' => 'DOC',  'bg' => 'bg-primary'],
                            default => ['label' => strtoupper($ext), 'bg' => 'bg-secondary'],
                        };
                    }
                @endphp
                <div class="d-flex mb-5 gap-4">
                    @if($appliedJob->resume_file)
                        @php $badge = fileBadge($appliedJob->resume_file); @endphp
                        <div class="d-block">
                            <h2 class="fs-8">Resume</h2>
                            <a href="{{ asset('FILE/' . $appliedJob->resume_file) }}"
                               download class="btn rounded-0 btn-outline-light border p-0 pe-3 fs-7 d-flex align-items-center gap-2 text-muted">
                                <span class="px-3 py-2 {{ $badge['bg'] }} text-white fw-bold">{{ $badge['label'] }}</span>
                                Download Resume
                            </a>
                        </div>
                    @endif
                    @if($appliedJob->portfolio_file)
                        @php $badge = fileBadge($appliedJob->portfolio_file); @endphp
                        <div class="d-block">
                            <h2 class="fs-8">Portfolio</h2>
                            <a href="{{ asset('FILE/' . $appliedJob->portfolio_file) }}"
                               download class="btn rounded-0 btn-outline-light border p-0 pe-3 fs-7 d-flex align-items-center gap-2 text-muted">
                                <span class="px-3 py-2  {{ $badge['bg'] }} text-white fw-bold">{{ $badge['label'] }}</span>
                                Download Portfolio
                            </a>
                        </div>
                    @endif
                </div>
                @if($appliedJob->cover_letter)
                <h2 class="fs-8">Cover Letter</h2>
                {!! '<div class="fs-8 border rounded p-3">'.$appliedJob->cover_letter.'</div>' !!}
                @endif
            </div>

            <div class="border-top pt-5 mt-5">
                <h2 class="fs-6 mb-4">Meet the hiring team</h2>
                <div class="d-flex gap-2">
                @foreach($appliedJob->job->company->accessUsers->take(2) as $user)
                    <a href="#" class="d-flex gap-3 w-50 p-2 text-decoration-none text-dark">
                        <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" width="50" height="50" class="rounded-circle" style="object-fit: cover">
                        <div class="d-block">
                            <h2 class="fs-7 mb-0">{{$user->name}}</h2>
                            <p class="fs-10 lh-1 mb-0 text-truncate-2">{{$user->headline}}</p>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>

            <div class="border-top pt-5 mt-5">
                <h2 class="fs-6 fw-semibold mb-3">About the job</h2>
                {!! '<div class="fs-8">'.$appliedJob->job->job_details.'</div>' !!}
            </div>
        </div>
    </div>
@endsection
