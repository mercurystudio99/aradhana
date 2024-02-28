
<form class="bravo-form-login" method="POST" action="{{ route('login') }}">
    <input type="hidden" name="redirect" value="{{request()->query('redirect')}}">
    @csrf
    <h3>Sign In</h3>

    
    <div class="login_form" style='margin-bottom:25px;'>
        <input type="text" name="email" autocomplete="off" required />
        <label for="email" class="label-name">
            <span class="content-name">
                Username Or Email
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

    <div class="form-group">
        <div class="d-flex justify-content-between">
            <label for="remember-me" class="mb0">
                <input type="checkbox" name="remember" id="remember-me" value="1"> {{__('Keep me signed in')}} <span class="checkmark fcheckbox"></span>
            </label>
            <a href="{{ route("password.request") }}" style='color:blue;text-decoration:underline;'>{{__('Lost your password?')}}</a>
        </div>
    </div>
    @if(setting_item("user_enable_login_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'login')}}
        </div>
    @endif
    <div class="error message-error invalid-feedback"></div>
    <div class="form-group">
        <button class="btn btn-primary form-submit" type="submit">
            {{ __('SignIn') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>
    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="advanced">
            <p class="text-center f14 c-grey">{{__('or continue with')}}</p>
            <div class="row">
                @if(setting_item('facebook_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('/social-login/facebook')}}"class="btn btn_login_fb_link" data-channel="facebook">
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
  
</form>
