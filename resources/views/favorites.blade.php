@extends('layouts.app')

@section('content')

    @include('css.loader-main')

    <div id="application" class="init-container">
        <Public></Public>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>
    <script>
        let map = null;
        function initMap() {

        }
    </script>

@endsection
