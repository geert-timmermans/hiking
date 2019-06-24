@extends('layouts.app')

@section('title', 'Hikes')
@section('body_class', 'body_hikes')

@section('content')
    <br>
    <input class="form-control col-6 offset-3" id="searchInput" type="text" placeholder="Search..">
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Duration</td>
                <td>Distance (km)</td>
                <td>Avg Speed (km/h)</td>
                <td>Kcal</td>
                <td>Steps</td>
                <td>Week</td>
                <td>Month</td>
            </tr>
        </thead>
        <tbody id="hikeTable">
            @foreach($hikes as $hike)
                <tr>
                    <td>{{ $hike->duration }}</td>
                    <td>{{ $hike->distance }}</td>
                    <td>{{ $hike->avg_speed }}</td>
                    <td>{{ $hike->kcal }}</td>
                    <td>{{ $hike->steps }}</td>
                    <td>{{ $hike->week }}</td>
                    <td>{{ $hike->month }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function(){
            $("#searchInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#hikeTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection