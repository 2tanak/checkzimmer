@extends('layouts.app')

@section('content')

    <div class="container single-container">
        <div class="single-content not-active">
            <h1>{{ $page->title }}</h1>
            <div class="mt-4">{{ $page->text }}</div>
        </div>

@endsection
