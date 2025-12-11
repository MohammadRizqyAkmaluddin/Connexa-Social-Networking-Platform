@extends('layouts.app')

@section('title', 'Conversation')

@section('content')
    <div class="container d-lg-block mx-auto justify-content-center w-100 mt-3 p-2" style="gap: 1rem;">
        <div class="d-flex align-items-center justify-content-between shadow-sm bg-white rounded px-3 mt-7">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all-tab-pane" type="button" role="tab" aria-controls="all-tab-pane" aria-selected="true">All Message</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="jobs-tab" data-bs-toggle="tab" data-bs-target="#jobs-tab-pane" type="button" role="tab" aria-controls="jobs-tab-pane" aria-selected="false">Jobs</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="starred-tab" data-bs-toggle="tab" data-bs-target="#starred-tab-pane" type="button" role="tab" aria-controls="starred-tab-pane" aria-selected="false">Starred</button>
                </li>
            </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-pencil-square fs-5"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-sm scroll-area" style="width: 450px; height:700px; overflow-y:auto;">
                    <li>
                        <h2 class="fs-6 border-bottom mb-2 pb-3 px-3">Message</h2>
                        @if($connection->count() > 0)
                            @foreach($connection as $user)

                            @if($user->user->user_id != Auth::user()->user_id)
                                <button class="btn d-flex align-items-center w-100"
                                    data-bs-target="#chat{{$user->user->user_id}}" data-bs-toggle="modal">
                                    <div class="d-flex align-items-center gap-2 border-bottom pb-3 text-start text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'"
                                        >
                                        <img src="{{asset('IMG/uploads/profile/' . $user->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$user->user->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->user->headline}}</p>
                                        </div>
                                    </div>
                                </button>
                            @elseif($user->user->user_id == Auth::user()->user_id)
                                <button class="btn d-flex align-items-center w-100"
                                    data-bs-target="#chat{{$user->target->user_id}}" data-bs-toggle="modal">
                                    <div class="d-flex align-items-center gap-2 border-bottom pb-3 text-start text-decoration-none text-dark w-100"
                                        onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                        onmouseout="this.querySelector('h2').style.textDecoration='none'"
                                        >
                                        <img src="{{asset('IMG/uploads/profile/' . $user->target->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                        <div class="d-block">
                                            <h2 class="fs-7 mb-1">{{$user->target->name}}</h2>
                                            <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->target->headline}}</p>
                                        </div>
                                    </div>
                                </button>
                            @endif

                            @endforeach
                        @else
                        <p class="fs-8 mb-0 text-muted">No connect invitation requests</p>
                        @endif
                    </li>
                </ul>
                        @foreach($connection as $user)
                        @if($user->user->user_id != Auth::user()->user_id)
                        <div class="modal fade" id="chat{{$user->user->user_id}}" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                            <div class="modal-dialog modal-md modal-dialog-start">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="modal-title d-flex align-items-center gap-2 text-start text-decoration-none text-dark w-100"
                                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                            onmouseout="this.querySelector('h2').style.textDecoration='none'"
                                            >
                                            <img src="{{asset('IMG/uploads/profile/' . $user->user->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block">
                                                <h2 class="fs-7 mb-1">{{$user->user->name}}</h2>
                                                <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->user->headline}}</p>
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
                                            <input type="hidden" name="receiver_id" value="{{$user->user->user_id}}">
                                            <input type="hidden" name="status" value="New">
                                            <input type="hidden" name="type" value="Connection">
                                            <input type="hidden" name="active_tab2" value="{{$user->user->user_id}}">

                                            <div class="chat-input bg-white p-3 border-top align-items-end justify-content-end">
                                                <textarea name="message" class="message-textarea form-control fs-7 scroll-area chat-style"
                                                        placeholder="Type a message..."></textarea>
                                                <button type="submit" class="border-0 px-4 mt-2 py-1 bg-primary text-light rounded-pill">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @elseif($user->user->user_id == Auth::user()->user_id)
                        <div class="modal fade" id="chat{{$user->target->user_id}}" aria-hidden="true" aria-labelledby="w" tabindex="-1">
                            <div class="modal-dialog modal-md modal-dialog-start">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="modal-title d-flex align-items-center gap-2 text-start text-decoration-none text-dark w-100"
                                            onmouseover="this.querySelector('h2').style.textDecoration='underline'"
                                            onmouseout="this.querySelector('h2').style.textDecoration='none'"
                                            >
                                            <img src="{{asset('IMG/uploads/profile/' . $user->target->profile_image)}}" class="rounded-circle" style="width: 50px; height:50px; object-fit:cover;">
                                            <div class="d-block">
                                                <h2 class="fs-7 mb-1">{{$user->target->name}}</h2>
                                                <p class="fs-11 text-muted lh-1 text-truncate-2 mb-0">{{$user->target->headline}}</p>
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
                                            <input type="hidden" name="receiver_id" value="{{$user->target->user_id}}">
                                            <input type="hidden" name="status" value="New">
                                            <input type="hidden" name="type" value="Connection">
                                            <input type="hidden" name="active_tab2" value="{{$user->target->user_id}}">
                                            <div class="chat-input bg-white p-3 border-top align-items-end">
                                                <textarea type="text" name="message" class="message-textarea form-control fs-7 scroll-area chat-style" placeholder="Type a message..." ></textarea>
                                                <button type="submit" class="border-0 px-4 mt-2 py-1 bg-primary text-light rounded-pill">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
            </div>
        </div>




        <div class="d-flex tab-content" id="myTabContent" style="height: 85vh">
            <div class="tab-pane fade show active" id="all-tab-pane" role="tabpanel" aria-labelledby="all-tab" tabindex="0" >
                <div class="d-flex w-100 shadow-sm bg-white rounded mt-3">
                    @php
                        $activeTab = request('active_tab') ?? ($chats->count() > 0 ? $chats[0]['user']->user_id : '');
                    @endphp
                    <ul class="nav flex-column nav-tabs border-end scroll-area" id="myTab" role="tablist" style="width: 430px; height:700p; overflow-y:auto;">
                        @foreach ($chats as $chat)
                            @php
                                $senderId = $chat['user']->user_id ?? null;
                                $authId = Auth::user()->user_id;
                                $unreadCount = \App\Models\Message::where('sender_id', $senderId)
                                    ->where('receiver_id', $authId)
                                    ->where('status', 'New')
                                    ->count();
                                $isUnread = $chat['message']->status == 'New' && $chat['message']->receiver_id == $authId;
                                $isActive = $activeTab == $chat['user']->user_id;

                            @endphp
                        @if($chats->count() > 0)
                            <li class="nav-item" role="presentation">
                                <form action="{{ route('message.updateStatus') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="sender_id" value="{{ $senderId }}">
                                    <input type="hidden" name="receiver_id" value="{{ $authId }}">
                                    <input type="hidden" name="active_tab" value="{{ $chat['user']->user_id }}">

                                    <button
                                        class="nav-link border-bottom d-flex align-items-center justify-content-between {{ $isActive ? 'active' : '' }} {{ $isUnread ? 'bg-unread' : '' }} w-100"
                                        id="chat-tab-{{ $chat['user']->user_id }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#chat-pane-{{ $chat['user']->user_id }}"
                                        type="submit"
                                        role="tab"
                                        aria-controls="chat-pane-{{ $chat['user']->user_id }}"
                                        aria-selected="{{ $isActive ? 'true' : 'false' }}"
                                        style="height: 100px;">
                                        <div class="d-flex align-items-start flex-grow-1 text-start ">
                                            <div class="d-flex">
                                                <img src="{{ asset('IMG/uploads/profile/' . $chat['user']->profile_image) }}" width="50" height="50" class="me-2 rounded-circle" style="object-fit: cover">
                                                <div class="d-flex align-items-end" style="margin-left: -20px; z-index:99; position:relative;">
                                                    @if(in_array($chat['user']->user_id, $activeUsers))
                                                        <i class="bi bi-stop-circle-fill text-success fs-8"></i>
                                                    @else
                                                        <div class="me-3"></div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 text-start">
                                                <h2 class="fs-6 ms-3 lh-0 mb-1 text-dark">{{ $chat['user']->name }}</h2>
                                                <p class="fs-9 ms-3 text-mutedbold text-truncate-2 mb-0" style="width: 300px">
                                                    @if($chat['message']->receiver_id == $authId)
                                                        {{ Str::before($chat['user']->name, ' ') }}: {{ $chat['message']->message }}
                                                    @else
                                                        You: {{ $chat['message']->message }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>

                                        @if($unreadCount > 0)
                                            <span class="badge bg-lightPrimary rounded-circle fs-6 px-2 py-1">{{ $unreadCount > 9 ? '9+' : $unreadCount }}</span>
                                        @endif
                                    </button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <p class="text-muted text-center w-100 mt-4">You have no conversation</p>
                            </li>
                        @endif
                        @endforeach
                    </ul>
                    <div class="tab-content flex-grow-1" style="width: 500px">
                        @foreach ($chats as $chat)
                            @php
                                $isActive = $activeTab == $chat['user']->user_id;
                            @endphp
                            <div class="tab-pane fade {{ $isActive ? 'show active' : '' }}"
                                id="chat-pane-{{ $chat['user']->user_id }}"
                                role="tabpanel"
                                aria-labelledby="chat-tab-{{ $chat['user']->user_id }}">
                                <div class="d-flex px-3 pt-3 pb-1 border-bottom align-items-start">
                                    <img src="{{ asset('IMG/uploads/profile/' . $chat['user']->profile_image) }}" width="55" height="55" class="rounded-circle me-3">
                                    <div class="d-block">
                                        <h5 class="fs-6 mb-1">{{ $chat['user']->name }}</h5>
                                        <p class="fs-8 text-muted mb-0 text-truncate-1 lh-1">{{ $chat['user']->headline }}</p>
                                        <div class="d-flex align-items-center gap-1 mt-1">
                                            @if(in_array($chat['user']->user_id, $activeUsers))
                                                <i class="bi bi-stop-circle-fill text-success fs-12"></i>
                                                <p class="mb-0 fs-8 align-items-center text-success text-start">Online</p>
                                            @else
                                                <i class="bi bi-stop-circle-fill text-muted fs-12"></i>
                                                <p class="mb-0 fs-8 align-items-center text-muted text-start">Offline</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $lastDate = null;
                                    $now = \Carbon\Carbon::now();
                                @endphp

                                <div class="chat-messages p-3 scroll-area" style="overflow-y:auto; overflow-x:hidden; height:490px">
                                    @foreach ($chat['allMessages'] as $message)
                                        @php
                                            $currentDate = $message->created_at->format('Y-m-d');
                                            $messageDate = $message->created_at;
                                        @endphp

                                        @if ($lastDate !== $currentDate)
                                            <div class=" align-items-center text-center my-2 d-flex">
                                                <div class="border-bottom w-50"></div>
                                                <span class="badge text-muted fw-light">
                                                    @if ($messageDate->isToday())
                                                        {{ __('Today') }}
                                                    @elseif ($messageDate->diffInDays($now) < 7)
                                                        {{ $messageDate->isoFormat('dddd') }}
                                                    @else
                                                        {{ $messageDate->format('d/m/Y') }}
                                                    @endif
                                                </span>
                                                <div class="border-bottom w-50"></div>
                                            </div>
                                        @endif

                                        <div class="mb-2 {{ $message->sender_id == auth()->user()->user_id ? 'text-end' : 'text-start' }}">
                                            <div class="d-inline-block p-2 rounded {{ $message->sender_id == auth()->user()->user_id ? 'bg-primary text-white' : 'bg-light' }}"
                                                style="max-width: 70%; word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                                                <p class="ps-2 text-start mb-0 fs-7 me-7">{{ $message->message }}</p>
                                                <small class="d-block text-mutedlight fs-10 text-end ms-5" style="margin-top:-15px;">{{ $message->created_at->format('H:i') }}</small>
                                            </div>
                                        </div>

                                        @php
                                            $lastDate = $currentDate;
                                        @endphp
                                    @endforeach
                                </div>

                                <form action="{{route('message.store')}}" method="POST" onsubmit="copyDescription(this)">
                                    @csrf
                                    <input type="hidden" name="category" value="Message">
                                    <input type="hidden" name="title" value="&lt;strong&gt;{{ Auth::user()->name }}&lt;/strong&gt; sent you a message">
                                    <input type="hidden" name="description" class="description-input">
                                    <input type="hidden" name="sender_id" value="{{Auth::user()->user_id}}">
                                    <input type="hidden" name="receiver_id" value="{{$chat['user']->user_id}}">
                                    <input type="hidden" name="type" value="Connection">
                                    <input type="hidden" name="status" value="New">
                                    <input type="hidden" name="active_tab2" value="{{ $chat['user']->user_id }}">
                                    <div class="chat-input bg-white p-3 border-top align-items-end">
                                        <textarea type="text" name="message" class="message-textarea form-control fs-7 scroll-area chat-style" placeholder="Type a message..." ></textarea>
                                        <button type="submit" class="border-0 px-4 mt-2 py-1 bg-primary text-light rounded-pill">Send</button>
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>

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
