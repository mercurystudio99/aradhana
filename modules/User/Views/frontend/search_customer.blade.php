@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link href="{{ asset('dist/frontend/module/hotel/css/hotel.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/vendor.css") }}"/>
    <script type="text/javascript" src="{{ asset("js/jquery.slim.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/popper.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>



@endsection
@section('content')
<div id="bravo_content-wrapper">

    @include('Layout::parts.header_detail')
    <div class="bravo_search_space">
        <div class="bravo_banner" >
            <div class="container">
                <h1 class='text-center'>
                    Other Vendors
                </h1>
                <p class='text-center banner_subtitle' >
                    <span><a href='/'>Home </a></span> / <span style='color:#0061df;'> Other Vendors</span>
                </p>
            </div>
        </div>


        <div class="container">
            @include('User::frontend.layouts.search.list-item')
        </div>
    </div>
</div>
@endsection

@section('footer')

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/space/js/space.js?_ver='.config('app.asset_version')) }}"></script>

@endsection
