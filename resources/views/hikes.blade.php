@extends('layouts.app')

@section('title', 'Hikes')
@section('body_class', 'body_hikes')

@section('content')
    <div class="container my-4">
        <div class="row my-3">
            <div class="col-12 col-md-4 offset-md-8 my-md-4">
                @if(isset($message))
                    <div class="text-danger bg-warning text-center font-weight-bold mb-2 w-100">{!! $message !!}</div>
                @else
                    <br>
                @endif
                <form action="{{ route('search') }}" method="post" class="input-group d-flex justify-content-center">
                    @csrf
                    <input type="text" class="font-weight-bold form-control col-2 col-md-3" id="searchMin" name="searchMin" placeholder="Min.." maxlength="8">
                    <input type="text" class="font-weight-bold form-control col-2 col-md-3" id="searchMax" name="searchMax" placeholder="Max.." maxlength="8">
                    <select id="inputGroupSelect04" class="custom-select col-4 col-md-4" name="searchCol">
                        <option selected>Choose..</option>
                        <option value="duration">Duration</option>
                        <option value="distance">Distance</option>
                        <option value="avg_speed">Avg Speed</option>
                        <option value="kcal">Kcal</option>
                        <option value="steps">Steps</option>
                        <option value="week">Week</option>
                        <option value="month">Month</option>
                    </select>
                    <div class="input-group-append col-2 col-md-3 p-0">
                        <button type="submit" name="submitSearch" class="btn btn-secondary">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 paginationText mb-2">
                <form action="{{ route('perPage') }}" method="get">
                    Results on page:
                    <input type="submit" class="paginationLinks paginationLinksBorder" name="resultsPerPage" value="25">
                    <input type="submit" class="paginationLinks paginationLinksBorder" name="resultsPerPage" value="50">
                    <input type="submit" class="paginationLinks" name="resultsPerPage" value="100">
                </form>
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
                <form action="{{ route('perPage') }}" method="get">
                    Results on page:
                    <input type="submit" class="paginationLinks paginationLinksBorder" name="resultsPerPage" value="25">
                    <input type="submit" class="paginationLinks paginationLinksBorder" name="resultsPerPage" value="50">
                    <input type="submit" class="paginationLinks" name="resultsPerPage" value="100">
                </form>
            </div>
{{--            @if(Route::current()->getName() == 'hikes' || Route::current()->getName() == 'perPage')--}}
                <div class="col-12 d-flex justify-content-center mt-3 mt-md-0">
                    {{ $hikes->links() }}
                </div>
{{--            @endif--}}
        </div>
    </div>
{{--    script for choosing how many search result on the page--}}

{{--    script for clickable row in table--}}
    <script src="{{ asset('js/editHikes.js') }}" defer></script>

@endsection