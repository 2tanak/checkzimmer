<div class="modal-overlay modal-login-item">

    <div class="modal-block modal-login show">
        <div class="modal-content-item">
            <div class="modal-close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                </svg>
            </div>
            <div class="title">{{ __('Login title') }}</div>
			<div style="text-align:center;padding:10px 0px" class="error-text error-login">не найден логин или пароль</div>
            <form class="modal-form login">
                <div class="text input-block">
                    <div class="input-block-item">
                        <input id="mail-phone" type="text">
                        <label for="mail-phone">{{ __('Email or phone number') }}</label>
                    </div>
                    <div class="error-text">{{ __('You have not specified Email') }}</div>
                </div>
                <div class="password input-block">
                    <div class="input-block-item">
                        <input id="password" type="password">
                        <label for="password">{{ __('Password') }}</label>
                        <a class="forgot-password desctop-link" href="#">{{ __('Forgot password?') }}</a>
                        <a class="forgot-password mobile-link" href="#">{{ __('Forgot') }}?</a>
                    </div>
                    <div class="error-text">{{ __('You did not enter a password') }}</div>
                </div>
                <a class="entry login-link" href="#">{{ __('Login button') }}</a>
            </form>
        <!-- <div class="or">{{ __('Or') }}</div>
                    <a class="facebook-entry" href="#">
                        <img class="standart" src="/svg/i-facebook-cube.svg" alt="Facebook Icon">
                        <img class="hover" src="/svg/i-facebook-cube-hover.svg" alt="Facebook Icon">
                        {{ __('Login with Facebook') }}
            </a> -->
            <div class="new">{{ __('New user') }}? <a href="/registration">{{ __('Registration') }}</a></div>
        </div>
    </div>

    <div class="modal-block modal-forgot-password">
        <div class="modal-content-item">
            <div class="modal-close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                </svg>
            </div>
            <div class="title">{{ __('Password recovery') }}</div>
            <form>
                <div class="email input-block">
                    <div class="input-block-item">
                        <input id="mail" type="mail">
                        <label for="mail">{{ __('Enter your email') }}</label>
                    </div>
                    <div class="error-text">{{ __('You have not specified Email') }}</div>
                </div>
                <a class="entry forgot-password-link" href="#">{{ __('Reset password') }}</a>
                <div class="new">{{ __('Remember your password?') }} <a href="#" class="remember-login ">{{ __('Login') }}</a></div>
            </form>
        </div>
    </div>

    <div class="modal-block modal-success">
        <div class="modal-content-item">
            <div class="modal-close">
                <svg width="11" height="11" viewBox="0 0 11 11" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
                </svg>
            </div>
            <img src="/svg/i-success-big.svg" alt="Success Icon">
            <div class="title">{{ __('Thank you') }}!</div>
            <div class="description">{{ __('Password recovery instructions have been sent to your email address') }}</div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        jQuery('#password').on('input', function () {
            var value = jQuery(this).val();
            if (value !== '') {
                jQuery('a.forgot-password').addClass('active');
            } else {
                jQuery('a.forgot-password').removeClass('active');
            }
        });

        jQuery('.personal-area-link').click(function (e) {
            e.preventDefault();
            jQuery('.modal-overlay.modal-login-item').addClass('modal-show');
        });

        jQuery('a.forgot-password').click(function (e) {
            e.preventDefault();
            jQuery('.modal-login').removeClass('show');
            jQuery('.modal-forgot-password').addClass('show');
        });
        jQuery('a.remember-login').click(function (e) {
            e.preventDefault();
            jQuery('.modal-forgot-password').removeClass('show');
            jQuery('.modal-login').addClass('show');
        });

        jQuery('a.forgot-password-link').click(function (e) {
            e.preventDefault();
            jQuery('.modal-forgot-password').removeClass('show');
            jQuery('.modal-success').addClass('show');
        });

        jQuery('.modal-login-item .modal-close').click(function () {
            jQuery('.modal-overlay').removeClass('modal-show');
        });

        jQuery('.modal-block input').focus(function () {
            var parent = jQuery(this).closest('.input-block-item, .modal-block');
            jQuery(parent).find('label').addClass('active');
        });

        jQuery('.modal-block input').blur(function () {
            var value = jQuery(this).val();
            var parent = jQuery(this).closest('.input-block-item, .modal-block');
            if (value === '') {
                jQuery(parent).find('label').removeClass('active');
            }
        });

    });
</script>
