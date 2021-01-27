@extends('layouts.app')

@section('content')

    @include('css.loader-main')
    <div class="background-image-block">
        <h1 class="list-title">{{ __($domain->tagline()) }}</h1>
        <div class="container">
            <div class="sample-block">
                <div class="input-block sample-block-item">
                    <label for="text">{{ __('workplace address') }}:</label>
                    <div class="input-container">
                        <input  v-model="search.address" id="text" type="text" :placeholder="$t('Example') + ': 04158 ' + $t('Leipzig')">
                    </div>
                </div>
                <div class="distance-block select-block">
                    <label for="distance-select">{{ __('distance') }}:</label>
                    <div class="select-container">
                        <select v-model="search.km" name="distance" id="distance-select" class="distance">
                            <option value="10">10 {{ __('km') }}.</option>
                            <option value="20">20 {{ __('km') }}.</option>
                            <option value="30">30 {{ __('km') }}.</option>
                            <option value="40">40 {{ __('km') }}.</option>
                        </select>
                    </div>
                </div>
                <div class="number-personse-block select-block">
                    <label class="desctop-label" for="number-personse">{{ __('Num people') }}:</label>
                    <label class="mobile-label" for="number-personse">{{ __('Num ppl.') }}:</label>
                    <div class="select-container">
                        <select v-model="search.people" name="distance" id="number-personse" class="number-personse">
                            <option value="1">1 {{ __('ppl') }}.</option>
                            <option value="2">2 {{ __('ppl') }}.</option>
                            <option value="3">3 {{ __('ppl') }}.</option>
                            <option value="4">4 {{ __('ppl') }}.</option>
                        </select>
                    </div>
                </div>
                <a class="find-housing" href="#" @click.prevent="submitForm">{{ __('Find housing') }}</a>
            </div>
            <div class="checkbox-form-block">
                <div class="checkbox-item single-rooms-checkbox">
                    <input type="checkbox" id="single-rooms" class="checkbox">
                    <label for="single-rooms">Одноместные номера</label>
                </div>
                <div class="checkbox-item double-rooms-checkbox">
                    <input type="checkbox" id="double-rooms" class="checkbox">
                    <label for="double-rooms">Двухместные номера</label>
                </div>
                <div class="checkbox-item multi-bed-rooms-checkbox">
                    <input type="checkbox" id="multi-bed-rooms" class="checkbox">
                    <label for="multi-bed-rooms">Многоместные номера</label>
                </div>
            </div>
        </div>
    </div>
    <div id="application" class="init-container">
        <Public/>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyChFeaunpThR-Lo4t-SMP3n7s-fDBs67hU&callback=initMap" async defer></script>
    <script>
        let map = null;
        function initMap() {

        }
    </script>
@endsection
