@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/space/css/space.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/template.css") }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/frontend.min.css") }}"/>

    <script type="text/javascript" src="{{ asset("js/jquery.slim.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/popper.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("jquery.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("/module/vendor/js/vendor-register.js?_ver=".config('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset("js/chart.js") }}"></script>
    
@endsection
@section('content')
    @include('Space::frontend.layouts.details.side-compare') 
    <div class="bravo_detail_space">
        <!-- @include('Space::frontend.layouts.details.space-banner') -->
        @include('Layout::parts.header_detail')
        
        <div class="bravo_content">
            <div class="container">
                <div class="row " >
                    @php $review_score = $row->review_data @endphp   
                    @include('Space::frontend.layouts.details.property-detail')
                </div>
            </div>         
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-9 pt-5">
                        @php $review_score = $row->review_data @endphp
                        @include('Space::frontend.layouts.details.space-detail')
                    </div>
                    <div class="col-md-12 col-lg-3 pt-5">
                        @include('Space::frontend.layouts.details.space-form-book')
                    </div>
                </div>
                <div class="row end_tour_sticky" style='padding-top:50px;'>
                    <div class="col-md-12">
                        @include('Space::frontend.layouts.details.space-related')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl:"{{get_file_url(setting_item("space_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
			no_date_select:'{{__('Please select Start and End date')}}',
            no_guest_select:'{{__('Please select at least one guest')}}',
            load_dates_url:'{{route('space.vendor.availability.loadDates')}}',
            name_required:'{{ __("Name is Required") }}',
            email_required:'{{ __("Email is Required") }}',
        };
    </script>
    <script type="text/javascript" id="elementor-frontend-js-before">
        var elementorFrontendConfig = {"environmentMode":{"edit":false,"wpPreview":false,"isScriptDebug":false},"i18n":{"shareOnFacebook":"Share on Facebook","shareOnTwitter":"Share on Twitter","pinIt":"Pin it","download":"Download","downloadImage":"Download image","fullscreen":"Fullscreen","zoom":"Zoom","share":"Share","playVideo":"Play Video","previous":"Previous","next":"Next","close":"Close"},"is_rtl":false,"breakpoints":{"xs":0,"sm":480,"md":768,"lg":1025,"xl":1440,"xxl":1600},"responsive":{"breakpoints":{"mobile":{"label":"Mobile","value":767,"direction":"max","is_enabled":true,"default_value":767},"mobile_extra":{"label":"Mobile Extra","value":880,"direction":"max","is_enabled":false,"default_value":880},"tablet":{"label":"Tablet","value":1024,"direction":"max","is_enabled":true,"default_value":1024},"tablet_extra":{"label":"Tablet Extra","value":1365,"direction":"max","is_enabled":false,"default_value":1365},"laptop":{"label":"Laptop","value":1620,"direction":"max","is_enabled":false,"default_value":1620},"widescreen":{"label":"Widescreen","value":2400,"direction":"min","is_enabled":false,"default_value":2400}}},"version":"3.3.1","is_static":false,"experimentalFeatures":{"e_dom_optimization":true,"a11y_improvements":true,"e_import_export":true,"landing-pages":true,"elements-color-picker":true,"admin-top-bar":true},"urls":{"assets":"https:\/\/demoapus2.com\/houzing\/wp-content\/plugins\/elementor\/assets\/"},"settings":{"page":[],"editorPreferences":[]},"kit":{"active_breakpoints":["viewport_mobile","viewport_tablet"],"global_image_lightbox":"yes","lightbox_enable_counter":"yes","lightbox_enable_fullscreen":"yes","lightbox_enable_zoom":"yes","lightbox_enable_share":"yes","lightbox_title_src":"title","lightbox_description_src":"description"},"post":{"id":188,"title":"New%20Apartment%20Nice%20Wiew%20%E2%80%93%20Houzing","excerpt":"","featuredImage":"https:\/\/demoapus2.com\/houzing\/wp-content\/uploads\/2021\/07\/p11-1024x546.jpg"}};
    </script>
    
    <script type="text/javascript" src="{{ asset("js/webpack.runtime.min.js") }}" id="elementor-webpack-runtime-js"></script>
    <script type="text/javascript" src="{{ asset("js/frontend-modules.min.js") }}" id="elementor-frontend-modules-js"></script>
    <script type="text/javascript" src="{{ asset("js/swiper.min.js") }}" id="swiper-js"></script>
    <script type="text/javascript" src="{{ asset("js/share-link.min.js") }}" id="share-link-js"></script>
    <script type="text/javascript" src="{{ asset("js/dialog.min.js") }}" id="elementor-dialog-js"></script>
    <script type="text/javascript" src="{{ asset("js/frontend.min.js") }}" id="elementor-frontend-js"></script>
    <script type="text/javascript" src="{{ asset("js/preloaded-modules.min.js") }}"></script>

    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>
    <script type="text/javascript" src="{{ asset("libs/sticky/jquery.sticky.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/space/js/single-space.js?_ver='.config('app.asset_version')) }}"></script>
@endsection
