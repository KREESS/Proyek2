@extends('jetstream::layouts.auth')

@section('title')
    Register
@endsection

@section('content')
    @include('jetstream::components.authentication.register-form')
@endsection
