@extends('jetstream::layouts.auth')

@section('title')
    Log In
@endsection

@section('content')
    @include('jetstream::components.authentication.login-form')
@endsection
