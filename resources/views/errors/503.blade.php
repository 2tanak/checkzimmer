@extends('errors.minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))

@section('form')
    <small class="error-small-text">
        {!! $message ?? '' !!}
    </small>
    <h2 style="text-align:center;">{{ __('Please log in to enter the website') }}</h2>
    <form class="modal-form login" id="loginForm">
        <div class="text input-block">
            <div class="input-block-item">
                <input id="mail-phone" type="text">
                <label for="mail-phone">{{ __('Email or phone number') }}</label>
            </div>
        </div>
        <div class="password input-block">
            <div class="input-block-item">
                <input id="password" type="password">
                <label for="password">{{ __('Password') }}</label>
            </div>
        </div>
        <a class="entry login-link" href="#">{{ __('Login') }}</a>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            jQuery('.login-link').click(function(e) {
                e.preventDefault();
                jQuery.post('{{ route('api-login') }}', {
                    email: jQuery('#mail-phone').val(),
                    password: jQuery('#password').val()
                }, function(resp) {
                    if (resp.error) {
                        alert('Wrong credentials');
                        return;
                    }
                    document.location.reload();
                });


            });
            jQuery('.antialiased .input-block input').focus('input', function () {
                var parent = jQuery(this).closest('.antialiased .input-block-item');
                jQuery(parent).find('label').addClass('active');
            });
            jQuery('.antialiased .input-block input').blur(function () {
                var value = jQuery(this).val();
                var parent = jQuery(this).closest('.antialiased .input-block-item');
                if (value === '') {
                    jQuery(parent).find('label').removeClass('active');
                }
            });
        });

    </script>

    <style>
        .antialiased .error-logo-block {
            margin-bottom: 20px;
        }
        .antialiased .error-logo-block svg.logo-desctope {
            margin: auto;
        }
        .antialiased .error-small-text {
            display: block;
            width: 100%;
            text-align: center;
        }
        .antialiased .input-block {
            margin-bottom: 20px;
        }
        .antialiased .input-block input {
            border: 1px solid #c5c5c5;
            border-radius: 6px;
            width: 100%;
            height: 54px;
            outline: none;
            font-weight: 400;
            font-size: 18px;
            line-height: 100%;
            color: #333646;
            padding: 26px 16px 10px 16px;
        }
        .antialiased .input-block input:focus {
            background: #FFFFFF;
            border: 1px solid #FDB64E;
            box-shadow: 0 0 0 4px rgba(255, 240, 219, 0.9);
        }
        .antialiased .input-block label {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 16px;
            margin-bottom: 0;
            pointer-events: none;
            transition-duration: 0.3s;
        }
        .antialiased .input-block .input-block-item {
            position: relative;
        }
        .antialiased .input-block label.active {
            font-size: 11px;
            letter-spacing: 0.02em;
            top: 13px;
        }
        .antialiased a.login-link {
            width: 100%;
            height: 54px;
            background: #6bb63f;
            border-radius: 6px;
            font-weight: 400;
            font-size: 18px;
            line-height: 100%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            outline: none;
            transition: all 0.4s ease;
            margin: auto;
        }
        .antialiased a.login-link:hover,
        .antialiased a.login-link:active {
            background: #60a338;
            transition: all 0.4s ease;
        }
        @media (max-width: 640px) {
            .antialiased .error-content-block {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
        }
    </style>
@endsection
