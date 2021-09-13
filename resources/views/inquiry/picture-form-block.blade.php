<div class="picture-form-block">
    <div class="left-part">
        <img class="left-part-bg" src="/img/left-part-bg.png" alt="">
        <img class="monteur" src="/img/monteur.png" alt="">
    </div>
    <div class="nothing-found-block">
        <div class="title">{{ __('Send request') }}</div>
        @include('single.inquiry-form', ['id' => 0, 'classes' => 'nothing-found-form'])
    </div>
    <div class="right-part"></div>
</div>
