@extends('layouts.app')

@section('title', 'Edit / Delete Hike')
@section('body_class', 'body_editHike')

@section('content')
<div class="container my-4 text-white">
    <div class="row">
        <div class="card bg-dark col-10 offset-1 col-md-8 offset-md-2 p-0 rounded">
            <div class="card-header text-center cardHeadBg rounded-top">
                Edit Hike
            </div>
            <div class="card-body rounded-bottom">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('editHikePost', $hike->id) }}" method="post" class="d-flex flex-column align-items-center">
                    <div class="row">
                        @csrf
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                            <label for="duration">Duration:</label>
                            <input type="text" class="form-control" id="duration" name="duration" value="{{ $hike->duration }}" maxlength="8">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                            <label for="distance">Distance (km)</label>
                            <input type="number" class="form-control" id="distance" name="distance" value="{{ $hike->distance }}" step=".01" maxlength="4">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                            <label for="avg_speed">Avg Speed (km/h)</label>
                            <input type="number" class="form-control" id="avg_speed" name="avg_speed" value="{{ $hike->avg_speed }}" step=".1" maxlength="4">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                            <label for="kcal">Kcal</label>
                            <input type="number" class="form-control" id="kcal" name="kcal" value="{{ $hike->kcal }}" maxlength="4">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                            <label for="steps">Steps</label>
                            <input type="number" class="form-control" id="steps" name="steps" value="{{ $hike->steps }}" maxlength="5">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                            <label for="week">Week</label>
                            <input type="number" class="form-control" id="week" name="week" value="{{ $hike->week }}" maxlength="2">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                            <label for="month">Month</label>
                            <input type="number" class="form-control" id="month" name="month" value="{{ $hike->month }}" maxlength="2">
                        </div>
                        <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{ $hike->date }}">
                        </div>
                    </div>

{{--                    buttons for desktop--}}
                    <div class="container my-3 divDesktop">
                        <div class="row d-flex justify-content-around">
                            <a href="{{ route('deleteHike', $hike->id) }}" class="btn btn-outline-danger text-white col-md-2">Delete</a>
                            <button class="btn btn-outline-success text-white col-md-2">Update</button>
                            <a href="{{ route('hikes') }}" class="btn btn-outline-primary text-white col-md-2">Back</a>
                        </div>
                    </div>

{{--                    buttons for mobile--}}
                    <div class="container my-2 divMobile">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-around">
                                <a href="{{ route('deleteHike', $hike->id) }}" class="btn btn-outline-danger text-white col-5">Delete</a>
                                <button class="btn btn-outline-success text-white col-5">Update</button>
                            </div>
                            <div class="col-12 d-flex justify-content-center mt-3">
                                <a href="{{ route('hikes') }}" class="btn btn-outline-primary text-white col-5">Back</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection