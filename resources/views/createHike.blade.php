@extends('layouts.app')

@section('title', 'Create Hike')
@section('body_class', 'body_createHike')

@section('content')

    <div class="card-header">
        Add Hike
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('createHikePost') }}" method="post">

            </form>
    </div>

@endsection