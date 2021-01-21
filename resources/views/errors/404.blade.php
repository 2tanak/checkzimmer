@extends('errors.minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', $message ?? __('Page not found'))

@section('form')
    <a href="{{ env('APP_URL', '//check-zimmer.de') }}">{{ __('Return to the main domain') }}</a>
@endsection

<style>
    .antialiased .error-logo-block {
        margin-bottom: 20px;
    }
    .antialiased .error-logo-block svg.logo-desctope {
        margin: auto;
    }
    .antialiased div .tracking-wider {
        text-align: center;
    }
</style>
