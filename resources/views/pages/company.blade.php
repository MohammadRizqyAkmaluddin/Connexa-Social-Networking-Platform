@extends('layouts.app')

@section('title', 'Company')

@section('content')
    <div class="p-3">
        <h1>Welcome back, {{ Auth::user()->name }}!</h1>
        <p>This is the home page content.</p>
    </div>
@endsection