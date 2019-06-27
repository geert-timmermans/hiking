@extends('layouts.app')

@section('title', 'Hikes')
@section('body_class', 'body_hikes')

@section('content')
    <div class="container mt-mb-4">
        <div class="row mb-3">
            <div class="col-md-4 offset-md-8 my-md-4">
                <form action="" class="input-group">
                    <input type="number" class="form-control col-md-3" id="searchMin" name="search" placeholder="Min.." maxlength="8">
                    <input type="number" class="form-control col-md-3" id="searchMax" name="search" placeholder="Max.." maxlength="8">
                    <select id="inputGroupSelect04" class="custom-select col-md-4">
                        <option selected>Choose..</option>
                        <option value="1">Duration</option>
                        <option value="2">Distance</option>
                        <option value="3">Avg Speed</option>
                        <option value="4">Kcal</option>
                        <option value="5">Steps</option>
                        <option value="6">Week</option>
                        <option value="7">Month</option>
                    </select>
                    <div class="input-group-append col-md-3 p-0">
                        <button type="submit" class="btn btn-secondary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center">
                {{ $hikes->links() }}
            </div>
            <div class="col-md-3 paginationText mb-2">
                Results on page:
                <a href="#" class="paginationLinks paginationLinksBorder">25</a>
                <a href="#" class="paginationLinks paginationLinksBorder">50</a>
                <a href="#" class="paginationLinks">100</a>
                {{--                <form action="{{ route('pagination') }}">--}}
                {{--                    <select class="custom-select col-md-3" onchange="location = this.value">--}}
                {{--                        <option selected>10</option>--}}
                {{--                        <option value="/hiking?25">25</option>--}}
                {{--                        <option value="/hiking?50">50</option>--}}
                {{--                        <option value="/hiking?all">All</option>--}}
                {{--                    </select>--}}
                {{--                </form>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-hover table-dark text-white text-center">
                    <thead class="theadBg">
                        <tr>
                            <th class="tableWidthBig">Duration</th>
                            <th class="tableWidthBig">Distance (km)</th>
                            <th class="tableWidthBig">Avg Speed (km/h)</th>
                            <th class="tableWidthSmall">Kcal</th>
                            <th class="tableWidthSmall">Steps</th>
                            <th class="tableWidthSmall">Week</th>
                            <th class="tableWidthSmall">Month</th>
                        </tr>
                    </thead>
                    <tbody id="hikeTable" class="">
                        @foreach($hikes as $hike)
                                @auth
                            <tr class="clickable-row" data-href="{{ route('editHike', $hike->id) }}">

                                @else
                            <tr>
                                @endauth
                                    <td class="tableWidthBig">{{ $hike->duration }}</td>
                                    <td class="tableWidthBig">{{ $hike->distance }}</td>
                                    <td class="tableWidthBig">{{ $hike->avg_speed }}</td>
                                    <td class="tableWidthSmall">{{ $hike->kcal }}</td>
                                    <td class="tableWidthSmall">{{ $hike->steps }}</td>
                                    <td class="tableWidthSmall">{{ $hike->week }}</td>
                                    <td class="tableWidthSmall">{{ $hike->month }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
        </div>
        <div class="row">
            <div class="col-md-3 paginationText">
                Results on page:
                <a href="#" class="paginationLinks paginationLinksBorder">25</a>
                <a href="#" class="paginationLinks paginationLinksBorder">50</a>
                <a href="#" class="paginationLinks">100</a>
                {{--                <form action="{{ route('pagination') }}">--}}
                {{--                    <select class="custom-select col-md-3" onchange="location = this.value">--}}
                {{--                        <option selected>10</option>--}}
                {{--                        <option value="/hiking?25">25</option>--}}
                {{--                        <option value="/hiking?50">50</option>--}}
                {{--                        <option value="/hiking?all">All</option>--}}
                {{--                    </select>--}}
                {{--                </form>--}}
            </div>
            <div class="col-12 d-flex justify-content-center">
                {{ $hikes->links() }}
            </div>
        </div>
    </div>
{{--    script for choosing how many search result on the page--}}

{{--    script for clickable row in table--}}
    <script>
        $(document).ready(function () {
           $(".clickable-row").click(function () {
              window.document.location = $(this).data("href");
           });
        });
    </script>
@endsection