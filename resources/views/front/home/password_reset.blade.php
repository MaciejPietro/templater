@extends('front.layout')

@section('content')
  <livewire:user.password-reset :token="$token" :email="$email" />
@endsection
