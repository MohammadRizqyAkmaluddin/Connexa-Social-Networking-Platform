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
                <h2 class="fs-6 mt-3 fw-semi">{{Auth::user()->name}}</h2>
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

                <!-- ===== ICON DILUAR MODAL ===== -->
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

        @foreach($posts as $post)
        <div class="shadow-sm bg-white rounded mt-3" style="height: auto; "> 
            <div class="d-flex justify-content-center gap-2 border-bottom">
                <div class="fs-11 text-center text-muted p-1"> {{$post->post_type}} Content</div>
            </div>
            <div class="d-block px-3">
                <div class="d-flex mt-2 gap-3">
                    <img src="{{asset('IMG/uploads/profile/' . $post->user->profile_image)}}" width="40" height="40" class="mt-1 b-white rounded-circle">
                    <div>  
                        <div class="fs-6 fw-semi">{{$post->user->name}}</div>
                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->user->headline}}</div>
                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="d-flex align-items-end gap-0">
                    <div class="mt-3 fs-8 post-description truncated" id="desc-{{ $post->post_id }}">{{ $post->description }}</div>
                    <button class="btn btn-link p-0 text-decoration-none fs-8 text-muted toggle-btn" data-bs-target="desc-{{ $post->post_id }}">more</button>
                </div>
            </div>

            <div class="post-wrapper mt-2">
                <div class="modalTrigger" data-bs-toggle="modal" data-bs-target="#postModal{{ $post->post_id }}">
                    @php $count = $post->postImages->count(); @endphp

                    {{-- 1–2 images --}}
                    @if ($count == 1)
                        <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="single-img" alt="post image">
                    @elseif ($count == 2)
                        <div class="d-flex gap-1 mt-1">
                            @foreach ($post->postImages as $image)
                                <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="double-img" alt="post image">
                            @endforeach
                        </div>

                    {{-- 3 images --}}
                    @elseif ($count == 3)
                        <div class="three-img-grid">
                            <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="main-img">
                            <div class="d-flex gap-1 mt-1">
                                @foreach ($post->postImages->slice(1) as $image)
                                    <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="half-img">
                                @endforeach
                            </div>
                        </div>

                    {{-- 4 images --}}
                    @elseif ($count == 4)
                        <div class="four-img-grid">
                            <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="main-img">
                            <div class="d-flex gap-1 mt-1">
                                @foreach ($post->postImages->slice(1) as $image)
                                    <img src="{{ asset('IMG/uploads/post/' . $image->image) }}" class="third-img">
                                @endforeach
                            </div>
                        </div>

                    {{-- >4 images --}}
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
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 1000px;">
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
                                    <img src="{{asset('IMG/uploads/profile/' . $post->user->profile_image)}}" width="50" height="50" class="mt-1 b-white rounded-circle">
                                    <div>  
                                        <div class="fs-6 fw-semi">{{$post->user->name}}</div>
                                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->user->headline}}</div>
                                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                                    </div>
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
                                    <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" 
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
                                        <div class="d-flex gap-3 post-modal-profile bg-white pb-1 w-100">
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
                    <img src="{{asset('IMG/uploads/profile/' . $user->profile_image)}}" 
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
                        <div class="d-flex gap-3 post-modal-profile bg-white pb-1 w-100">
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





  