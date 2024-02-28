@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/detail.css") }}"/>



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
        @include('User::frontend.layouts.details.top-detail')

    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            new BravoMapEngine('map_content1', {
                disableScripts: true,
                fitBounds: true,
                center: [51.519592, -0.226346],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([51.519592, -0.226346], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item('space_icon_marker_map'),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
        })
    </script>
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/space/js/single-space.js?_ver='.config('app.asset_version')) }}"></script>
@endsection
