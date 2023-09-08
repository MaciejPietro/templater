@php
    $user = Auth::user();
@endphp

@extends('front.layout_panel')

@section('content')
    <h1 class="font-bold text-3xl">Users list</h1>
    {{-- <p class="mt-10">Fill all inputs and copy final email footer.</p> --}}
    {{-- @if (auth()->user()->isAdmin())
        <livewire:application.admin-list />
    @else
        <livewire:application.applications-list />
    @endif --}}


    {{-- <livewire:create.edit /> --}}
    <livewire:user.users-list />
@endsection
