@extends('layouts.app')

@section('title', 'Notification')

@section('content')

<div class="d-lg-flex mx-auto justify-content-center w-100 mt-3 mt-lg-9 p-2" style="gap: 1rem;">
    <div class="content1" style="width: 280px; height: 89.5vh; position: sticky; top:75.5px">
        <div class="bg-white shadow-sm w-100 rounded-top pb-3 mb-3">
            <a href="{{route('user.page', Auth::user()->user_id)}}" class="text-decoration-none text-dark">
                <img src="{{asset('IMG/cover/' . Auth::user()->cover_image)}}" class="rounded-top w-100">
                <div class="px-4 d-block">
                    <img src="{{asset('IMG/uploads/profile/' . Auth::user()->profile_image)}}" class="rounded-circle bg-white d-block" style="margin-top:-40px; width: 70px; height: 70px; object-fit:cover">
                    <h2 class="fs-6 mt-3 fw-semi">{{Auth::user()->name}}</h2>
                    <p class="fs-8 lh-1">{{ \Illuminate\Support\Str::words(Auth::user()->headline, 16, ' ...') }}</p>
                    <p class="fs-8 lh-1 text-muted">{{Auth::user()->city}}, {{Auth::user()->country}}</p>
                    @php
                        $edu = $user->userEducations->sortByDesc('start_date')->first();
                    @endphp
                    @if($edu && $edu->company)
                    <div class="d-flex text-center align-items-center mx-auto my-auto">
                        <img src="{{ asset('IMG/uploads/logo/' . $edu->company->logo) }}"
                            alt="Logo" width="40" height="40"
                            class="rounded me-3" style="object-fit: cover;">
                        <h2 class="fs-9 mt-2">{{$edu->company->name}}</h2>
                    </div>
                    @endif
                </div>
            </a>
        </div>
        <div class="shadow-sm bg-white rounded d-none d-lg-block">
            @foreach($ads as $ad)
                <a href="{{$ad->link}}"><img src="{{asset('IMG/uploads/ads/' . $ad->image_content)}}" class="rounded" width="280" height="400" style="object-fit:cover"></a>
            @endforeach
        </div>
    </div>
    <div class="notification-main gap-10" style="width: 650px;">
        <div class="d-flex shadow-sm bg-white rounded w-100 p-3">
            <p class="fw-6 px-3 py-1 text-white fw-semibold bg-success mb-0 rounded">{{$countNotification}} New Inbox</p>
        </div>
        <div class="shadow-sm bg-white rounded w-100 mt-3">
            @if($notifications->count() > 0)
            @foreach($notifications as $index => $notif)
                @php
                    $isNew = $notif->status == 'New';
                @endphp
                    @if($notif->category === 'Application')
                        <a href="{{route('application.show', $notif->applicant_id)}}" class="d-flex justify-content-between text-decoration-none text-dark gap-2 gap-md-3 py-3 px-3 py-md-4 px-md-4 {{$isNew ? 'bg-lightPrimary2 border-dark' : 'bg-white'}} {{$index > 0 ? 'border-top' : ''}} {{$loop->first ? 'rounded-top' : ''}} {{$loop->last ? 'rounded-bottom' : ''}}">
                            <div class="d-flex gap-2 gap-md-3 align-items-center">
                            <img src="{{asset('IMG/uploads/logo/' . $notif->applicant->job->company->logo)}}" class="flex-shrink-0" width="45" height="45" style="object-fit: contain;">
                            {!! '<div class="fs-8 text-truncate-2">'.$notif->title.' : '. $notif->description.'</div>' !!}
                            </div>
                            <p class="text-muted fs-9 d-flex flex-shrink-0 mb-0 ms-2">{{ $notif->created_at->shortDiff() }}</p>
                        </a>
                    @elseif($notif->category === 'Message')
                    <div class="d-flex gap-2 py-3 px-3 py-md-4 px-md-4 {{$isNew ? 'bg-lightPrimary2 border-dark' : 'bg-white'}} {{$index > 0 ? 'border-top' : ''}} {{$loop->first ? 'rounded-top' : ''}} {{$loop->last ? 'rounded-bottom' : ''}}">
                        <img src="{{asset('IMG/uploads/profile/' . $notif->sender->profile_image)}}" class="rounded-circle flex-shrink-0" style="width: 45px; height:45px; object-fit:cover;">
                        <div class="d-block w-100 overflow-hidden">
                            <div class="d-flex justify-content-between align-items-start">
                                {!! '<div class="fs-8 text-truncate-2 me-2">'.$notif->title.' '.$notif->created_at->diffForHumans().'</div>' !!}
                                <p class="text-muted fs-9 flex-shrink-0 mb-0 d-block d-md-none">{{ $notif->created_at->shortDiff() }}</p>
                            </div>
                            <div class="{{$isNew ? 'bg-white' : 'bg-main'}} rounded text-truncate-1 mb-2 fs-8 px-2 w-100 mt-1">
                                <p class="mb-0 py-1 w-100 text-truncate">{{$notif->description}}</p>
                            </div>
                            <a href="{{ route('message.page', ['active_tab' => $notif->sender->user_id]) }}"
                                class="btn btn-outline-primary rounded-pill px-4 px-md-5 pt-0 pb-1 fs-7">
                                Reply Message
                            </a>
                        </div>
                        <p class="text-muted fs-9 flex-shrink-0 mb-0 d-none d-md-block">{{ $notif->created_at->shortDiff() }}</p>
                    </div>
                    @endif
            @endforeach
            @else
            <div class="text-center py-6">
                <img src="{{asset('IMG/asset/notification_bell.png')}}" width="100">
                <h2 class="mt-2">No notifications yet!</h2>
                <p>We'll notify you when something arrives</p>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection
