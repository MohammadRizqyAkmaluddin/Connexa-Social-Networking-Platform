<div class="d-lg-flex d-none gap-3">
    @foreach($company->posts->take(2) as $post)
    <div class="company-post border rounded mt-3">
        <a href="#" class="shadow-sm bg-white rounded mt-3 text-decoration-none text-dark bg-warning">
            <div class="d-block px-4">
                <div class="d-flex mt-2 gap-3">
                    <img src="{{asset('IMG/uploads/logo/' . $post->company->logo)}}" width="30" height="30" class="mt-1 b-white">
                    <div>
                        <div class="fs-6 fw-semi">{{$post->company->name}}</div>
                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->post_type}} Content</div>
                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="mt-3 fs-12 post-description truncated">{{ $post->description }}</div>
            </div>
            @php $count = $post->postImages->count(); @endphp
            @if($count > 1)
                <div class="slide-count ms-5">
                    <p class="rounded-pill bg-dark text-white fs-9 p-1">1/{{$post->postImages->count()}} slide</p>
                </div>
            @endif
            <div class="post-wrapper-company mt-2 mx-auto">
                <div class="image-bg" style="background-image: url('{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}');"></div>
                <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="company-img">
            </div>
            <div class="d-flex justify-content-between align-items-center px-4">
                <div class="d-flex justify-content-between align-items-center text-center gap-3 fw-bold">
                    @php
                        $isLiked = $post->likes->contains('user_id', Auth::user()->user_id);
                    @endphp
                    <form action="{{route('like.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->post_id}}">
                        <button class="bg-white border-0" type="submit">
                            @if($isLiked)
                                <i class="bi bi-heart-fill fs-7 text-like"></i>
                            @else
                                <i class="bi bi-heart text-muted fs-7"></i>
                            @endif
                        </button>
                    </form>
                    <button class="bg-white border-0"><i class="bi bi-chat-left-text text-muted toggle-comment fs-7"></i></button>
                    <button class="bg-white border-0"><i class="bi bi-send fst-normal text-muted fs-7"></i></button>
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
                    <p class="fs-15 ms-2 me-2 d-flex align-items-end mt-3 text-muted">{{ $post->likes->count() }} likes</p>
                    <p class="fs-15 mt-3 ps-2 text-muted border-start">{{$post->comments->count()}} Comments</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="d-md-flex d-none gap-3 d-lg-none">
    @foreach($company->posts->take(2) as $post)
    <div class="company-post-md border rounded mt-3">
        <a href="#" class="shadow-sm bg-white rounded mt-3 text-decoration-none text-dark bg-warning">
            <div class="d-block px-4">
                <div class="d-flex mt-2 gap-3">
                    <img src="{{asset('IMG/uploads/logo/' . $post->company->logo)}}" width="30" height="30" class="mt-1 b-white">
                    <div>
                        <div class="fs-6 fw-semi">{{$post->company->name}}</div>
                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->post_type}} Content</div>
                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="mt-3 fs-12 post-description truncated">{{ $post->description }}</div>
            </div>
            @php $count = $post->postImages->count(); @endphp
            @if($count > 1)
                <div class="slide-count ms-5">
                    <p class="rounded-pill bg-dark text-white fs-9 p-1">1/{{$post->postImages->count()}} slide</p>
                </div>
            @endif
            <div class="post-wrapper-company-md mt-2 mx-auto">
                <div class="image-bg" style="background-image: url('{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}');"></div>
                <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="company-img">
            </div>
            <div class="d-flex justify-content-between align-items-center px-4">
                <div class="d-flex justify-content-between align-items-center text-center gap-3 fw-bold">
                    @php
                        $isLiked = $post->likes->contains('user_id', Auth::user()->user_id);
                    @endphp
                    <form action="{{route('like.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->post_id}}">
                        <button class="bg-white border-0" type="submit">
                            @if($isLiked)
                                <i class="bi bi-heart-fill fs-7 text-like"></i>
                            @else
                                <i class="bi bi-heart text-muted fs-7"></i>
                            @endif
                        </button>
                    </form>
                    <button class="bg-white border-0"><i class="bi bi-chat-left-text text-muted toggle-comment fs-7"></i></button>
                    <button class="bg-white border-0"><i class="bi bi-send fst-normal text-muted fs-7"></i></button>
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
                    <p class="fs-15 ms-2 me-2 d-flex text-center lh-1 align-items-end mt-3 text-muted">{{ $post->likes->count() }} likes</p>
                    <p class="fs-15 mt-3 ps-2 text-muted text-center lh-1 border-start">{{$post->comments->count()}} Comments</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>

<div class="d-sm-flex gap-3 d-lg-none d-md-none">
    @foreach($company->posts->take(1) as $post)
    <div class="company-post-sm border rounded mt-3">
        <a href="#" class="shadow-sm bg-white rounded mt-3 text-decoration-none text-dark bg-warning">
            <div class="d-block px-4">
                <div class="d-flex mt-2 gap-3">
                    <img src="{{asset('IMG/uploads/logo/' . $post->company->logo)}}" width="30" height="30" class="mt-1 b-white">
                    <div>
                        <div class="fs-6 fw-semi">{{$post->company->name}}</div>
                        <div class="fs-11 text-muted lh-1 text-truncate-1">{{$post->post_type}} Content</div>
                        <div class="fs-11 text-muted">{{$post->created_at->diffForHumans()}}</div>
                    </div>
                </div>
                <div class="mt-3 fs-12 post-description truncated">{{ $post->description }}</div>
            </div>
            @php $count = $post->postImages->count(); @endphp
            @if($count > 1)
                <div class="slide-count ms-5">
                    <p class="rounded-pill bg-dark text-white fs-9 p-1">1/{{$post->postImages->count()}} slide</p>
                </div>
            @endif
            <div class="post-wrapper-company-sm mt-2 mx-auto">
                <div class="image-bg" style="background-image: url('{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}');"></div>
                <img src="{{ asset('IMG/uploads/post/' . $post->postImages[0]->image) }}" class="company-img">
            </div>
            <div class="d-flex justify-content-between align-items-center px-4">
                <div class="d-flex justify-content-between align-items-center text-center gap-3 fw-bold">
                    @php
                        $isLiked = $post->likes->contains('user_id', Auth::user()->user_id);
                    @endphp
                    <form action="{{route('like.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="post_id" value="{{$post->post_id}}">
                        <button class="bg-white border-0" type="submit">
                            @if($isLiked)
                                <i class="bi bi-heart-fill fs-7 text-like"></i>
                            @else
                                <i class="bi bi-heart text-muted fs-7"></i>
                            @endif
                        </button>
                    </form>
                    <button class="bg-white border-0"><i class="bi bi-chat-left-text text-muted toggle-comment fs-7"></i></button>
                    <button class="bg-white border-0"><i class="bi bi-send fst-normal text-muted fs-7"></i></button>
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
                    <p class="fs-15 ms-2 me-2 d-flex text-center lh-1 align-items-end mt-3 text-muted">{{ $post->likes->count() }} likes</p>
                    <p class="fs-15 mt-3 ps-2 text-muted text-center lh-1 border-start">{{$post->comments->count()}} Comments</p>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
