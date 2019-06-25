@extends('layouts.app')

@section('title', 'Hikes')
@section('body_class', 'body_hikes')

@section('content')
    <br>
    <form action="" class="input-group">
        <input type="search" class="form-control col-md-1 offset-md-4" id="searchMin" name="search" placeholder="Min.." maxlength="8">
        <input type="search" class="form-control col-md-1" id="searchMax" name="search" placeholder="Max..." maxlength="8">
        <select id="inputGroupSelect04" class="custom-select col-md-1">
            <option selected>Choose...</option>
            <option value="1">Duration</option>
            <option value="2">Distance</option>
            <option value="3">Avg Speed</option>
            <option value="4">Kcal</option>
            <option value="5">Steps</option>
            <option value="6">Week</option>
            <option value="7">Month</option>
        </select>
        <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <br>
    <table class="table table-sm table-striped">
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
                    @auth
{{--                        <td><a href="{{ route('editHike', $hike->id) }}">{{ $hike->duration }}</a></td>--}}
                <tr class="clickable-row" data-href="{{ route('editHike', $hike->id) }}">

                    @else
                <tr>
                    @endauth
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

{{--    script for choosing how many search result on the page--}}

{{--    script for pagination--}}

{{--    script for searchbar--}}
{{--    <script>--}}
{{--        $(document).ready(function(){--}}
{{--            $("#searchInput").on("keyup", function() {--}}
{{--                var value = $(this).val().toLowerCase();--}}
{{--                $("#hikeTable tr").filter(function() {--}}
{{--                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--    script for clickable row in table--}}
    <script>
        $(document).ready(function () {
           $(".clickable-row").click(function () {
              window.document.location = $(this).data("href");
           });
        });
    </script>
@endsection