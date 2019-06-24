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
            <form action="{{ route('createHikePost') }}" method="post" class="d-flex flex-column align-items-center">
                <div class="row">
                    @csrf
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="duration">Duration:</label>
                        <input type="text" class="form-control" name="duration" id="duration" placeholder="00:00:00" maxlength="8">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="distance">Distance (km)</label>
                        <input type="number" class="form-control" id="distance" name="distance" step=".01" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="avg_speed">Avg Speed (km/h)</label>
                        <input type="number" class="form-control" id="avg_speed" name="avg_speed" step=".1" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="kcal">Kcal</label>
                        <input type="number" class="form-control" id="kcal" name="kcal" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="steps">Steps</label>
                        <input type="number" class="form-control" id="steps" name="steps" maxlength="5">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="week">Week</label>
                        <input type="number" class="form-control" id="week" name="week" maxlength="2">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="month">Month</label>
                        <input type="number" class="form-control" id="month" name="month" maxlength="2">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Create Hike</button>
            </form>
    </div>

@endsection