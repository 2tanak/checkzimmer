@extends('layouts.app')

@section('content')

    <div class="container single-container created-page-container">
        <div class="single-content not-active created-page">
            <h1>{{ $page->title }}</h1>
            <div class="mt-4">{!! $page->text !!}</div>
        </div>

@endsection
