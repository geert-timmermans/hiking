@extends('layouts.app')

@section('title', 'Home')
@section('body_class', 'body_home')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mt-4">Welcome {{ Auth::user()->name }}</h1>
        </div>
    </div>
</div>

@endsection
