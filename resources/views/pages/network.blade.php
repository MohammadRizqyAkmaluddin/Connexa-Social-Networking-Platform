@extends('layouts.app')

@section('title', 'Network')

@section('content')
    <div class="container gap-3 d-flex">
        <div class="" style="width: 300px; height: 87vh; position:sticky; top:88px">
            <div class="bg-white shadow-sm rounded p-3">
                <ul class="nav nav-tabs d-block" id="myTab" role="tablist">
                    <li class="nav-item">
                        <button class="nav-link d-flex justify-content-between border-0 text-start w-100" data-bs-target="#followed" data-bs-toggle="modal">
                            <p class="mb-0">Page Followed</p>
                            <p class="mb-0 fw-normal fs-7">{{$followed->count()}}</p>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link d-flex justify-content-between border-0 text-start w-100" data-bs-target="#connection" data-bs-toggle="modal">
                            <p class="mb-0">Connections</p>
                            <p class="mb-0 fw-normal fs-7">{{$connection->count()}}</p>
                        </button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link d-flex justify-content-between border-0 text-start w-100" data-bs-target="#pending" data-bs-toggle="modal">
                            <p class="mb-0">Pending</p>
                            <p class="mb-0 fw-normal fs-7">{{$pending->count()}}</p>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="content-4 shadow-sm bg-white rounded mt-3">
                @foreach($ads as $ad)
                    <a href="{{$ad->link}}"><img src="{{asset('IMG/uploads/ads/' . $ad->image_content)}}" class="rounded" width="300" height="410" style="object-fit:cover"></a>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="followed" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
             <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-6 d-flex align-items-center" id="exampleModalToggleLabel3">Pages Followed<p class="mb-0 ms-1 fs-6">({{$followed->count()}})</p></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:500px">
                            @if($followed->count() > 0)
                            @foreach($followed as $follow)
                                <div class="d-flex mt-3 align-items-center border-bottom pb-3">
                                    <a href="{{route('company.show', $follow->company->company_id)}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <img src="{{asset('IMG/uploads/logo/' . $follow->company->logo)}}" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$follow->company->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$follow->company->tagline}}</p>
                                        </div>
                                    </a>
                                    <form action="{{route('follow.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{$follow->company->company_id}}">
                                        <button type="submit" class="btn follow-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill">
                                            Unfollow
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                            @else
                                <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                            @endif
                        </div>
                        <div class="modal-footer border-0">

                        </div>
                    </div>
             </div>
        </div>
        <div class="modal fade" id="connection" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
             <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-6 d-flex align-items-center" id="exampleModalToggleLabel3">Connections<p class="mb-0 ms-1 fs-6">({{$connection->count()}})</p></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:500px">
                            @if($connection->count() > 0)
                            @foreach($connection as $user)
                            @if($user->user->user_id != Auth::user()->user_id)
                                <div class="d-flex mt-3 align-items-center border-bottom pb-3">
                                    <a href="{{route('user.page', $user->user->user_id)}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <img src="{{asset('IMG/uploads/profile/' . $user->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$user->user->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->user->headline}}</p>
                                        </div>
                                    </a>
                                </div>
                            @elseif($user->user->user_id = Auth::user()->user_id)
                                <div class="d-flex mt-3 align-items-center border-bottom pb-3">
                                    <a href="#" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <img src="{{asset('IMG/uploads/profile/' . $user->target->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$user->target->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->target->headline}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endif
                            @endforeach
                            @else
                                <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                            @endif
                        </div>
                        <div class="modal-footer border-0">

                        </div>
                    </div>
             </div>
        </div>
        <div class="modal fade" id="pending" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
             <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-6 d-flex align-items-center" id="exampleModalToggleLabel3">Pending Request<p class="mb-0 ms-1 fs-6">({{$pending->count()}})</p></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:500px">
                            @if($pending->count() > 0)
                            @foreach($pending as $user)
                                <div class="d-flex mt-3 align-items-center border-bottom pb-3">
                                    <a href="{{route('user.page', $user->target->user_id)}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <img src="{{asset('IMG/uploads/profile/' . $user->target->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$user->target->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->target->headline}}</p>
                                        </div>
                                    </a>
                                    <form action="{{route('connect.cancel')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{Auth::user()->user_id}}">
                                        <input type="hidden" name="user_target" value="{{$user->target->user_id}}">
                                        <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-2 px-5 ms-7 rounded-pill d-flex gap-2"><i class="bi bi-clock-history"></i> Pending</button>
                                    </form>
                                </div>
                            @endforeach
                            @else
                                <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                            @endif
                        </div>
                        <div class="modal-footer border-0">

                        </div>
                    </div>
             </div>
        </div>

        <div class="d-block align-items-center" style="width: 645px; margin-top:88px; min-height: 87vh">
            <div class="bg-white shadow-sm mx-auto p-3 rounded">
                <div class="d-flex mb-2 border-bottom justify-content-between">
                    <h2 class="fs-8 d-flex">Invitations <p class="mb-0 ms-1">({{$invitation->count()}})</p></h2>
                    <button class="btn d-flex text-dark fw-semibold px-4 py-0" data-bs-target="#invitation" data-bs-toggle="modal"
                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                        <h2 class="fs-7 mb-0 text-muted">Show all</h2>
                    </button>
                </div>
                @if($invitation->count() > 0)
                    @foreach($invitation->take(2) as $invite)
                        <div class="d-flex mt-3 align-items-center">
                            <a href="{{route('user.page', $invite->user->user_id)}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                <img src="{{asset('IMG/uploads/profile/' . $invite->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                <div class="d-block">
                                    <h2 class="fs-7 mb-1">{{$invite->user->name}}</h2>
                                    <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$invite->user->headline}}</p>
                                </div>
                            </a>
                            <form action="{{route('connect.update')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$invite->user->user_id}}">
                                <input type="hidden" name="user_target" value="{{Auth::user()->user_id}}">
                                <button type="submit" class="btn follow-btn fs-9 text-primary border-primary py-2 px-3 rounded-pill">Accept</button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                @endif
            </div>
            <div class="modal fade" id="invitation" aria-hidden="true" aria-labelledby="exampleModalToggleLabel3" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title fs-5 d-flex align-items-center" id="exampleModalToggleLabel3">Invitations <p class="mb-0 ms-1 fs-6">({{$invitation->count()}})</p></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:500px">
                            @if($invitation->count() > 0)
                            @foreach($invitation as $invite)
                                <div class="d-flex mt-3 align-items-center border-bottom pb-3">
                                    <a href="{{route('user.page', $invite->user->user_id)}}" class="d-flex align-items-center gap-2 text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <img src="{{asset('IMG/uploads/profile/' . $invite->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$invite->user->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$invite->user->headline}}</p>
                                        </div>
                                    </a>
                                    <form action="{{route('connect.update')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$invite->user->user_id}}">
                                        <input type="hidden" name="user_target" value="{{Auth::user()->user_id}}">
                                        <button type="submit" class="btn follow-btn fs-9 text-primary border-primary py-2 px-3 rounded-pill">Accept</button>
                                    </form>
                                </div>
                            @endforeach
                            @else
                                <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                            @endif
                        </div>
                        <div class="modal-footer border-0">

                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 bg-white shadow-sm mx-auto p-3 rounded">
                <h2 class="fs-8 mb-3">Companies Suggestions</h2>
                <div class="row g-3" id="experienceContainer" style="width: 630px;">
                    @foreach($companies as $index => $company)
                        @php $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id); @endphp
                        <div class="col-6 col-md-4 experience-company"
                            style="{{ $index >= 9 ? 'display:none;' : '' }}">
                            <a href="{{route('company.show', $company->company_id)}}" class="rounded shadow-hover bg-white border d-block text-decoration-none" style="height:100%; width:200px;">
                                <div class="d-block pb-3 text-center">
                                    <img src="{{ asset('IMG/uploads/cover/' . $company->cover_image) }}"
                                        class="rounded-top" width="100%" style="object-fit: cover;">
                                    <div class="d-block text-center mx-2">
                                        <img src="{{ asset('IMG/uploads/logo/' . $company->logo) }}"
                                            class="p-1 bg-white"
                                            style="width:80px; height:80px; margin-top:-40px; object-fit: cover;">
                                        <div class="d-block mx-2">
                                            <h2 class="fs-8 mt-3 fw-semibold text-dark mb-1">
                                                {{ Str::limit($company->name, 20) }}
                                            </h2>
                                            <p class="fs-13 lh-1 text-truncate-2 text-muted" style="height: 20px">
                                                {{ $company->tagline }}
                                            </p>
                                        </div>
                                    </div>
                                    <p class="text-muted fs-9">{{$company->follows->count()}} Followers</p>
                                    <div class="align-items-center text-center px-auto">
                                        <form action="{{route('follow.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                                            <button type="submit" class="btn follow-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill">
                                                @if($isFollowed)
                                                    Unfollow
                                                @else
                                                    Follow
                                                @endif
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($company->count() > 9)
                <div class="text-center mt-2">
                    <button id="viewMoreCompany" class="btn w-100 fs-9 border py-0 text-dark rounded-pill px-4">
                        View more results
                    </button>
                </div>
                @endif
            </div>
            <div class="mt-3 bg-white shadow-sm mx-auto p-3 rounded" style="margin-bottom:28px">
                <h2 class="fs-8 mb-3">People Suggestions</h2>
                <div class="row g-3" id="experienceContainer" style="width: 630px;">
                    @foreach($users as $index => $user)
                        <div class="col-6 col-md-4 experience-people"
                            style="{{ $index >= 9 ? 'display:none;' : '' }}">
                            <a href="{{route('user.page', $user->user_id)}}" class="rounded bg-white shadow-hover border d-block text-decoration-none" style="height:100%; width:200px;">
                                <div class="d-block pb-3">
                                    <img src="{{ asset('IMG/cover/' . $user->cover_image) }}"
                                        class="rounded-top" width="100%" style="object-fit: cover;">
                                    <div class="d-block text-center mx-2">
                                        <img src="{{ asset('IMG/uploads/profile/' . $user->profile_image) }}"
                                            class="rounded-circle"
                                            style="width:60px; height:60px; margin-top:-40px; object-fit: cover;">
                                        <div class="d-block mx-2">
                                            <h2 class="fs-8 mt-3 fw-semibold text-dark mb-1">
                                                {{ Str::limit($user->name, 20) }}
                                            </h2>
                                            <p class="fs-13 lh-1 text-truncate-2 text-muted">
                                                {{ $user->headline }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="align-items-center text-center px-auto">
                                    <form action="{{route('connect.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                        @if($isRequested)
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill"><i class="bi bi-clock-history"></i> Pending</button>
                                        @else
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill"><i class="bi bi-person-plus-fill"></i> Connect</button>
                                        @endif
                                    </form>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                @if($user->count() > 9)
                <div class="text-center mt-2">
                    <button id="viewMorePeople" class="btn w-100 fs-9 border py-0 text-dark rounded-pill px-4">
                        View more results
                    </button>
                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const items = document.querySelectorAll(".experience-people");
        const viewMoreBtn = document.getElementById("viewMorePeople");
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
        document.addEventListener("DOMContentLoaded", function() {
        const items = document.querySelectorAll(".experience-company");
        const viewMoreBtn = document.getElementById("viewMoreCompany");
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
