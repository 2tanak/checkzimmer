<div class="languages-block languages-block-desctope">
    <div class="selected-language">
        <a href="#">{{ app()->getLocale() }}</a>
    </div>
    <div class="list-languages">
        @foreach (app('locale')->getLanguagesAvailable() as $lang)
            <a href="{{ app('locale')->getLocaleUrl($lang) }}">{{ $lang }}</a>
        @endforeach
    </div>
</div>