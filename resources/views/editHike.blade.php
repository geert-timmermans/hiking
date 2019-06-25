@extends('layouts.app')

@section('title', 'Edit / Delete Hike')
@section('body_class', 'body_editHike')

@section('content')

    <div class="card uper">
        <div class="card-header">
            Edit Hike
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('hikes.edit', $hike->id) }}" method="post" class="d-flex flex-column align-items-center">
                <div class="row">
                    @csrf
                    @method('PATCH')
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="duration">Duration:</label>
                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $hike->duration }}" maxlength="8">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="distance">Distance (km)</label>
                        <input type="number" class="form-control" id="distance" name="distance" value="{{ $hike->distance }}" step=".01" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="avg_speed">Avg Speed (km/h)</label>
                        <input type="number" class="form-control" id="avg_speed" name="avg_speed" value="{{ $hike->avg_speed }}" step=".1" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="kcal">Kcal</label>
                        <input type="number" class="form-control" id="kcal" name="kcal" value="{{ $hike->kcal }}" maxlength="4">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="steps">Steps</label>
                        <input type="number" class="form-control" id="steps" name="steps" value="{{ $hike->steps }}" maxlength="5">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="week">Week</label>
                        <input type="number" class="form-control" id="week" name="week" value="{{ $hike->week }}" maxlength="2">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-1">
                        <label for="month">Month</label>
                        <input type="number" class="form-control" id="month" name="month" value="{{ $hike->month }}" maxlength="2">
                    </div>
                    <div class="form-group col-10 offset-1 col-md-4 offset-md-2">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="{{ $hike->date }}">
                    </div>
                </div>
                <button class="btn btn-primary">Update Hike</button>
            </form>
        </div>


    </div>

@endsection