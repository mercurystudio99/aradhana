@if(!is_api())
	<div class="bravo_footer">
		<div class="mailchimp" style='background-color:#0061de;margin-top:0px !important'>
			<div class="container" >
				<div class="row">
					<div class="col-xs-12 col-lg-12 ">
						<div class="row">
							<div class="col-xs-12  col-md-12 col-lg-12 text-center">
								<h2 style='color:white'>Become a Real Estate Agent</h2>
							</div>
							<div class="col-xs-12  col-md-12 col-lg-12 text-center">
								<p style='color:white'>We work only with be best companies aound the globe</p>
							</div>
							<div class="col-xs-12  col-md-12 col-lg-12 text-center" style="padding-top:20px; ">
								<button type="submit" class="btn btn-submit" style='color:#0061df'>{{__('REGISTER NOW')}}
									
								</button>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-footer" style='background-color:#10174B;margin-bottom:0px !important;margin-top:0px !important;'>
			<div class="container" style='margin-top:0px !important;'>
				<div class="row">
					@if($list_widget_footers = setting_item_with_lang("list_widget_footer"))
                        <?php $list_widget_footers = json_decode($list_widget_footers); ?>
						@foreach($list_widget_footers as $key=>$item)
							<div class="col-lg-{{$item->size ?? '3'}} col-md-6" >
								<div class="nav-footer">
									<div class="title" >
										{{$item->title}}
									</div>
									<div class="context" >
										{!! $item->content  !!}
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<div class="copy-right" style='background-color:#10174B; color:white !important;'>
			<div class="container context">
				<div class="row">
					<div class="col-md-12">
						{!! clean(setting_item_with_lang("footer_text_left"))  !!}
						<div class="f-visa">
							{!! clean(setting_item_with_lang("footer_text_right"))  !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif

@include('Layout::parts.login-register-modal')
@include('Layout::parts.chat')
@include('Popup::frontend.popup')
@if(Auth::check())
	@include('Media::browser')
@endif
<link rel="stylesheet" href="{{asset('libs/flags/css/flag-icon.min.css')}}">

{!! \App\Helpers\Assets::css(true) !!}

{{--Lazy Load--}}
<script src="{{asset('libs/lazy-load/intersection-observer.js')}}"></script>
<script async src="{{asset('libs/lazy-load/lazyload.min.js')}}"></script>
<script>
    // Set the options to make LazyLoad self-initialize
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        // ... more custom settings?
    };

    // Listen to the initialization event and get the instance of LazyLoad
    window.addEventListener('LazyLoad::Initialized', function (event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);


</script>
<script src="{{ asset('libs/lodash.min.js') }}"></script>
<script src="{{ asset('libs/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('libs/vue/vue'.(!env('APP_DEBUG') ? '.min':'').'.js') }}"></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('libs/bootbox/bootbox.min.js') }}"></script>
@if(Auth::check())
	<script src="{{ asset('module/media/js/browser.js?_ver='.config('app.asset_version')) }}"></script>
@endif
<script src="{{ asset('libs/carousel-2/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/moment.min.js") }}"></script>
<script type="text/javascript" src="{{ asset("libs/daterange/daterangepicker.min.js") }}"></script>
<script src="{{ asset('libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('js/functions.js?_ver='.config('app.asset_version')) }}"></script>

@if(
    setting_item('tour_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('car_location_search_style')=='autocompletePlace' || setting_item('space_location_search_style')=='autocompletePlace' || setting_item('hotel_location_search_style')=='autocompletePlace' || setting_item('event_location_search_style')=='autocompletePlace'
)
	{!! App\Helpers\MapEngine::scripts() !!}
@endif
<script src="{{ asset('libs/pusher.min.js') }}"></script>
<script src="{{ asset('js/home.js?_ver='.config('app.asset_version')) }}"></script>

@if(!empty($is_user_page))
	<script src="{{ asset('module/user/js/user.js?_ver='.config('app.asset_version')) }}"></script>
@endif
@if(setting_item('cookie_agreement_enable')==1 and request()->cookie('booking_cookie_agreement_enable') !=1 and !is_api()  and !isset($_COOKIE['booking_cookie_agreement_enable']))
	<div class="booking_cookie_agreement p-3 d-flex fixed-bottom">
		<div class="content-cookie">{!! clean(setting_item_with_lang('cookie_agreement_content')) !!}</div>
		<button class="btn save-cookie">{!! clean(setting_item_with_lang('cookie_agreement_button_text')) !!}</button>
	</div>
	<script>
        var save_cookie_url = '{{route('core.cookie.check')}}';
	</script>
	<script src="{{ asset('js/cookie.js?_ver='.config('app.asset_version')) }}"></script>
@endif

@if(setting_item('user_enable_2fa'))
    @include('auth.confirm-password-modal')
    <script src="{{asset('/module/user/js/2fa.js')}}"></script>
@endif

{!! \App\Helpers\Assets::js(true) !!}

@yield('footer')

@php \App\Helpers\ReCaptchaEngine::scripts() @endphp
