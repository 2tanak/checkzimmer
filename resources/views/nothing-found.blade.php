@extends('layouts.app')

@section('content')

<section class="nothing-found-section">
    <div class="nothing-found-container">
        <div class="nothing-found-content">

            <h1>{{ __('Nothing found') }}!</h1>

            <div class="description-text">
                <span>{{ __("Don't waste time researching the internet for hours") }}.</span> <br> <span>{{ __('Our team of fitters has years of experience and the right contacts') }}.</span>
            </div>

            <div class="avatar-number">
                <div class="avatar-item">
                    <div class="avatar-block">
                        <img src="/img/steven.jpg" alt="">
                        <div>
                            <div class="name"><span>Steven</span> <span>Dekan</span></div>
                            <div class="post">Geschäftsführer</div>
                        </div>
                    </div>
                    <div class="avatar-block">
                        <img src="/img/comand11.png" alt="">
                        <div>
                            <div class="name"><span>Anna</span> <span>Spitz</span></div>
                            <div class="post">Reservierungsabteilung</div>
                        </div>
                    </div>
                    <div class="avatar-block">
                        <img src="/img/comand13.png" alt="">
                        <div>
                            <div class="name"><span>Tania</span> <span>Davidov</span></div>
                            <div class="post">Kundenbetreuung</div>
                        </div>
                    </div>
                    <div class="avatar-block">
                        <img src="/img/comand16.png" alt="">
                        <div>
                            <div class="name"><span>Veronika</span> <span>Bunt</span></div>
                            <div class="post">Kundenbetreuung</div>
                        </div>
                    </div>
                    <div class="avatar-block">
                        <img src="/img/sofia.jpg" alt="">
                        <div>
                            <div class="name"><span>Sofia</span> <span>Kremer</span></div>
                            <div class="post">Kundenbetreuung</div>
                        </div>
                    </div>
                    <div class="avatar-block">
                        <img src="/img/frau-avatar.png" alt="">
                        <div>
                            <div class="name"><span>Helene</span> <span>Wunder</span></div>
                            <div class="post">Bürohilfe</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="link-block-item">
                <a href="https://web.whatsapp.com/send?phone=+493419288032" class="write-whatsapp">
                    <span>{{ __('Write to WhatsApp') }}!</span>
                </a>

                <div class="explanatory-text">{{ __('By clicking on this button you will be redirected to WhatsApp') }}</div>
            </div>

            <div class="number-phone-block">
                <a href="tel:+4915792467400" class="number-phone">+49 157 92467400</a>
                <div class="work">{{ __('We work for you') }}</div>
            </div>

            <form action="" method="POST" class="nothing-found-form">
                <div class="title">{{ __('Send request') }}</div>
                <div class="form-line">
                    <div class="input-block">
                        <label for="nothing-form-company">{{ __('Company name') }}</label>
                        <input type="text" id="nothing-form-company" class="input">
                    </div>
                    <div class="input-block">
                        <label for="nothing-form-name">{{ __('Name and Surname') }}*</label>
                        <input type="number" id="nothing-form-name" class="input" required>
                    </div>
                </div>
                <div class="form-line">
                    <div class="input-block">
                        <label for="nothing-form-city">{{ __('Email') }}*</label>
                        <input type="text" id="nothing-form-city" class="input" required>
                    </div>
                    <div class="input-block">
                        <label for="nothing-form-mail">{{ __('Phone number') }}*</label>
                        <input type="email" id="nothing-form-mail" class="input" required>
                    </div>
                </div>
                <div class="form-line">
                    <div class="input-block">
                        <input id="arrival-date" data-provide="datepicker" type="text" name="arrival-date" readonly class="input" required>
                        <label for="arrival-date">{{ __('Arrival date') }}</label>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
                        </svg>
                    </div>
                    <div class="input-block">
                        <input id="date-departure" data-provide="datepicker" name="date-departure" readonly class="input" type="text" required>
                        <label for="date-departure">{{ __('Date departure') }}</label>
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
                        </svg>
                    </div>
                </div>
                <div class="form-line">
                    <div class="input-block select-block">
                        <select id="nothing-form-number-persons" name="number-persons" class="input">
                            <option value="1">1 {{ __('Person') }}</option>
                            <option value="2">2 {{ __('Persons') }}</option>
                            <option value="3">3 {{ __('Persons') }}</option>
                            <option value="4">4 {{ __('Persons') }}</option>
                            <option value="5">5 {{ __('Person') }}</option>
                            <option value="6">6 {{ __('Person') }}</option>
                            <option value="7">{{ __('Before')  }} 100 {{ __('Persons') }}</option>
                            <option value="8">100+ {{ __('Persons') }}</option>
                        </select>
                        <label for="nothing-form-number-persons">{{ __('Number persons') }}</label>
                    </div>
                    <div class="input-block select-block">
                        <select id="nothing-form-type" name="type" class="input">
                            <option value="Whole apartment">{{ __('Whole Apartment') }}</option>
                            <option value="apartment">{{ __('apartment') }}</option>
                            <option value="Apartment">{{ __('Apartment') }}</option>
                            <option value="House">{{ __('House') }}</option>
                            <option value="Pension">{{ __('Pension') }}</option>
                            <option value="Hotel">{{ __('Hotel') }}</option>
                            <option value="Room">{{ __('Room') }}</option>
                            <option value="Own use">{{ __('Own use') }}</option>
                        </select>
                        <label for="nothing-form-type">{{ __('Housing type') }}</label>
                    </div>
                </div>
                <div class="form-line full-width">
                    <div class="input-block">
                        <textarea name="" id="nothing-form-text" placeholder="{{ __('Message to owner') }}"></textarea>
                    </div>
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
                <div class="form-line full-width">
                    <a href="#" class="send-request">{{ __('Send request') }}</a>
                </div>
                <div class="input-error inactive">{{ __('Please fill in required fields') }}</div>
                <div class="sent-ok inactive">{{ __('The form was sent successfully') }}</div>
            </form>


            <div class="fixed-bar">
                <a href="#" class="send-inquiry inquiry"><span>Unverbindliche</span><span>Anfrage</span></a>
                <div class="see-number-phone">
                    <a class="number-phone phone-hide" href="tel:+4915792467400">+49 157 92467400</a>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        function setMainTextSendButton() {
            jQuery('.nothing-found-section .nothing-found-form .send-request').text(jQuery('.nothing-found-section .nothing-found-form .send-request').attr("button-text"));
        }

        function setSendingTextSendButton() {
            var sentRequestButton = jQuery('.nothing-found-section .nothing-found-form .send-request');
            sentRequestButton.attr('button-text', "{{ __('Send request') }}")
            sentRequestButton.text("{{ __('Sending...') }}");
        }

        jQuery('.nothing-found-section .nothing-found-form .input').on('change', function (e) {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.checkbox-block').removeClass('error');
            jQuery('.nothing-found-section .nothing-found-form .input-error').addClass('inactive');
        });

        jQuery('.nothing-found-section .nothing-found-form .send-request').click(function (e) {
            jQuery('.input').removeClass('error');
            jQuery('.nothing-found-section .nothing-found-form .input-error').addClass('inactive');
            e.preventDefault();
            e.stopPropagation();
            let errors = false;
            jQuery('.nothing-found-section .nothing-found-form .input').each(function () {
                let req = jQuery(this).prop('required');

                if (req) {
                    switch (jQuery(this).attr('type')) {
                        case 'text':
                        case 'email':
                        case 'tel':
                            if (jQuery(this).val() === '') {
                                console.log(jQuery(this).attr('name'));
                                jQuery(this).addClass('error');
                                jQuery('.nothing-found-section .nothing-found-form .input-error').removeClass('inactive');
                                errors = true;
                            }
                            break;
                        case 'checkbox':
                            if (!jQuery(this).prop('checked')) {
                                console.log(jQuery(this).attr('name'));
                                jQuery(this).closest('.checkbox-block').addClass('error');
                                jQuery('.nothing-found-section .nothing-found-form .input-error').removeClass('inactive');
                                errors = true;
                            }
                            break;
                    }
                }
            });
            if (!errors) {
                setSendingTextSendButton();
                jQuery.post('{{ route(app('locale')->routeApply('inquiryForm')) }}', jQuery('.nothing-found-form').serialize(), function (response) {
                    if (response.code == 'ok') {
                        setMainTextSendButton();
                        jQuery('.nothing-found-section .nothing-found-form .sent-ok').removeClass('inactive');
                        setTimeout(() => {
                            jQuery('.nothing-found-section .nothing-found-form .sent-ok').addClass('inactive');
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
                    jQuery('.nothing-found-section .nothing-found-form .input-error').html(message).removeClass('inactive');
                    setMainTextSendButton();
                })
            }
        });
    })
</script>

@endsection


