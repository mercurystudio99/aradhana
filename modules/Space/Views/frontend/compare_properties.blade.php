@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/compare_template.css") }}"/>
    <script type="text/javascript" src="{{ asset("js/jquery.slim.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/popper.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("jquery.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("/module/vendor/js/vendor-register.js?_ver=".config('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset("js/chart.js") }}"></script>

@endsection
@section('content')
    <div class="bravo_detail_space">
        @include('Layout::parts.header_detail')

        <div class="bravo_content">
            <div class="container">
                <div class="row " >
                    @include('Space::frontend.layouts.compare.detail')
                </div>
            </div>     

        </div>
    </div>
@endsection

@section('footer')

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/space/js/single-space.js?_ver='.config('app.asset_version')) }}"></script>
@endsection
