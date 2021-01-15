@extends('errors.minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))

@section('form')
    <small class="">
        {!! $message ?? '' !!}
    </small>
    <h2>{{ __('Please log in to enter the website') }}</h2>
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
        });
    </script>
@endsection
