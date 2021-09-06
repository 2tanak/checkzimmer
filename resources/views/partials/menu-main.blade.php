<div class="main-menu">
    <ul>
        <li>
            <a href="{{ route(app('locale')->routeApply('favorites')) }}">
                <img class="normal" src="/svg/i-favourites-header.svg" alt="">
                <img class="hover" src="/svg/i-favourites-hover.svg" alt="">
                {{ __('Favorites') }} (<span class="favoritesCount">0</span>)
            </a>
        </li>
        <li>
            <a href="{{ route(app('locale')->routeApply('registration')) }}">
                <img class="normal" src="/svg/i-rent-header.svg" alt="">
                <img class="hover" src="/svg/i-rent-hover.svg" alt="">
                {{ __('Rent out') }}
            </a>
        </li>
        <li>
            <a class="personal-area-link" href="#">
                <img class="normal" src="/svg/i-account-header.svg" alt="">
                <img class="hover" src="/svg/i-account-hover.svg" alt="">
                {{ __('Personal account') }}
            </a>
        </li>
    </ul>
</div>
