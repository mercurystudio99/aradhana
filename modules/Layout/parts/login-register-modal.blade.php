

<div id="login" class="modal fade login" data-effect="fadeIn" aria-hidden="true"> 
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content ">
            <div class="modal-header">
                <nav class="login_tabs">
                    <label class="login_nav" for="login_form">LOGIN</label>
                    <label class="login_nav" for="register_form">REGISTER</label>
                </nav>
                <button type="button" class="close login_close" data-dismiss="modal" aria-hidden="true" ><i class='fa fa-times'></i></button>
            </div>
            <div class="modal-body relative">
                <div class="content">
                    <div class="section tab-pane active in apus_login_register_form">
                        @include('Layout::auth/login-form')
                    </div>

                    <div class="section tab-pane in apus_login_register_form">
                        @include('Layout::auth/register-form')
                    </div>
                    <input type="radio" name="tabs" id="login_form" hidden checked />
                    <input type="radio" name="tabs" id="register_form" hidden />
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade login" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content relative">
            <div class="modal-header">
                <h4 class="modal-title">{{__('Sign Up')}}</h4>
                <span class="c-pointer" data-dismiss="modal" aria-label="Close">
                    <i class="input-icon field-icon fa">
                        <img src="{{url('images/ico_close.svg')}}" alt="close">
                    </i>
                </span>
            </div>
            <div class="modal-body">
                @include('Layout::auth/register-form')
            </div>
        </div>
    </div>
</div>