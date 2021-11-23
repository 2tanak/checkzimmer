<!-- ToDo: move to Vue -->
<section class="rating-block">
    <form id="feedback-form">
        <input type="hidden" value="{{ $code }}" name="client_id"/>
        <input type="hidden" name="grecaptcha" value="">
        <div class="rating-block-item">
            <div class="rating-title">{{ __('Furnishing') }}</div>
            <div class="rating-stars">
                <input type="hidden" value="0" name="furnish" />
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
                <input type="hidden" value="0" name="comfort" />
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
                <input type="hidden" value="0" name="location" />
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
                <input type="hidden" value="0" name="price_to_perf" />
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
                <input type="hidden" value="0" name="cleanliness" />
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
                <input type="hidden" value="0" name="internet" />
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
                <input type="hidden" value="0" name="staff" />
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
    </form>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        jQuery('.send-review').click(function(e) {
            e.preventDefault();
            var data = jQuery('#feedback-form').serialize();
            jQuery.post("{{ route('got-feedback') }}", data, function(resp) {
                jQuery('.thanks-overlay').addClass('active');
                jQuery('.rating-stars img').removeClass('hodered').removeClass('clicked')
                    .attr('src', '/svg/i-star.svg');
                jQuery('.rating-stars input').val(0);
                jQuery('#name-block-input').val('');
                jQuery('#comment').val('');
                document.location = '/';
            });
        })
        function initFBGrecaptcha() {
            if (typeof grecaptcha === 'undefined') {
                setTimeout( () => { initFBGrecaptcha() }, 100 );
                return;
            }
            grecaptcha.ready(function() {
                // ToDo: remove code for GRecaptcha
                grecaptcha.execute('6LejY9AZAAAAAFpdc0QzQzrqRtaaflf3PfP64qdE', {action: 'submit'}).then(function(token) {
                    let elements = document.querySelectorAll('[name="grecaptcha"]');
                    elements.forEach( el => el.value = token);
                });
            });
        }
        jQuery('.thanks-overlay').click(function() {
            jQuery(this).removeClass('active');
        });
    });
</script>
