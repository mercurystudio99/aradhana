<form class="form bravo-form-register" method="post" action="{{route('auth.register.store')}}">
    @csrf
    <h3>Registration</h3>

    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="login_form" style='margin-bottom:25px;'>
                <input type="text" name="first_name" autocomplete="off" required />
                <label for="first_name" class="label-name">
                    <span class="content-name">
                        First Name
                    </span>
                    <span class="invalid-feedback error error-first_name"></span>
                </label>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="login_form" style='margin-bottom:25px;'>
                <input type="text" name="last_name" autocomplete="off" required />
                <label for="last_name" class="label-name">
                    <span class="content-name">
                        Last Name
                    </span>
                    <span class="invalid-feedback error error-last_name"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="login_form" style='margin-bottom:25px;'>
        <input type="text" name="phone" autocomplete="off" required />
        <label for="phone" class="label-name">
            <span class="content-name">
                Phone
            </span>
            <span class="invalid-feedback error error-phone"></span>
        </label>
    </div>
    <div class="login_form" style='margin-bottom:25px;'>
        <input type="email" name="email" autocomplete="off" required />
        <label for="email" class="label-name">
            <span class="content-name">
                Email
            </span>
            <span class="invalid-feedback error error-email"></span>
        </label>
    </div>
    <div class="login_form" style='margin-bottom:25px;'>
        <input type="password" name="password" autocomplete="off" required />
        <label for="password" class="label-name">
            <span class="content-name">
                Password
            </span>
            <span class="invalid-feedback error error-password"></span>
        </label>
    </div>
    <div style='margin-bottom:10px; margin-top:30px;'>
    
        <select class="form-control" name="register_role" >
            <option value='2'>Customer</option>
            <option value='5'>Architecture</option>
            <option value='6'>Painter</option>
            <option value='7'>Int Designer</option>
            <option value='4'>Other Vendor</option>
        </select>
    </div>
    <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" name="term" class="mr5">
            {!! __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('booking_term_conditions'))]) !!}
            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div>
    @if(setting_item("user_enable_register_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'register')}}
        </div>
        <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
    @endif
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-submit">
            {{ __('Register') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="advanced">
            <p class="text-center f14 c-grey">{{__("or continue with")}}</p>
            <div class="row">
                @if(setting_item('facebook_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('/social-login/facebook')}}" class="btn btn_login_fb_link"
                           data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            {{__('Facebook')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('google_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/google')}}" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            {{__('Google')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('twitter_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/twitter')}}" class="btn btn_login_tw_link" data-channel="twitter">
                            <i class="input-icon fa fa-twitter"></i>
                            {{__('Twitter')}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif
    <div class="c-grey f14 text-center">
       {{__(" Already have an account?")}}
        <a href="#" data-target="#login" data-toggle="modal">{{__("Log In")}}</a>
    </div>
</form>
