@extends('layouts.app')

@section('title', 'Create Hike')
@section('body_class', 'body_createHike')

@section('content')
    <div class="container my-4 text-white">
        <div class="row">
            <div class="card bg-dark col-10 offset-1 col-md-8 offset-md-2 p-0 rounded">
                <div class="card-header text-center cardHeadBg rounded-top">
                    Add Hike
                </div>
                <div class="card-body rounded-bottom">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('createHikePost') }}" method="post" class="d-flex flex-column align-items-center">
                        <div class="row">
                            @csrf
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                                <label for="duration">Duration:</label>
                                <input type="text" class="form-control" name="duration" id="duration" placeholder="00:00:00" maxlength="8">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                                <label for="distance">Distance (km)</label>
                                <input type="number" class="form-control" id="distance" name="distance" step=".01" maxlength="4">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                                <label for="avg_speed">Avg Speed (km/h)</label>
                                <input type="number" class="form-control" id="avg_speed" name="avg_speed" step=".1" maxlength="4">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                                <label for="kcal">Kcal</label>
                                <input type="number" class="form-control" id="kcal" name="kcal" maxlength="4">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                                <label for="steps">Steps</label>
                                <input type="number" class="form-control" id="steps" name="steps" maxlength="5">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                                <label for="week">Week</label>
                                <input type="number" class="form-control" id="week" name="week" maxlength="2">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-1">
                                <label for="month">Month</label>
                                <input type="number" class="form-control" id="month" name="month" maxlength="2">
                            </div>
                            <div class="form-group col-10 offset-1 col-md-5 offset-md-0">
                                <label for="date">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center my-3">
                            <a href="{{ URL::previous() }}" class="btn btn-outline-primary col-5 col-md-2 offset-md-1 text-white btnBackCreate">Back</a>
                            <button type="submit" class="btn btn-outline-success col-5 col-md-2 offset-1 offset-md-0 text-white btnCreateHike">Create Hike</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection