@extends('layouts.app')

@section('title', 'Feeds')

@section('content')
    <div class="d-lg-flex mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
        <div class="content1"
            style="width: 280px; height: 89.5vh;
                    position: sticky; top:75.5px">
            <div class="bg-white shadow-sm w-100 rounded-top pb-3 mb-3">
                <img src="{{asset('IMG/cover/' . Auth::user()->cover_image)}}" class="rounded-top w-100">
                <div class="px-4 d-block">
                    <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}" width="60" class="rounded-circle bg-white d-block" style="margin-top:-40px">
                    <h2 class="fs-6 mt-3 fw-semi">{{Auth::user()->name}}</h2>
                    <p class="fs-8 lh-1">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 16, ' ...') }}</p>
                    <p class="fs-8 lh-1 text-muted">{{Auth::user()->city}}, {{Auth::user()->country}}</p>
                    @php
                        $edu = $user->userEducations->sortByDesc('start_date')->first();
                    @endphp
                    <div class="d-flex text-center align-items-center mx-auto my-auto">
                        <img src="{{ asset('IMG/uploads/logo/' . $edu->company->logo) }}"
                            alt="Logo" width="50" height="50"
                            class="rounded me-3" style="object-fit: cover;">
                        <h2 class="fs-9 mt-2">{{$edu->company->name}}</h2>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-sm w-100 rounded p-2 mb-3">
                <div class="d-flex justify-content-between">
                    <h2 class="fs-8">Analytics</h2>
                    <a href="#" class="text-decoration-none text-muted fs-10">View all</a>
                </div>
                <div class="d-flex justify-content-between">
                <div class="d-block">
                    <h2 class="fs-10 text-muted">Profile Viewers</h2>
                    <h2 class="fs-10 text-muted">Connection</h2>
                </div>
                <div class="d-block text-lightPrimary">
                    <h2 class="fs-10">115</h2>
                    <h2 class="fs-10">{{$connection->count()}}</h2>
                </div>
                </div>
            </div>
            <div class="bg-white shadow-sm w-100 rounded p-3 mb-3">
                <a class="text-decoration-none text-dark" href="#"><h2 class="fs-10"><i class="bi bi-globe"></i> Community</h2></a>
                <a class="text-decoration-none text-dark" href="#"><h2 class="fs-10"><i class="bi bi-postcard"></i> Post Management</h2></a>
            </div>
            <div class="bg-white shadow-sm w-100 rounded p-2 mb-3">
                <div class="d-flex justify-content-between">
                    <h2 class="fs-8">Conversations</h2>
                    <a href="#" class="text-decoration-none text-muted fs-10">View all</a>
                </div>
                @if($chats->count() > 0)
                @foreach ($chats->take(4) as $chat)
                    @php
                        $senderId = $chat['user']->user_id ?? null;
                        $authId = Auth::user()->user_id;

                        $unreadCount = 0;
                        $isUnread = false;

                        if ($senderId) {
                            $unreadCount = \App\Models\Message::where('sender_id', $senderId)
                                ->where('receiver_id', $authId)
                                ->where('status', 'New')
                                ->count();

                            $isUnread = (
                                $chat['message']->status == 'New' &&
                                $chat['message']->receiver_id == $authId
                            );
                        }
                    @endphp
                    <div class="d-flex align-items-center border-bottom py-2 px-2 {{ $isUnread ? 'bg-unread' : 'bg-transparent' }}">
                        <img src="{{ asset('IMG/uploads/profile/' . $chat['user']->profile_image) }}" width="40" class="rounded-circle me-2">

                        <div class="flex-grow-1">
                            <h2 class="fs-9 lh-0 mb-0">{{ $chat['user']->name }}</h2>
                            <p class="fs-13 lh-1 {{ $isUnread ? 'text-dark fw-semibold' : 'text-muted' }} text-truncate-2 mb-0">
                                {{ $chat['message']->message }}
                            </p>
                        </div>

                        @if($unreadCount > 0)
                            <span class="badge bg-lightPrimary rounded-circle fs-15">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                        @endif
                    </div>
                @endforeach
                @else
                    <h2 class="fs-6 text-muted fw-light text-center border py-5">You have no conversation</h2>
                @endif
            </div>
        </div>
        <div class="content2 mt-8 gap-10"
            style="width: 550px;">
            <div class="shadow-sm bg-white w-100 rounded px-4 py-3" style="height: 110px;">
                <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex gap-2 my-auto mx-auto text-center align-items-center">
                        <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" alt="" width="50" class="rounded-circle">
                        <button
                            type="button"
                            class="btn btn-white text-start text-darkGrey px-4 py-3 w-100 border-darkGrey rounded-pill"
                            data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Create a Post
                        </button>
                        <div class="d-flex align-items-center gap-2" style="height: 30px; width: 30px" id="triggerUpload">
                            <input name="images[]" type="file" id="imageInput2" accept="image/*" multiple style="display: none" />
                            <div class="d-flex align-items-center btn gap-2" role="button" id="imageIcon2">
                                <i class="bi bi-card-image fs-4 text-darkGrey"  title="Upload image"></i>
                            </div>
                        </div>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog mt-10" style="max-width: 700px; margin: auto;">
                        <div class="modal-content px-4">
                            <div class="modal-header border-0">
                            <div class="text-start">
                                <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Create a post</h1>
                                <p class="fs-8 text-muted">To Anyone on Connexa</p>
                            </div>
                            <div class="d-flex ms-7 fs-8 gap-3">
                                <div class="form-check border-end pe-3">
                                <input class="form-check-input" type="radio" value="Daily" name="post_type" id="radio1" checked>
                                <label class="form-check-label" for="radio1">Daily</label>
                                </div>
                                <div class="form-check border-end pe-3">
                                <input class="form-check-input" type="radio" value="Educational" name="post_type" id="radio2">
                                <label class="form-check-label" for="radio2">Educational</label>
                                </div>
                                <div class="form-check border-end pe-3">
                                <input class="form-check-input" type="radio" value="Career" name="post_type" id="radio3">
                                <label class="form-check-label" for="radio3">Career</label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="radio" value="Achievement" name="post_type" id="radio4">
                                <label class="form-check-label" for="radio4">Achievement</label>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body" id="modalBody" style="max-height: 500px; overflow-y: auto;">
                                <div class="form-floating">
                                    <textarea
                                    class="form-control border-0"
                                    name="description"
                                    id="autoResizeTextarea"
                                    placeholder="Write something..."
                                    style="resize: none; overflow: hidden; min-height: 100px;"
                                    ></textarea>
                                    <label for="autoResizeTextarea">
                                    <p class="text-lightGrey">Your post comment...</p>
                                    </label>
                                </div>
                                <div id="imagePreviewContainer" class="mt-3 d-flex flex-wrap gap-2"></div>
                            </div>
                            <div class="modal-footer d-flex justify-content-between align-items-center border-0">
                                <div>
                                    <input name="images[]" type="file" id="imageInput" accept="image/*" multiple style="display: none" />
                                    <i class="bi bi-card-image fs-4 text-muted" role="button" id="imageIcon" title="Upload image"></i>
                                </div>
                                <button type="submit" class="btn btn-primary">Post Now</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="d-flex justify-content-center gap-3 align-items-center">
                <div class="d-flex align-items-center gap-2 px-2 border-end"  style="height: 30px" id="triggerUpload">
                    <div class="d-flex align-items-center text-muted btn gap-2" style="height: 40px" role="button" id="imageIcon2">
                        <i class="bi bi-postcard"></i>
                        <p class="fs-7 mt-3 align-items-center">Manage Post</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-2" id="triggerUpload">
                    <div class="d-flex align-items-center text-muted btn gap-2" style="height: 40px" role="button" id="imageIcon2">
                        <i class="bi bi-globe"></i>
                        <p class="fs-7 mt-3 align-items-center">Ask Community</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="flex-grow-1">
        <x-home-post :posts="$posts" :user="$user" />
    </div>

    <div class="content3 mt-8">
        <div class="content-3 d-block shadow-sm bg-white rounded">
            <div class="company py-2 align-items-start justify-content-center mx-auto" style="width: 250px">
                <div class="d-flex justify-content-between">
                    <h2 class="fs-8">Companies Suggestion</h2>
                    <a href="{{ route('company.page') }}" class="text-decoration-none text-muted fs-10">View all</a>
                </div>
                @foreach($companies as $company)
                    @php $isFollowed = $company->follows->contains('user_id', Auth::user()->user_id); @endphp
                    <div class="d-block my-3 pb-3 border rounded text-center align-items-start justify-content-center mx-auto" style="width: 230px">
                        <img src="{{asset('IMG/uploads/cover/' . $company->cover_image)}}" class="rounded-top w-100 border-bottom">
                        <a href="{{ route('company.show', $company->company_id) }}" class="text-decoration-none">
                            <div class="d-block" >
                                <img src="{{asset('IMG/uploads/logo/' . $company->logo)}}" class="p-1 bg-white" width="50" style="margin-top: -20px">
                                <h2 class="fs-8 mt-2 text-dark">{{$company->name}}</h2>
                                <p class="fs-11 lh-0 text-muted">{{$company->industry}}</p>
                            </div>
                        </a>
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
                @endforeach
            </div>
        </div>
        <div class="content-3 d-block shadow-sm bg-white rounded">
            <div class="people py-2 px-2">
                <div class="d-flex justify-content-between">
                    <h2 class="fs-8">Peoples Suggestion</h2>
                    <a href="#" class="text-decoration-none text-muted fs-10">View all</a>
                </div>
                @foreach($peoples as $people)
                    @php $isRequested = \App\Models\Connection::where('user_id', Auth::user()->user_id)
                                        ->where('user_target', $people->user_id)
                                        ->exists(); @endphp
                    <div class="d-block gap-2 my-2 px-2 pb-3 border rounded text-start align-items-start justify-content-center mx-auto" style="width: 230px">
                        <a href="" class="d-flex text-decoration-none">
                            <img src="{{asset('IMG/uploads/profile/' . $people->profile_image)}}" width="40" height="40" class=" me-2 mt-1 rounded-circle" >
                            <div class="d-block">
                                <div class="fs-10 lh-0 text-dark">{{$people->name}}</div>
                                <div class="fs-13 lh-0 text-truncate-1 text-muted">{{$people->headline}}</div>
                            </div>
                        </a>
                        <form action="{{route('connect.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{$people->user_id}}">
                            @if($isRequested)
                                <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 rounded-pill"><i class="bi bi-clock-history"></i> Pending</button>
                            @else
                                <button type="submit" class="btn connect-btn fs-9 text-primary border-primary py-0 px-5 ms-8 rounded-pill"><i class="bi bi-person-plus-fill"></i> Connect</button>
                            @endif
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="content-4 shadow-sm bg-white rounded">
            @foreach($ads as $ad)
                <a href="{{$ad->link}}"><img src="{{asset('IMG/uploads/ads/' . $ad->image_content)}}" class="rounded" width="270" height="400" style=""></a>
            @endforeach
        </div>
    </div>

    <div id="overlay" aria-hidden="true"></div>
@endsection






