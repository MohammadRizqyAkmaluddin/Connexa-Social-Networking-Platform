<!DOCTYPE html>
<html lang="en">
<x-head title="Home" />
<body class="bg-main overflow-x-hidden align-items-center mx-auto">

<x-navbar-main/>

<div class="d-lg-flex mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
    <div class="content1"
         style="width: 280px; height: 89.5vh;
                position: sticky; top:75.5px">
         <div class="bg-white shadow-sm w-100 rounded pb-3">
            <img src="{{asset('IMG/cover/' . Auth::user()->cover_image)}}" alt="" class="rounded-top w-100">
            <div class="px-4 d-block">
                <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}" alt="Profile" class="rounded-circle bg-white d-block" style="width:70px; margin-top:-40px">
                <h2 class="fs-6 mt-3">{{Auth::user()->name}}</h2>
                <p class="fs-8 lh-1">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 16, ' ...') }}</p>
                <p class="fs-8 lh-1 text-muted">{{Auth::user()->city}}, {{Auth::user()->country}}</p>
                @foreach ($user->userEducations as $edu)
                   <div class="d-flex text-center align-items-center mx-auto my-auto">
                        <img src="{{ asset('IMG/uploads/logo/' . $edu->company->logo) }}" 
                            alt="Logo" width="50" height="50" 
                            class="rounded me-3" style="object-fit: cover;">
                        <h2 class="fs-9 mt-2">{{$edu->company->name}}</h2>
                   </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="content2 mt-8 gap-10"
         style="width: 550px;">
        <div class="shadow-sm bg-white w-100 rounded px-4 py-3" style="height: 150px; "> 
            <div class="d-flex gap-2 my-auto mx-auto text-center align-items-center">
                <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" alt="" width="50" class="rounded-circle">
                <button type="button" class="btn btn-white text-start text-darkGrey px-4 py-3 w-100 border-darkGrey rounded-pill" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Create a Post
                </button>
                <form action="POST">
                    <div data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <input type="file" id="imageInput2" accept="image/*" style="display: none"/>
                        <i class="bi bi-card-image fs-4 text-primary" role="button" id="imageIcon2" title="Upload image"></i>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable mt-10" style="max-width: 700px; margin: auto;">
                            <div class="modal-content px-4">
                        
                                <div class="modal-header border-0">
                                    <div class="text-start">
                                        <h1 class="modal-title fs-5 text-black" id="exampleModalLabel">Create a post</h1>
                                        <p class="fs-8 text-muted">To Anyone on Connexa</p>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="modalBody" style="max-height: 500px; overflow-y: auto;">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" id="autoResizeTextarea" placeholder="Write something..." style="resize: none; overflow: hidden; min-height: 100px;"></textarea>
                                        <label for="autoResizeTextarea">
                                            <p class="text-lightGrey">Your post comment...</p>
                                        </label>
                                    </div>
                                    <div id="imagePreviewContainer" class="mt-3 text-center"></div>
                                </div>
                                <div class="modal-footer d-flex justify-content-between align-items-center border-0">
                                    <div>
                                        <input type="file" id="imageInput" accept="image/*" style="display: none"/>
                                        <i class="bi bi-card-image fs-4 text-primary" role="button" id="imageIcon" title="Upload image"></i>
                                    </div>
                                    <button type="button" class="btn btn-primary">Post Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <hr class="flex-grow-1">

        @foreach($posts as $post)
        <div class="shadow-sm bg-white rounded mt-3" style="height: auto; "> 
            <div class="d-flex justify-content-center gap-2 border-bottom">
                <div class="fs-11 text-center text-muted p-1"> {{$post->post_type}} Content</div>
            </div>
            <div class="d-block px-3">
                <div class="d-flex mt-2 gap-3">
                    <img src="{{asset('IMG/uploads/profile/' . $post->user->profile_image)}}" width="50" height="50" class="rounded-circle mt-1 border b-white">
                    <div>  
                        <div class="fs-6 fw-normal">{{$post->user->name}}</div>
                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->user->headline}}</div>
                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="d-flex align-items-end gap-0">
                    <div class="mt-3 fs-8 post-description truncated" id="desc-{{ $post->post_id }}">{{ $post->description }}</div>
                    <button class="btn btn-link p-0 text-decoration-none fs-8 text-muted toggle-btn" data-target="desc-{{ $post->post_id }}">more</button>
                </div>
            </div>
            @if($post->image)
            <div class="d-flex justify-content-center">
                <img src="{{asset ('IMG/uploads/post/' . $post->image) }}"class="post-image ">
            </div>
            @endif
            <div class="d-flex justify-content-between align-items-center px-3">
                <div class="d-flex justify-content-center align-items-center pb-0">
                    @foreach ($post->likes->take(3) as $index=>$like)
                        @if ($like->user)
                            <img src="{{ asset('IMG/uploads/profile/' . $like->user->profile_image) }}" 
                                alt="{{ $like->user->name }}" 
                                class="rounded-circle border bg-white border-white mb-1" width="27" height="27"
                                style="padding:1px ;margin-left: {{ $index > 0 ? '-10px' : '0' }}; z-index: {{ 10 - $index }};">
                        @endif
                    @endforeach
                    <p class="fs-8 ms-2 d-flex align-items-end mt-3">{{ $post->likes->count() }} likes</p>
                </div>
                <p class="fs-8">21 comments</p>
            </div>
            <div class="d-flex ">
                <i class="bi bi-hand-thumbs-up"></i>
            </div>
        </div>
        @endforeach
         {{-- <div class="comments border-top pt-2">
                @foreach($post->comments as $comment)
                    <div class="d-flex mb-2">
                        <strong class="me-2">{{ $comment->user->name }}</strong>
                        <span>{{ $comment->comment }}</span>
                    </div>
                @endforeach
            </div>   --}}
        {{-- <div class="shadow-sm bg-white w-100 rounded p-2 mt-3" style="height: 700px; "> </div>
        <div class="shadow-sm bg-white w-100 rounded p-2 mt-3" style="height: 700px; "> </div> --}}
    </div>

    <div class="content3 mt-8"
         style=";">
        <div class="content-3 shadow-sm bg-white rounded p-2"> </div>
        <div class="content-4 shadow-sm bg-white rounded p-2"> </div>
    </div>
</div>


    <div id="overlay" aria-hidden="true"></div>
</body>
</html>


