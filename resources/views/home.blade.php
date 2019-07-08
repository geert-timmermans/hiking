@extends('layouts.app')

@section('title', 'Home')
@section('body_class', 'body_home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-1 d-flex flex-column justify-content-center align-items-center">
                <a href="{{ route('hikes') }}" class="btn btn-info w-50 my-3">List Hikes</a>
                <a href="{{ route('createHike') }}" class="btn btn-info w-50 my-3">Add Hike</a>
                <a href="{{ route('editProfile') }}" class="btn btn-info w-50 my-3">Edit Profile</a>
            </div>
            <div class="col-md-5 textHome">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="mt-4">Welcome {{ Auth::user()->firstName }}</h1>
                        </div>
                        <ul class="col-12 ulHome">
                            <li class="d-flex">
                                <div class="font-weight-bold col-md-4">First name:</div>
                                <div class="col-md-8">{{ Auth::user()->firstName }}</div>
                            </li>
                            <li class="d-flex">
                                <div class="font-weight-bold col-md-4">Name:</div>
                                <div class="col-md-8">{{ Auth::user()->name }}</div>
                            </li>
                            <li class="d-flex">
                                <div class="font-weight-bold col-md-4">Email:</div>
                                <div class="col-md-8">{{ Auth::user()->email }}</div>
                            </li>
                            <li class="d-flex">
                                <div class="font-weight-bold col-md-4">Location:</div>
                                <div class="col-md-8">{{ Auth::user()->location }}</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
