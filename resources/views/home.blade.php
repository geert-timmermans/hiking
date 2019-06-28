@extends('layouts.app')

@section('title', 'Home')
@section('body_class', 'body_home')

@section('content')
    <div class="container">
        <div class="d-flex">
            <div class="container col-md-7 bg-secondary">
                <div class="row">
                    <div class="col-12">
                        <div class=""><a href="{{ route('hikes') }}" class="btn btn-info col-md-5">List Hikes</a></div>
                        <div class=""><a href="{{ route('createHike') }}" class="btn btn-info col-md-5">Add Hike</a></div>
                        <div class=""><a href="{{ route('editProfile') }}" class="btn btn-info col-md-5">Edit Profile</a></div>
                    </div>
                </div>
            </div>


            <div class="container col-md-5 bg-warning">
                <div class="row">
                    <div class="col-12">
                        <h1 class="mt-4">Welcome {{ Auth::user()->firstName }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
