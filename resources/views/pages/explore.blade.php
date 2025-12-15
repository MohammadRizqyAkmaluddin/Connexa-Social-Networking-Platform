@extends('layouts.app')

@section('title', 'Explore')

@section('content')
<main>
    <div class="container d-flex mt-11 gap-3">

        <div class="d-block" style="width: 600px">

            @if($users->count())
                <div class="bg-white rounded pt-3 border">
                    <h2 class="d-flex justify-content-between fs-5 mb-4 align-items-center px-4 ls-1">People <p class="mb-0 fs-8 mt-1 text-lightGrey">Total {{$users->count()}} result for "{{$q}}"</p></h2>

                    @foreach($users->take(4) as $index => $user)
                        <a href="{{route('user.page', $user->user_id)}}"
                            class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                            <div class="d-flex gap-3 align-items-start w-100">
                                <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                <div class="d-block w-100">
                                    <h2 class="fs-6 mb-1">{{$user->name}}</h2>
                                    <p class="fs-8 mb-0 text-truncate-1">{{$user->headline}}</p>
                                    <p class="fs-8 mb-1 text-muted">{{$user->city}}</p>
                                    @if($user->mutual_count > 0)
                                        <div class="d-flex gap-1 align-items-center">
                                            <i class="bi bi-people-fill fs-8 text-mutedbold"></i>
                                            <div class="d-flex gap-1">
                                            @foreach($user->mutual_connections->take(3) as $mutual)
                                                <p class="fs-10 mb-0 text-mutedbold fw-semibold">
                                                    {{ collect(explode(' ', trim($mutual->name)))->first() }},
                                                </p>
                                            @endforeach
                                            </div>
                                            <p class="fw-light fs-10 mb-0">and</p>
                                            <p class=" fs-10 mb-0 text-mutedbold fw-semibold">{{$user->mutual_count}} other mutual connections</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @php
                                $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                    ->where('user_target', $user->user_id)
                                    ->where('status', 'Pending')
                                    ->exists();

                                $isConnected = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                    ->where('user_target', $user->user_id)
                                    ->where('status', 'Success')
                                    ->exists();
                            @endphp

                            @if($isRequested)
                            <form action="{{route('connect.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Pending</button>
                            </form>
                            @elseif($isConnected)
                                <button type="button" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill" data-bs-target="#message{{$user->user_id}}" data-bs-toggle="modal">Message</button>
                            @else
                            <form action="{{route('connect.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Connect</button>
                            </form>
                            @endif

                        </a>
                    @endforeach
                    @if($users->count() < 4)
                        @php
                            $limit = 0;
                            if ($users->count() == 1) {
                                $limit = 3;
                            } elseif ($users->count() == 2) {
                                $limit = 2;
                            } elseif ($users->count() == 3) {
                                $limit = 1;
                            }
                        @endphp
                        <h2 class="fs-5 mb-4 align-items-center px-4 ls-1 border-top pt-3">More Suggestion</h2>
                        @foreach($otherUsers->take($limit) as $index => $user)
                            <a href="{{route('user.page', $user->user_id)}}"
                                class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                                onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                <div class="d-flex gap-3 align-items-start w-100">
                                    <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                    <div class="d-block w-100">
                                        <h2 class="fs-6 mb-1">{{$user->name}}</h2>
                                        <p class="fs-8 mb-0 text-truncate-1">{{$user->headline}}</p>
                                        <p class="fs-8 mb-1 text-muted">{{$user->city}}</p>
                                        @if($user->mutual_count > 0)
                                            <div class="d-flex gap-1 align-items-center">
                                                <i class="bi bi-people-fill fs-8 text-mutedbold"></i>
                                                <div class="d-flex gap-1">
                                                @foreach($user->mutual_connections->take(3) as $mutual)
                                                    <p class="fs-10 mb-0 text-mutedbold fw-semibold">
                                                        {{ collect(explode(' ', trim($mutual->name)))->first() }},
                                                    </p>
                                                @endforeach
                                                </div>
                                                <p class="fw-light fs-10 mb-0">and</p>
                                                <p class=" fs-10 mb-0 text-mutedbold fw-semibold">{{$user->mutual_count}} other mutual connections</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @php
                                    $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                        ->where('user_target', $user->user_id)
                                        ->where('status', 'Pending')
                                        ->exists();

                                    $isConnected = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                        ->where('user_target', $user->user_id)
                                        ->where('status', 'Success')
                                        ->exists();
                                @endphp

                                @if($isRequested)
                                <form action="{{route('connect.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                    <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Pending</button>
                                </form>
                                @elseif($isConnected)
                                    <button type="button" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill" data-bs-target="#message{{$user->user_id}}" data-bs-toggle="modal">Message</button>
                                @else
                                <form action="{{route('connect.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                    <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Connect</button>
                                </form>
                                @endif
                            </a>
                        @endforeach
                    @endif

                    <button type="button" class="btn hover-btn w-100 border-top mt-3 py-3 fs-7 pt-3 text-mutedbold fw-semibold" data-bs-target="#peoples" data-bs-toggle="modal">See all people result</button>
                    @foreach($users as $index => $user)
                        <div class="modal fade" id="message{{$user->user_id}}" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                            <div class="modal-dialog modal-md modal-dialog-start">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="modal-title d-flex align-items-center gap-2 text-start text-decoration-none text-dark w-100"
                                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                            <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block">
                                                <h2 class="fs-7 mb-1">{{$user->name}}</h2>
                                                <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->headline}}</p>
                                            </div>
                                        </a>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body scroll-area" style="overflow-y: auto; height:auto">
                                        <form action="{{route('message.store')}}" method="POST" onsubmit="copyDescription(this)">
                                            @csrf
                                            <input type="hidden" name="category" value="Message">
                                            <input type="hidden" name="title" value="&lt;strong&gt;{{ Auth::user()->name }}&lt;/strong&gt; sent you a message">
                                            <input type="hidden" name="description" class="description-input">
                                            <input type="hidden" name="sender_id" value="{{Auth::user()->user_id}}">
                                            <input type="hidden" name="receiver_id" value="{{$user->user_id}}">
                                            <input type="hidden" name="status" value="New">
                                            <input type="hidden" name="type" value="Connection">
                                            <div class="chat-input bg-white p-3 align-items-end justify-content-end">
                                                <textarea type="text" name="message" class="message-textarea form-control fs-7 scroll-area chat-style" placeholder="Type a message..." ></textarea>
                                                <button type="submit" class="border-0 px-4 mt-2 py-1 bg-primary text-light rounded-pill align-items-end text-end">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="modal fade" id="peoples" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-start">
                        <div class="modal-content">
                            <div class="modal-header">
                                @if($users->count() >= 4)
                                <h2 class="modal-title fs-5 ps-4 ls-1">People <p class="mb-0 fs-7 text-lightGrey">Total {{$users->count()}} result for "{{$q}}"</p></h2>
                                @elseif($users->count() < 4)
                                <h2 class="modal-title fs-5 ps-4 ls-1">More Suggestion<p class="mb-0 fs-7 text-lightGrey"></h2>
                                @endif
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body scroll-area" style="overflow-y: auto; height:750px">
                                @if($users->count() >= 4)
                                @foreach($users as $index => $user)
                                    <a href="{{route('user.page', $user->user_id)}}"
                                        class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <div class="d-flex gap-3 align-items-start w-100">
                                            <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block w-100">
                                                <h2 class="fs-6 mb-1">{{$user->name}}</h2>
                                                <p class="fs-8 mb-0 text-truncate-1">{{$user->headline}}</p>
                                                <p class="fs-8 mb-1 text-muted">{{$user->city}}</p>
                                                @if($user->mutual_count > 0)
                                                    <div class="d-flex gap-1 align-items-center">
                                                        <i class="bi bi-people-fill fs-8 text-mutedbold"></i>
                                                        <div class="d-flex gap-1">
                                                        @foreach($user->mutual_connections->take(3) as $mutual)
                                                            <p class="fs-10 mb-0 text-mutedbold fw-semibold">
                                                                {{ collect(explode(' ', trim($mutual->name)))->first() }},
                                                            </p>
                                                        @endforeach
                                                        </div>
                                                        <p class="fw-light fs-10 mb-0">and</p>
                                                        <p class=" fs-10 mb-0 text-mutedbold fw-semibold">{{$user->mutual_count}} other mutual connections</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                                ->where('user_target', $user->user_id)
                                                ->where('status', 'Pending')
                                                ->exists();

                                            $isConnected = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                                ->where('user_target', $user->user_id)
                                                ->where('status', 'Success')
                                                ->exists();
                                        @endphp

                                        @if($isRequested)
                                        <form action="{{route('connect.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Pending</button>
                                        </form>
                                        @elseif($isConnected)
                                            <button type="button" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill" data-bs-target="#message{{$user->user_id}}" data-bs-toggle="modal">Message</button>
                                        @else
                                        <form action="{{route('connect.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Connect</button>
                                        </form>
                                        @endif
                                    </a>
                                @endforeach
                                @elseif($users->count() < 4)
                                @foreach($otherUsers as $index => $user)
                                    <a href="{{route('user.page', $user->user_id)}}"
                                        class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                        <div class="d-flex gap-3 align-items-start w-100">
                                            <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block w-100">
                                                <h2 class="fs-6 mb-1">{{$user->name}}</h2>
                                                <p class="fs-8 mb-0 text-truncate-1">{{$user->headline}}</p>
                                                <p class="fs-8 mb-1 text-muted">{{$user->city}}</p>
                                                @if($user->mutual_count > 0)
                                                    <div class="d-flex gap-1 align-items-center">
                                                        <i class="bi bi-people-fill fs-8 text-mutedbold"></i>
                                                        <div class="d-flex gap-1">
                                                        @foreach($user->mutual_connections->take(3) as $mutual)
                                                            <p class="fs-10 mb-0 text-mutedbold fw-semibold">
                                                                {{ collect(explode(' ', trim($mutual->name)))->first() }},
                                                            </p>
                                                        @endforeach
                                                        </div>
                                                        <p class="fw-light fs-10 mb-0">and</p>
                                                        <p class=" fs-10 mb-0 text-mutedbold fw-semibold">{{$user->mutual_count}} other mutual connections</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                                ->where('user_target', $user->user_id)
                                                ->where('status', 'Pending')
                                                ->exists();

                                            $isConnected = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                                ->where('user_target', $user->user_id)
                                                ->where('status', 'Success')
                                                ->exists();
                                        @endphp

                                        @if($isRequested)
                                        <form action="{{route('connect.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Pending</button>
                                        </form>
                                        @elseif($isConnected)
                                            <button type="button" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill" data-bs-target="#message{{$user->user_id}}" data-bs-toggle="modal">Message</button>
                                        @else
                                        <form action="{{route('connect.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{$user->user_id}}">
                                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">Connect</button>
                                        </form>
                                        @endif
                                    </a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($companies->count())
            <div class="bg-white rounded pt-3 border {{$users->count() > 1 ? 'mt-3' : ''}}">
                <h2 class="d-flex justify-content-between fs-5 mb-4 align-items-center px-4 ls-1">Pages <p class="mb-0 fs-8 mt-1 text-lightGrey">Total {{$companies->count()}} result for "{{$q}}"</p></h2>
                @foreach($companies->take(4) as $index => $company)
                    <a href="{{route('company.show', $company->company_id)}}"
                        class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                        onmouseout="this.querySelector('h2').style.textDecoration='none'">
                        <div class="d-flex gap-3 align-items-start w-100">
                            <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" style="width: 50px; height:50px; object-fit:cover;">
                            <div class="d-block w-100">
                                <h2 class="fs-6 mb-1">{{$company->name}}</h2>
                                <p class="fs-8 mb-1 text-muted">{{$company->industry}}</p>
                                <p class="fs-8 mb-0 text-truncate-1">{{$company->tagline}}</p>
                                <p class="fs-8 mb-1 text-muted">{{$company->city}}</p>
                            </div>
                        </div>
                        @php
                            $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id);
                        @endphp

                        <form action="{{route('follow.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="company_id" value="{{$company->company_id}}">
                            <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">
                                @if($isFollowed)
                                    Unfollow
                                @else
                                    Follow
                                @endif
                            </button>
                        </form>
                    </a>
                @endforeach

                @if($companies->count() < 4)
                    @php
                        $limitCompany = 0;
                        if ($companies->count() == 1) {
                            $limitCompany = 3;
                        } elseif ($companies->count() == 2) {
                            $limitCompany = 2;
                        } elseif ($companies->count() == 3) {
                            $limitCompany = 1;
                        }
                    @endphp
                    <h2 class="fs-5 mb-4 align-items-center px-4 ls-1 border-top pt-3">More Suggestion</h2>
                    @foreach($otherCompanies->take($limitCompany) as $index => $company)
                        <a href="{{route('company.show', $company->company_id)}}"
                            class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                            onmouseout="this.querySelector('h2').style.textDecoration='none'">
                            <div class="d-flex gap-3 align-items-start w-100">
                                <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" style="width: 50px; height:50px; object-fit:cover;">
                                <div class="d-block w-100">
                                    <h2 class="fs-6 mb-1">{{$company->name}}</h2>
                                    <p class="fs-8 mb-1 text-muted">{{$company->industry}}</p>
                                    <p class="fs-8 mb-0 text-truncate-1">{{$company->tagline}}</p>
                                    <p class="fs-8 mb-1 text-muted">{{$company->city}}</p>
                                </div>
                            </div>
                            @php
                                $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id);
                            @endphp

                            <form action="{{route('follow.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="company_id" value="{{$company->company_id}}">
                                <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">
                                    @if($isFollowed)
                                        Unfollow
                                    @else
                                        Follow
                                    @endif
                                </button>
                            </form>
                        </a>
                    @endforeach
                @endif
                <button type="button" class="btn hover-btn w-100 border-top mt-3 py-3 fs-7 pt-3 text-mutedbold fw-semibold" data-bs-target="#companies" data-bs-toggle="modal">See all page result</button>
            </div>
            <div class="modal fade" id="companies" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                <div class="modal-dialog modal-lg modal-dialog-start">
                    <div class="modal-content">
                        <div class="modal-header">
                            @if($companies->count() >= 4)
                            <h2 class="modal-title fs-5 ps-4 ls-1">Pages <p class="mb-0 fs-7 text-lightGrey">Total {{$companies->count()}} result for "{{$q}}"</p></h2>
                            @elseif($companies->count() < 4)
                            <h2 class="modal-title fs-5 ps-4 ls-1">More Suggestion<p class="mb-0 fs-7 text-lightGrey"></h2>
                            @endif
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body scroll-area" style="overflow-y: auto; height:750px">
                            @if($companies->count() >= 4)
                            @foreach($companies as $index => $company)
                                <a href="{{route('company.show', $company->company_id)}}"
                                    class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                    <div class="d-flex gap-3 align-items-start w-100">
                                        <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block w-100">
                                            <h2 class="fs-6 mb-1">{{$company->name}}</h2>
                                            <p class="fs-8 mb-1 text-muted">{{$company->industry}}</p>
                                            <p class="fs-8 mb-0 text-truncate-1">{{$company->tagline}}</p>
                                            <p class="fs-8 mb-1 text-muted">{{$company->city}}</p>
                                        </div>
                                    </div>
                                    @php
                                        $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id);
                                    @endphp

                                    <form action="{{route('follow.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{$company->company_id}}">
                                        <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">
                                            @if($isFollowed)
                                                Unfollow
                                            @else
                                                Follow
                                            @endif
                                        </button>
                                    </form>
                                </a>
                            @endforeach
                            @elseif($companies->count() < 4)
                            @foreach($otherCompanies as $index => $company)
                                <a href="{{route('company.show', $company->company_id)}}"
                                    class="d-flex align-items-center py-2 px-4 text-decoration-none text-dark {{$index > 0 ? 'border-top' : ''}}"
                                    onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                    onmouseout="this.querySelector('h2').style.textDecoration='none'">
                                    <div class="d-flex gap-3 align-items-start w-100">
                                        <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block w-100">
                                            <h2 class="fs-6 mb-1">{{$company->name}}</h2>
                                            <p class="fs-8 mb-1 text-muted">{{$company->industry}}</p>
                                            <p class="fs-8 mb-0 text-truncate-1">{{$company->headline}}</p>
                                            <p class="fs-8 mb-1 text-muted">{{$company->city}}</p>
                                        </div>
                                    </div>
                                    @php
                                        $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id);
                                    @endphp

                                    <form action="{{route('follow.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="company_id" value="{{$company->company_id}}">
                                        <button type="submit" class="btn connect-btn fs-9 text-primary border-primary fw-semibold px-4 ms-2 rounded-pill">
                                            @if($isFollowed)
                                                Unfollow
                                            @else
                                                Follow
                                            @endif
                                        </button>
                                    </form>
                                </a>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if($posts->count())
                @foreach($posts as $post)
                <div class="shadow-sm bg-white rounded mt-3" style="height: auto; ">
                    <div class="d-flex justify-content-center gap-2 border-bottom">
                        <div class="fs-11 text-center text-muted p-1"> {{$post->post_type}} Content</div>
                    </div>
                    <div class="d-block px-3">
                        <div class="d-flex mt-2 gap-3">
                            @if($post->user)
                            <img src="{{asset('IMG/uploads/profile/' . $post->user->profile_image)}}" width="40" height="40" class="mt-1 b-white rounded-circle">
                            <div>
                                <div class="fs-6 fw-semi">{{$post->user->name}}</div>
                                <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->user->headline}}</div>
                                <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                            </div>
                            @elseif($post->company)
                                <img src="{{asset('IMG/uploads/logo/' . $post->company->logo)}}" width="40" height="40" class="mt-1 b-white">
                                <div>
                                    <div class="fs-6 fw-semi">{{$post->company->name}}</div>
                                    <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->company->industry}}</div>
                                    <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                                </div>
                            @endif
                        </div>
                        <div class="d-flex align-items-end gap-0">
                            <div class="mt-3 fs-8 post-description truncated" id="desc-{{ $post->post_id }}">{{ $post->description }}</div>
                            @if(str_word_count($post->description) > 30)
                                <button class="btn btn-link p-0 text-decoration-none fs-8 text-muted toggle-btn" data-target="desc-{{ $post->post_id }}">more</button>
                            @endif
                        </div>
                    </div>

                    <div class="post-wrapper mt-2">
                        <div class="modalTrigger" data-bs-toggle="modal" data-bs-target="#postModal{{ $post->post_id }}">
                            @php $count = $post->postImages->count(); @endphp
                            @if ($count == 1)
                                <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="single-img2" alt="post image">
                            @elseif ($count == 2)
                                <div class="d-flex gap-1 mt-1">
                                    @foreach ($post->postImages as $image)
                                        <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="double-img2" alt="post image">
                                    @endforeach
                                </div>
                            @elseif ($count == 3)
                                <div class="three-img-grid">
                                    <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="main-img">
                                    <div class="d-flex gap-1 mt-1">
                                        @foreach ($post->postImages->slice(1) as $image)
                                            <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="half-img">
                                        @endforeach
                                    </div>
                                </div>
                            @elseif ($count == 4)
                                <div class="four-img-grid">
                                    <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="main-img">
                                    <div class="d-flex gap-1 mt-1">
                                        @foreach ($post->postImages->slice(1) as $image)
                                            <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="third-img">
                                        @endforeach
                                    </div>
                                </div>
                            @elseif ($count > 4)
                                <div class="four-img-grid">
                                    <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="main-img">
                                    <div class="bottom-flex gap-1 mt-1">
                                        <div class="flex-item">
                                            <img src="{{ asset('IMG/uploads/post/' . $post->postImages[1]->image) }}" class="flex-img">
                                        </div>
                                        <div class="flex-item">
                                            <img src="{{ asset('IMG/uploads/post/' . $post->postImages[2]->image) }}" class="flex-img">
                                        </div>
                                        <div class="flex-item">
                                            <img src="{{ asset('IMG/uploads/post/' . $post->postImages[3]->image) }}" class="flex-img">
                                            <div class="overlay">+{{ $count - 4 }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="modal align-items-center justify-content-center" tabindex="-1" id="postModal{{ $post->post_id }}">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable scroll-area" style="max-width: 1000px;">
                                <div class="modal-content">
                                <div class="modal-body d-flex gap-3 p-0" style="overflow-y: auto;">
                                    @if($count > 1)
                                        <div id="carousel{{ $post->post_id }}" class="carousel carousel-post slide bg-dark flex-shrink-0 border-end" data-bs-ride="carousel" >
                                            <div class="carousel-inner">
                                                @foreach ($post->postImages as $key => $image)
                                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                        <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="d-block" alt="...">
                                                    </div>
                                                @endforeach
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel{{ $post->post_id }}" data-bs-slide="prev">
                                                <i class="bi bi-caret-left-fill fs-3 bg-black rounded-circle px-2"></i>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carousel{{ $post->post_id }}" data-bs-slide="next">
                                                <i class="bi bi-caret-right-fill fs-3 bg-black rounded-circle px-2"></i>
                                            </button>
                                        </div>
                                    @else
                                        @foreach ($post->postImages as $key => $image)
                                        <div class="one-image bg-dark border-end" style="width: 900px">
                                            <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="d-block bg-dark">
                                        </div>
                                        @endforeach
                                    @endif
                                    <div class="d-block pe-3 w-50 flex-grow-1 overflow-auto" style="max-height: 600px">
                                        <div class="d-flex pt-3 gap-3 post-modal-profile bg-white pb-3 w-100">
                                            @if($post->user)
                                                <img src="{{asset('IMG/uploads/profile/' . $post->user->profile_image)}}" width="50" height="50" class="mt-1 b-white rounded-circle">
                                                <div>
                                                    <div class="fs-6 fw-semi">{{$post->user->name}}</div>
                                                    <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->user->headline}}</div>
                                                    <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                                                </div>
                                            @elseif($post->company)
                                                <img src="{{asset('IMG/uploads/logo/' . $post->company->logo)}}" width="50" height="50" class="mt-1 b-white">
                                                <div>
                                                    <div class="fs-6 fw-semi">{{$post->company->name}}</div>
                                                    <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->company->industry}}</div>
                                                    <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="d-block gap-0 ms-1">
                                            <div class="mt-3 fs-8 post-description" id="desc-{{ $post->post_id }}">{{ $post->description }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex justify-content-between align-items-center text-center px-3 gap-3 fw-bold">
                                                <i class="bi bi-hand-thumbs-up fst-normal fs-5"></i>
                                                <i class="bi bi-send fst-normal fs-5"></i>
                                            </div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                @foreach ($post->likes->take(3) as $index=>$like)
                                                    @if ($like->user)
                                                        <img src="{{ asset('IMG/uploads/profile/' . $like->user->profile_image) }}"
                                                            alt="{{ $like->user->name }}"
                                                            class="rounded-circle border bg-white border-white mb-1" width="20" height="20"
                                                            style="padding:1px ;margin-left: {{ $index > 0 ? '-10px' : '0' }}; z-index: {{ 10 - $index }};">
                                                    @endif
                                                @endforeach
                                                <p class="fs-8 ms-2 me-2 d-flex align-items-end mt-3 text-muted">{{ $post->likes->count() }} likes</p>
                                                <p class="fs-8 mt-3 ps-2 text-muted border-start">{{$post->comments->count()}} Comments</p>
                                            </div>
                                        </div>

                                        <form action="{{route ('comment.store')}}" method="POST" class="bg-white d-flex align-items-start gap-2 pb-2">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{$post->post_id}}">
                                            <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}"
                                                alt="" width="35" height="35" class="bg-white rounded-circle mt-1">

                                            <div class="flex-grow-1 position-relative">
                                                <textarea
                                                    class="form-control comment-textarea"
                                                    name="comment"
                                                    placeholder="Write a comment..."
                                                    rows="1"
                                                    style="overflow:hidden; resize:none; min-height:30px;"></textarea>
                                                <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3 comment-btn mt-5">Comment</button>
                                            </div>

                                        </form>
                                        <div class="comments pt-2">
                                            @foreach($post->comments as $comment)
                                                <div class="d-flex gap-3 bg-white pb-1 w-100">
                                                    <img src="{{asset('IMG/uploads/profile/' . $comment->user->profile_image)}}" width="30" height="30" class="mt-1 b-white rounded-circle">
                                                    <div class="">
                                                        <div class="fs-9 fw-semi">{{$comment->user->name}}</div>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="fs-13 text-muted text-truncate-short">{{$comment->user->headline}}</div>
                                                        </div>
                                                        <div class="fs-13 text-muted">{{$comment->created_at->diffForHumans()}}</div>
                                                        <p class="fs-9 mt-1 border-start ps-2">{{$comment->comment}}</p>
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
                    <div class="d-flex justify-content-between align-items-center px-3">
                        <div class="d-flex justify-content-between align-items-center text-center gap-4 fw-bold">
                            @php
                                $isLiked = $post->likes->contains('user_id', Auth::user()->user_id);
                            @endphp
                            <form action="{{route('like.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$post->post_id}}">
                                <button class="bg-white border-0" type="submit">
                                    @if($isLiked)
                                        <i class="bi bi-heart-fill fs-5 text-like"></i>
                                    @else
                                        <i class="bi bi-heart text-muted fs-5"></i>
                                    @endif
                                </button>
                            </form>
                            <button class="bg-white border-0"><i class="bi bi-chat-left-text text-muted toggle-comment" data-post-id="{{$post->post_id}}"></i></button>
                            <button class="bg-white border-0"><i class="bi bi-send fst-normal text-muted fs-5"></i></button>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            @foreach ($post->likes->take(3) as $index=>$like)
                                @if ($like->user)
                                    <img src="{{ asset('IMG/uploads/profile/' . $like->user->profile_image) }}"
                                        alt="{{ $like->user->name }}"
                                        class="rounded-circle border bg-white border-white mb-1" width="20" height="20"
                                        style="padding:1px ;margin-left: {{ $index > 0 ? '-10px' : '0' }}; z-index: {{ 10 - $index }};">
                                @endif
                            @endforeach
                            <p class="fs-8 ms-2 me-2 d-flex align-items-end mt-3 text-muted">{{ $post->likes->count() }} likes</p>
                            <p class="fs-8 mt-3 ps-2 text-muted border-start">{{$post->comments->count()}} Comments</p>
                        </div>
                    </div>
                    <div class="px-3 show-comment">
                        <form action="{{route ('comment.store')}}" method="POST" class="bg-white d-flex align-items-start gap-2 pb-2">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->post_id}}">
                            <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}"
                                alt="" width="35" height="35" class="bg-white rounded-circle mt-1">

                            <div class="flex-grow-1 position-relative">
                                <textarea
                                    class="form-control comment-textarea"
                                    name="comment"
                                    placeholder="Write a comment..."
                                    rows="1"
                                    style="overflow:hidden; resize:none; min-height:30px;"></textarea>
                                <button type="submit" class="btn btn-primary btn-sm rounded-pill px-3 comment-btn mt-5">Comment</button>
                            </div>

                        </form>
                        <div class="comments pt-2">
                            @foreach($post->comments as $comment)
                                <div class="d-flex gap-3 bg-white pb-1 w-100">
                                    <img src="{{asset('IMG/uploads/profile/' . $comment->user->profile_image)}}" width="30" height="30" class="mt-1 b-white rounded-circle">
                                    <div class="">
                                        <div class="fs-9 fw-semi">{{$comment->user->name}}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="fs-13 text-muted text-truncate-short">{{$comment->user->headline}}</div>
                                        </div>
                                        <div class="fs-13 text-muted">{{$comment->created_at->diffForHumans()}}</div>
                                        <p class="fs-9 mt-1 border-start ps-2">{{$comment->comment}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        </div>


        <div class="content-4 shadow-sm bg-white rounded">
            @foreach($ads as $ad)
                <a href="{{$ad->link}}"><img src="{{asset('IMG/uploads/ads/' . $ad->image_content)}}" class="rounded" width="270" height="400" style="object-fit:cover"></a>
            @endforeach
        </div>
    </div>
</main>

<script>
    function copyDescription(form) {
        const textarea = form.querySelector('.message-textarea');
        const description = form.querySelector('.description-input');

        if (textarea && description) {
            description.value = textarea.value.trim();
        }
    }
</script>

@endsection
