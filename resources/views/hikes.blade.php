@extends('layouts.app')

@section('title', 'Hikes')
@section('body_class', 'body_hikes')

@section('content')
    <div class="container mt-mb-4">
       <search-component></search-component>
        <div class="row">
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

{{--            table for desktop--}}
            <div class="col-12 divDesktop">
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

{{--            table for Mobile--}}
            <div class="col-12 divMobile">
                <table class="table table-sm table-bordered table-hover table-dark text-white text-center">
                    <thead class="theadBg">
                        <tr>
                            <th>Duration</th>
                            <th>Distance (km)</th>
                            <th>Avg Speed (km/h)</th>
                            <th>Kcal</th>
                            <th>Steps</th>
                        </tr>
                    </thead>
                    <tbody id="hikeTable" class="">
                        @foreach($hikes as $hike)
                                @auth
                            <tr class="clickable-row" data-href="{{ route('editHike', $hike->id) }}">

                                @else
                            <tr>
                                @endauth
                                    <td>{{ $hike->duration }}</td>
                                    <td>{{ $hike->distance }}</td>
                                    <td>{{ $hike->avg_speed }}</td>
                                    <td>{{ $hike->kcal }}</td>
                                    <td>{{ $hike->steps }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
        </div>
        <div class="row mb-3 mb-md-0">
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
            <div class="col-12 d-flex justify-content-center mt-3 mt-md-0">
                {{ $hikes->links() }}
            </div>
        </div>
    </div>
{{--    script for choosing how many search result on the page--}}

{{--    script for clickable row in table--}}
    <script src="{{ asset('js/editHikes.js') }}" defer></script>
@endsection