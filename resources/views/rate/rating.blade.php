<section class="rating-block">
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Furnishing') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Comfort') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Location') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Price-performance') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Cleanliness') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('WIRELESS INTERNET ACCESS') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="rating-block-item">
        <div class="rating-title">{{ __('Staff and employees') }}</div>
        <div class="rating-stars">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
            <img src="/svg/i-star.svg" alt="">
        </div>
    </div>
    <div class="name-block">
        <label for="name-block-input">{{ __('Please enter your name') }} *</label>
        <input type="text" placeholder="{{ __('Your name') }}" name="name" id="name-block-input" />
    </div>
    <a class="rating-collapse-link" data-bs-toggle="collapse" href="#collapseBody" role="button" aria-expanded="false" aria-controls="collapseBody">
       <div class="arrow-block">
            <div class="arrow-block-item along"></div>
           <div class="arrow-block-item across"></div>
       </div>
        {{ __('Add a comment to the review') }}
    </a>
    <div class="collapse" id="collapseBody">
        <div class="collapse-body-content">
            <textarea name="comment" id="comment" placeholder="{{ __('Write your comment on the review') }}"></textarea>
        </div>
    </div>
    <a href="#" class="send-review">{{ __('Send Review') }}</a>
</section>
