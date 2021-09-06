<form class="property-inquiry-form {{ $classes ?? '' }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $id }}" name="property" />
    <input type="hidden" value="{{ app()->getLocale() }}" name="language" />
    <div class="input-block-item">
        <input id="company" type="text" name="company" class="input">
        <label for="company">{{ __('Company name') }}</label>
    </div>
    <div class="input-block-item">
        <input id="name" type="text" name="name" class="input" required>
        <label for="name">{{ __('Name and Surname') }}*</label>
        <div class="validation-block">{{ __('Please fill in this field') }}</div>
    </div>
    <div class="input-block-item">
        <input id="email" type="email" name="email" class="input" required>
        <label for="email">{{ __('Email') }}*</label>
        <div class="validation-block">{{ __('Please fill in this field') }}</div>
    </div>
    <div class="input-block-item">
        <input id="telephone" type="tel" name="telephone" class="input" required>
        <label for="telephone">{{ __('Phone number') }}*</label>
        <div class="validation-block">{{ __('Please fill in this field') }}</div>
    </div>
    <div class="data-block">
        <input id="arrival-date" data-provide="datepicker" type="text" name="arrival-date" readonly class="input" required>
        <label for="arrival-date">{{ __('Arrival date') }}</label>
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
        </svg>
    </div>
    <div class="data-block">
        <input id="date-departure" data-provide="datepicker" name="date-departure" readonly class="input" type="text" required>
        <label for="date-departure">{{ __('Date departure') }}</label>
        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
        </svg>
    </div>
    <div class="select-block">
        <select id="number-persons" name="number-persons" class="input">
            <option value="1">1 {{ __('Person') }}</option>
            @for($i=2; $i<100; $i++)
                <option value="{{ $i }}">{{ $i }} {{ __('Persons') }}</option>
            @endfor
            <option value="8">100+ {{ __('Persons') }}</option>
        </select>
        <label for="number-persons">{{ __('Number persons') }}</label>
    </div>
    <div class="select-block">
        <select id="type" name="type" class="input">
            <option value="Whole apartment">{{ __('Whole Apartment') }}</option>
            <option value="apartment">{{ __('apartment') }}</option>
            <option value="Apartment">{{ __('Apartment') }}</option>
            <option value="House">{{ __('House') }}</option>
            <option value="Pension">{{ __('Pension') }}</option>
            <option value="Hotel">{{ __('Hotel') }}</option>
            <option value="Room">{{ __('Room') }}</option>
            <option value="Own use">{{ __('Own use') }}</option>
        </select>
        <label for="type">{{ __('Housing type') }}</label>
    </div>
    <div class="text-area-block">
        <textarea placeholder="{{ __('Message to owner') }}" name="message" class="input"></textarea>
    </div>
    <div class="checkbox-block checkbox-middle">
        <input id="email-checkbox" class="checkbox input" name="email-checkbox" type="checkbox">
        <label for="email-checkbox">{{ __('Send me a copy by email') }}</label>
    </div>
    <div class="checkbox-block checkbox-top">
        <input id="consent-checkbox" class="checkbox input" name="consent-checkbox" type="checkbox" required>
        <label for="consent-checkbox">{{ __('I consent to the processing of my data as described in') }} <a href="/datenschutz">Datenschutz</a></label>
    </div>
    <input type="hidden" name="grecaptcha" value="">
    <a class="send-request" href="#">{{ __('Send request') }}</a>
    <div class="input-error inactive">{{ __('Please fill in required fields') }}</div>
    <div class="sent-ok inactive">{{ __('The form was sent successfully') }}</div>
</form>

<script>
    function select2InitModal() {
        if (!jQuery('.property-inquiry-form select').select2) {
            setTimeout(select2InitModal, 100);
            return;
        }
        jQuery('.property-inquiry-form select').select2();
    }
    document.addEventListener('DOMContentLoaded', function (e) {

        select2InitModal();

        jQuery('.property-inquiry-form .input-block-item input').focus(function () {
            var parent = jQuery(this).closest('.input-block-item, .modal-block');
            jQuery(parent).find('label').addClass('active');
        });
        jQuery('.property-inquiry-form .input-block-item input').blur(function () {
            var value = jQuery(this).val();
            var parent = jQuery(this).closest('.input-block-item, .modal-block');
            if (value === '') {
                jQuery(parent).find('label').removeClass('active');
            }
        });
        jQuery('.property-inquiry-form .data-block input').focus(function () {
            var parent = jQuery(this).closest('.data-block');
            jQuery(parent).find('label').addClass('active');
        });

        jQuery('.property-inquiry-form .data-block input').blur(function () {
            var value = jQuery(this).val();
            var parent = jQuery(this).closest('.data-block');
            if (value === '') {
                jQuery(parent).find('label').removeClass('active');
            }
        });

        function setMainTextSendButton() {
            jQuery('.property-inquiry-form .send-request').text(jQuery('.property-inquiry-form .send-request').attr("button-text"));
        }

        function setSendingTextSendButton() {
            var sentRequestButton = jQuery('.property-inquiry-form .send-request');
            sentRequestButton.attr('button-text', "{{ __('Send request') }}")
            sentRequestButton.text("{{ __('Sending...') }}");
        }

        jQuery('.property-inquiry-form .input').on('change', function (e) {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.checkbox-block').removeClass('error');
            jQuery('.property-inquiry-form .input-error').addClass('inactive');
        });

        jQuery('.property-inquiry-form .send-request').click(function (e) {
            jQuery('.input').removeClass('error');
            jQuery('.property-inquiry-form .input-error').addClass('inactive');
            e.preventDefault();
            e.stopPropagation();
            let errors = false;
            jQuery('.property-inquiry-form .input').each(function () {
                let req = jQuery(this).prop('required');

                if (req) {
                    switch (jQuery(this).attr('type')) {
                        case 'text':
                        case 'email':
                        case 'tel':
                            if (jQuery(this).val() === '') {
                                console.log(jQuery(this).attr('name'));
                                jQuery(this).addClass('error');
                                jQuery('.property-inquiry-form .input-error').removeClass('inactive');
                                errors = true;
                            }
                            break;
                        case 'checkbox':
                            if (!jQuery(this).prop('checked')) {
                                console.log(jQuery(this).attr('name'));
                                jQuery(this).closest('.checkbox-block').addClass('error');
                                jQuery('.property-inquiry-form .input-error').removeClass('inactive');
                                errors = true;
                            }
                            break;
                    }
                }
            });
            if (!errors) {
                setSendingTextSendButton();
                jQuery.post('{{ route(app('locale')->routeApply('inquiryForm')) }}', jQuery('.property-inquiry-form').serialize(), function (response) {
                    if (response.code == 'ok') {
                        setMainTextSendButton();
                        jQuery('.property-inquiry-form .sent-ok').removeClass('inactive');

                        gtag('event', 'sendInquiry', {
                            'event_category': 'forms',
                            'event_label': 'Inquiry form sent',
                        });

                        setTimeout(() => {
                            jQuery('.property-inquiry-form .sent-ok').addClass('inactive');
                        }, 2000);

                    }
                }).fail(function (response) {
                    var message = response.responseJSON.message;
                    message += "<ul>";
                    jQuery.each(response.responseJSON.errors, function (i, x) {
                        message += "<li>" + x + "</li>";
                        $("[name*='" + i + "']").addClass('error');
                    });
                    message += "</ul>";
                    jQuery('.property-inquiry-form .input-error').html(message).removeClass('inactive');
                    setMainTextSendButton();
                })
            }
        });
    })

</script>
