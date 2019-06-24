@extends('layouts.app')

@section('title', 'Home')
@section('body_class', 'body_home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4 text-center">Welcome {{ Auth::user()->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-2 d-flex justify-content-center my-3"><a href="{{ route('hikes') }}" class="btn btn-info col-md-5">List Hikes</a></div>
        <div class="col-md-4 d-flex justify-content-center my-3"><a href="{{ route('createHike') }}" class="btn btn-info col-md-5">Add Hike</a></div>
    </div>
    <div class="row">
        <div class="col-md-4 offset-md-2 d-flex justify-content-center"><a href="#" class="btn btn-info col-md-5">Edit Hike</a></div>
        <div class="col-md-4 d-flex justify-content-center"><a href="{{ route('editProfile') }}" class="btn btn-info col-md-5">Edit Profile</a></div>
    </div>
</div>

@endsection
