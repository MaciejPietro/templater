@php
    $user = Auth::user();
@endphp

@extends('front.layout_panel')

@section('content')
    <h1 class="font-bold text-3xl">Hi, {{ $user->first_name }}</h1>
    <p class="mt-10">Click <a href="{{ route('create') }}"
            class="text-blue-500 font-bold hover:text-blue-400 transition-colors">CREATE</a> in sidebar to start
        creating your mail footer with our predefined template.
    </p>
    {{-- @if (auth()->user()->isAdmin())
        <livewire:application.admin-list />
    @else
        <livewire:application.applications-list />
    @endif --}}
@endsection
