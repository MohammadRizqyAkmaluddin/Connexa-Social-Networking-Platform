@extends('layouts.app')

@section('title', $user->name)

@section('content')
<div class="d-flex mt-10 gap-2">
    <div class="d-block mb-5" style="width: 750px;">
        <div class="bg-white shadow-sm rounded">
            <img src="{{asset('IMG/cover/' . $user->cover_image)}}" class="rounded-top w-100">
            <div class="d-flex align-items-center">
                <div class="d-block p-5 w-75">
                    <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle bg-white d-block" style="margin-top:-140px; width: 150px; height: 150px; object-fit:cover">
                    @if($user->gender == 'Male')
                    <h2 class="mt-4 fs-3 d-flex align-items-center gap-2">{{$user->name}} <p class="fs-7 text-lightGrey mb-0">Mr/Sir</p></h2>
                    @else
                    <h2 class="mt-4 fs-3 d-flex align-items-center gap-2">{{$user->name}} <p class="fs-7 text-lightGrey mb-0">Ms/Miss</p></h2>
                    @endif
                    <p class="lh-1">{{$user->headline}}</p>
                    <p class="text-muted fs-8 mb-2">{{$user->city}}, {{$user->country}}</p>
                    @if($user->user_id === $authId)
                    <div onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                        <button class="btn px-0"><h2 class="fs-7 text-primary fw-semibold">{{$connection->count()}} Connections</h2></button>
                    </div>
                    @else
                        <h2 class="fs-7 text-mutedbold d-flex gap-1 fw-semibold">{{$connection->count()}} <p class="text-muted fw-normal">Connections</p></h2>
                    @endif
                    @if($user->userWebsite)
                        <p class="fs-8 mb-1 text-muted">{{$user->userWebsite->website_type}} Website:</p>
                        <a href="{{$user->userWebsite->URL}}" class="text-decoration-none"
                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                            <h2 class="fs-7 text-primary fw-semibold">{{$user->userWebsite->URL}}</h2>
                        </a>
                    @endif
                </div>
                <div class="d-block w-25 text-end">
                    @if($user->user_id === $authId)
                        <button type="button" class="btn hover-btn me-4 fs-9 text-primary p-1 fw-semibold rounded-circle" data-bs-target="#editprofile" data-bs-toggle="modal" style="margin-top:-70px; width:40px; height:40px;"><i class="bi bi-pencil-fill fs-5 text-mutedbold"></i></button>
                    @endif
                    @if($user->userEducations)
                    @foreach($user->userEducations->unique('company_id')->take(2) as $education)
                        <div class="d-flex align-items-center gap-2 mt-2">
                            <img src="{{asset('IMG/uploads/logo/' . $education->company->logo)}}" width="30">
                            <h2 class="fs-10 mb-0">{{$education->company->name}}</h2>
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="modal fade" id="editprofile" aria-hidden="true" aria-labelledby="w" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-start">
                <div class="modal-content">
                    <div class="modal-header px-4">
                        <h2 class="modal-title fs-6">Edit Profile</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body scroll-area px-4" style="overflow-y: auto; max-height:600px">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Full name</label>
                            <input type="text" class="form-control fs-8" name="name" value="{{ old('name', $auth->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Headline</label>
                            <textarea type="text" name="headline" class="message-textarea form-control fs-8 scroll-area" style="height: 100px">{{ old('headline', $auth->headline) }}</textarea>
                        </div>
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Gender</label>
                            <select name="gender" class="form-select fs-7" aria-label="Default select example">
                                <option value="{{$auth->gender}}" selected>{{$auth->gender}}</option>
                                @if($auth->gender == 'Male')
                                    <option value="Female">Female</option>
                                @else
                                    <option value="Male">Male</option>
                                @endif
                            </select>
                        </div>
                        @php
                            use Carbon\Carbon;

                            $dob = $auth->dob ? Carbon::parse($auth->dob) : null;
                            $selectedMonth = old('dob_month', $dob?->month);
                            $selectedDay   = old('dob_date', $dob?->day);
                        @endphp

                        <div class="mb-5 fs-7">
                            <h2 class="mb-2 fs-6">Birthday</h2>

                            <label class="form-label fs-9 mb-1 text-muted">Month</label>
                            <select class="form-select fs-8 mb-3" name="dob_month" required>
                                <option value="">Month</option>
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}" {{ $selectedMonth == $m ? 'selected' : '' }}>
                                        {{ date('F', mktime(0,0,0,$m,1)) }}
                                    </option>
                                @endfor
                            </select>

                            <label class="form-label fs-9 mb-1 text-muted">Day</label>
                            <select class="form-select fs-8" name="dob_date" required>
                                <option value="">Day</option>
                                @for ($d = 1; $d <= 31; $d++)
                                    <option value="{{ $d }}" {{ $selectedDay == $d ? 'selected' : '' }}>
                                        {{ $d }}
                                    </option>
                                @endfor
                            </select>
                        </div>

                        <h2 class="mb-2 fs-6">Location/Region</h2>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Country</label>
                            <input type="text" class="form-control fs-8" name="country" value="{{ old('country', $auth->country) }}" required>
                        </div>
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">City</label>
                            <input type="text" class="form-control fs-8" name="city" value="{{ old('city', $auth->city) }}" required>
                        </div>

                        <h2 class="mb-2 fs-6">Contact Info</h2>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Email</label>
                            <input type="text" class="form-control fs-8" name="email" value="{{ old('email', $auth->email) }}" required>
                        </div>
                        <div class="mb-5">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Phone Number</label>
                            <input type="number" class="form-control fs-8" name="phone_number" value="{{ old('email', $auth->phone_number) }}" required>
                        </div>

                        <div class="mb-3">
                            <h2 class="mb-2 fs-6">Additional Information</h2>
                            <p class="mb-4 fs-9 text-muted">Add or edit more additional information such as portfolio website, blog, publication, and more</p>
                            <button type="button" class="btn connect-btn border-primary fs-6 text-primary fw-semibold px-2 rounded" data-bs-target="#editdetails" data-bs-toggle="modal">Edit Details</button>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary px-5 py-1 fw-semibold rounded-pill">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editdetails" aria-hidden="true" aria-labelledby="w" tabindex="-1">
            <div class="modal-dialog modal-md modal-dialog-start">
                <div class="modal-content">
                    <div class="modal-header px-4">
                        <h2 class="modal-title fs-6">Website/Publication</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="modal-body scroll-area px-4" style="overflow-y: auto; max-height:600px">
                        
                        <input type="hidden" name="user_id" value="{{$authId}}">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Website URL</label>
                            @if($user->userWebsite)
                                <input type="text" class="form-control fs-8" name="URL" value="{{ old('URL', $user->userWebsite->URL) }}" required>
                            @else
                                <input type="text" class="form-control fs-8" name="URL" required>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label fs-9 mb-1 text-muted">Website Type</label>
                            <select name="website_type" class="form-select fs-7" aria-label="Default select example">
                                @if($user->userWebsite)
                                    <option value="{{$user->userWebsite->website_type}}" selected>{{$user->userWebsite->website_type}}</option>
                                     @if($user->userWebsite->website_type == 'Personal')
                                    <option value="Portfolio">Portfolio</option>
                                    <option value="Portfolio">Blog</option>
                                    <option value="Portfolio">Bussiness</option>
                                    <option value="Portfolio">Publication</option>
                                    @elseif($user->userWebsite->website_type == 'Portfolio')
                                    <option value="Portfolio">Personal</option>
                                    <option value="Portfolio">Blog</option>
                                    <option value="Portfolio">Bussiness</option>
                                    <option value="Portfolio">Publication</option>
                                    @elseif($user->userWebsite->website_type == 'Blog')
                                    <option value="Portfolio">Personal</option>
                                    <option value="Portfolio">Portfolio</option>
                                    <option value="Portfolio">Bussiness</option>
                                    <option value="Portfolio">Publication</option>
                                    @elseif($user->userWebsite->website_type == 'Bussiness')
                                    <option value="Portfolio">Personal</option>
                                    <option value="Portfolio">Portfolio</option>
                                    <option value="Portfolio">Blog</option>
                                    <option value="Portfolio">Publication</option>
                                    @elseif($user->userWebsite->website_type == 'Publication')
                                    <option value="Portfolio">Personal</option>
                                    <option value="Portfolio">Portfolio</option>
                                    <option value="Portfolio">Blog</option>
                                    <option value="Portfolio">Bussiness</option>
                                    @endif
                                @else
                                    <option value="Personal" selected>Personal</option>
                                    <option value="Portfolio">Portfolio</option>
                                    <option value="Blog">Blog</option>
                                    <option value="Bussiness">Bussiness</option>
                                    <option value="Portfolio">Publication</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary px-5 py-1 fw-semibold rounded-pill">Save</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        @if($user->about)
        <div class="mt-3 px-5 pb-5 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-4 pt-4">About</h2>

            <div class="d-flex align-items-end">
                <div class="fs-7 mb-0 post-description truncated"
                    style="-webkit-line-clamp: 4;"
                    id="desc-{{ $user->about->user_id}}">
                    {!! $user->about->about !!}
                </div>

                <button class="btn btn-link p-0 text-decoration-none fs-8 text-muted toggle-btn"
                        data-target="desc-{{ $user->about->user_id }}">
                    more
                </button>
            </div>

        </div>
        @endif

        @if($user->experiences->isNotEmpty())
        <div class="mt-3 px-5 pb-4 py-3 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-4 pt-3">Experience</h2>
            @foreach($user->experiences as $index => $experience)
            @php
                $start = \Carbon\Carbon::parse($experience->start_date);
                $end   = $experience->end_date
                            ? \Carbon\Carbon::parse($experience->end_date)
                            : \Carbon\Carbon::now();

                // Hitung total bulan (dijamin integer)
                $totalMonths = $start->diffInMonths($end);

                // Pecah jadi tahun dan bulan
                $diffYears  = intdiv($totalMonths, 12);     // pembagian bulat
                $diffMonths = $totalMonths % 12;

                // Format durasi
                $duration = '';
                if ($diffYears > 0) {
                    $duration .= $diffYears.' yr'.($diffYears > 1 ? 's ' : ' ');
                }
                if ($diffMonths > 0) {
                    $duration .= $diffMonths.' mo'.($diffMonths > 1 ? 's' : '');
                }
                $duration = trim($duration);
            @endphp
                <a href="{{route('company.show', $experience->company->company_id)}}" class="d-flex gap-2 text-decoration-none text-dark {{$index > 0 ? 'border-top pt-4 mt-4' : ''}}">
                    <img src="{{asset('IMG/uploads/logo/'.$experience->company->logo)}}" width="50" height="50">
                    <div class="d-block">
                        <h2 class="fs-6 mb-0">{{$experience->title}}</h2>
                        <div class="d-flex">
                            <p class="fs-8 mb-0">{{$experience->company->name}}</p>
                            <i class="bi bi-dot fs-8"></i>
                            <p class="fs-8 mb-0">{{$experience->employment->employment_type}}</p>
                        </div>
                        <div class="d-flex gap-1">
                            <p class="fs-8 text-muted mb-0">{{ $start->format('M Y') }}</p>
                            <p class="text-muted mb-0" style="margin-top: -3px">-</p>

                            @if($experience->end_date)
                                <p class="fs-8 text-muted mb-0">{{ $end->format('M Y') }}</p>
                            @else
                                <p class="fs-8 text-muted mb-0">Present</p>
                            @endif
                            <i class="bi bi-dot fs-8 text-muted"></i>
                            <p class="fs-8 text-muted mb-0">{{ $duration }}</p>
                        </div>
                        <div class="d-flex gap-1">
                            <p class="fs-8 text-muted mb-0">{{ $experience->company->city }}, {{ $experience->company->country }}</p>
                            <i class="bi bi-dot fs-8 text-muted"></i>
                            <p class="fs-8 text-muted mb-0">{{ $experience->mode->mode }}</p>
                        </div>
                    </div>
                </a>
                <div class="d-flex align-items-end">
                    <div class="fs-7 mb-0 mt-4 post-description truncated"
                        id="desc-{{ $experience->experience_id }}"
                        style="margin-left:58px;">
                        {!! $experience->description !!}
                    </div>

                    <button class="btn btn-link p-0 text-decoration-none fs-8 text-muted toggle-btn"
                            data-target="desc-{{ $experience->experience_id }}">
                        more
                    </button>
                </div>

            @endforeach
        </div>
        @endif

        @if($user->userEducations)
        <div class="mt-3 px-5 pt-3 pb-5 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-4 pt-3">Education</h2>
            @foreach($user->userEducations as $index => $education)
            @php
                $start = \Carbon\Carbon::parse($education->start_date);
                $end   = $education->end_date
                            ? \Carbon\Carbon::parse($education->end_date)
                            : \Carbon\Carbon::now();

                // Hitung total bulan (dijamin integer)
                $totalMonths = $start->diffInMonths($end);

                // Pecah jadi tahun dan bulan
                $diffYears  = intdiv($totalMonths, 12);     // pembagian bulat
                $diffMonths = $totalMonths % 12;

                // Format durasi
                $duration = '';
                if ($diffYears > 0) {
                    $duration .= $diffYears.' yr'.($diffYears > 1 ? 's ' : ' ');
                }
                if ($diffMonths > 0) {
                    $duration .= $diffMonths.' mo'.($diffMonths > 1 ? 's' : '');
                }
                $duration = trim($duration);
            @endphp
                <a href="{{route('company.show', $education->company->company_id)}}" class="d-flex gap-2 text-decoration-none text-dark align-items-start {{$index > 0 ? 'border-top pt-4 mt-4' : ''}}">
                    <img src="{{asset('IMG/uploads/logo/'.$education->company->logo)}}" width="50" height="50">
                    <div class="d-block">
                        <h2 class="fs-6 mb-0">{{$education->company->name}}</h2>
                        <div class="d-flex">
                            <p class="fs-8 mb-0">{{$education->major->major}}</p>
                            <i class="bi bi-dot fs-8 text-muted"></i>
                            <p class="fs-8 mb-0">GPA {{$education->GPA}} / 4.00</p>
                        </div>
                        <div class="d-flex gap-1">
                            <p class="fs-8 text-muted mb-0">{{ $start->format('M Y') }}</p>
                            <p class="text-muted mb-0" style="margin-top: -3px">-</p>

                            @if($education->end_date)
                                <p class="fs-8 text-muted mb-0">{{ $end->format('M Y') }}</p>
                            @else
                                <p class="fs-8 text-muted mb-0">Present</p>
                            @endif
                            <i class="bi bi-dot fs-8 text-muted"></i>
                            <p class="fs-8 text-muted mb-0">{{ $duration }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        @endif

        @if($user->skills)
        <div class="mt-3 px-5 pt-3 pb-5 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-4 pt-3">Skills</h2>
            @foreach($user->skills->take(2) as $index => $skill)
                <div class="d-block align-items-center {{$index > 0 ? 'border-top mt-3 pt-3' : ''}}">
                    @if($skill->education)
                        <h2 class="fs-7 mb-2">{{$skill->skill}}</h2>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{asset('IMG/uploads/logo/'. $skill->education->company->logo)}}" width="40" height="40">
                            <p class="fw-normal fs-8 mb-0">Student at {{$skill->education->company->name}}</p>
                        </div>
                    @endif

                    @if($skill->experience)
                        <h2 class="fs-7 mb-2">{{$skill->skill}}</h2>
                        <div class="d-flex align-items-center gap-2">
                            <img src="{{asset('IMG/uploads/logo/'. $skill->experience->company->logo)}}" width="40" height="40">
                            <p class="fw-normal fs-8 mb-0">{{$skill->experience->title}} at {{$skill->experience->company->name}}</p>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endif

        @if($user->userLanguages)
        <div class="mt-3 px-5 py-3 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-3 pt-3">Languages</h2>
            @foreach($user->userLanguages->take(2) as $index => $lang)
                <div class="d-block pt-3 {{$index > 0 ? 'border-top' : ''}}">
                    <h2 class="mb-0 fs-6">{{$lang->language->language}}</h2>
                    <p class="text-muted fs-8">{{$lang->proficiency->proficiency}}</p>
                </div>
            @endforeach
        </div>
        @endif

        @if($user->interested)
        <div class="mt-3 px-5 pb-5 py-3 bg-white shadow-sm rounded">
            <h2 class="fs-5 mb-4 pt-3">Company Interests</h2>
            <div class="d-flex gap-8">
            @foreach($user->interested->take(3) as $index => $interest)
                <a href="{{route('company.show', $interest->company->company_id)}}" class="d-flex gap-2 text-decoration-none text-dark align-items-start">
                    <img src="{{asset('IMG/uploads/logo/' . $interest->company->logo)}}" width="30" height="30">
                    <div class="d-block">
                        <h2 class="mb-0 fs-6">{{$interest->company->name}}</h2>
                        <p class="text-muted fs-8 mb-1">{{Str::words($interest->company->industry, 3, '...')}}</p>
                        @php $isFollowed = $interest->company->follows->contains('user_id', $authId); @endphp
                        <form action="{{route('follow.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$interest->company->company_id}}">
                            <button type="submit" class="btn btn-outline-primary text-dark text-center py-0 ps-2 rounded-pill">
                                @if($isFollowed)
                                    <i class="bi bi-check-lg fs-6 d-flex fst-normal fw-semibold gap-1 pt-1 pb-2 lh-1">Following</i>
                                @else
                                    <i class="bi bi-plus-lg fs-6 d-flex fst-normal fw-semibold gap-1 pt-1 pb-2 lh-1">Follow</i>
                                @endif
                            </button>
                        </form>
                    </div>
                </a>
            @endforeach
            </div>
        </div>
        @endif
    </div>
    <div class="mb-5" style="width: 300px;">
        <div class="px-4 py-4 bg-white shadow-sm rounded w-100">
            <h2 class="fs-7 mb-0">You might like</h2>
            <p class="fs-8 text-muted">Pages for you</p>
            @foreach($companies->take(2) as $index => $company)
            <div class="d-flex gap-3 {{$index > 0 ? 'border-top pt-3 mt-3' : ''}}">
                <img src="{{asset('IMG/uploads/logo/'. $company->logo)}}" width="50" height="50">
                <div class="d-block">
                    <h2 class="mb-0 fs-7">{{$company->name}}</h2>
                    <p class="fs-9 mb-0">{{$company->industry}}</p>
                    <p class="text-muted fs-9 mb-2">{{$company->follows->count()}} Followers</p>
                    @php $isFollowed = $company->follows->contains('user_id', $authId); @endphp
                        <form action="{{route('follow.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="company_id" value="{{$company->company_id}}">
                        <button type="submit" class="btn btn-outline-primary text-dark text-center py-0 ps-2 rounded-pill">
                            @if($isFollowed)
                                <i class="bi bi-check-lg fs-6 d-flex fst-normal fw-semibold gap-1 pt-1 pb-2 lh-1">Following</i>
                            @else
                                <i class="bi bi-plus-lg fs-6 d-flex fst-normal fw-semibold gap-1 pt-1 pb-2 lh-1">Follow</i>
                            @endif
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <div class="px-4 py-4 bg-white shadow-sm rounded w-100 mt-3">
            <h2 class="fs-7 mb-0">People you may know</h2>
            <p class="fs-8 text-muted">From your educations</p>
            @foreach($users->take(5) as $index => $user)
            <a href="{{route('user.page', $user->user_id)}}" class="d-flex gap-3 text-decoration-none text-dark {{$index > 0 ? 'border-top pt-3 mt-3' : ''}}">
                <img src="{{asset('IMG/uploads/profile/'. $user->profile_image)}}" class="rounded-circle bg-white d-block" style="width:50px; height:50px; object-fit: cover">
                <div class="d-block align-items-start">
                    <h2 class="mb-1 fs-7">{{$user->name}}</h2>
                    <p class="fs-9 mb-1 text-truncate-2 lh-1">{{$user->headline}}</p>
                    <form action="{{route('connect.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->user_id}}">
                        <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill"><i class="bi bi-person-plus-fill"></i> Connect</button>
                    </form>
                </div>
            </a>
            @endforeach
        </div>
        <div class="content-4 mt-3 w-100" style="top: 70px;">
            @foreach($ads as $ad)
                <a href="{{$ad->link}}"><img src="{{asset('IMG/uploads/ads/' . $ad->image_content)}}" class="rounded" width="300" height="410" style="object-fit:cover"></a>
            @endforeach
        </div>
    </div>
</div>


@endsection
