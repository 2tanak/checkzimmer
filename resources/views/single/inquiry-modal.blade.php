<div class="modal-overlay inquiry-modal-overlay">
    <div class="inquiry-modal">
        <div class="modal-close">
            <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0956 2.0934C10.369 1.82004 10.369 1.37682 10.0956 1.10345C9.82227 0.830087 9.37906 0.830087 9.10569 1.10345L5.49959 4.70956L1.89389 1.10387C1.62053 0.830501 1.17731 0.830501 0.903944 1.10387C0.630577 1.37724 0.630577 1.82045 0.903944 2.09382L4.50964 5.69951L0.903253 9.30589C0.629887 9.57926 0.629886 10.0225 0.903253 10.2958C1.17662 10.5692 1.61984 10.5692 1.8932 10.2958L5.49959 6.68946L9.10638 10.2963C9.37975 10.5696 9.82297 10.5696 10.0963 10.2963C10.3697 10.0229 10.3697 9.57967 10.0963 9.30631L6.48954 5.69951L10.0956 2.0934Z" fill="#545769"/>
            </svg>
        </div>
        <div class="title">{{ __('Send request') }}</div>
        <form class="inquiry-form">
            <input type="hidden" name="grecaptcha" value="">
            <div class="input-block-item">
                <input id="company" name="company" type="text">
                <label for="company">{{ __('Company name') }}</label>
            </div>
            <div class="input-block-item">
                <input id="name" name="name" type="text">
                <label for="name">{{ __('Name and Surname') }}*</label>
            </div>
            <div class="input-block-item">
                <input id="email" name="email" type="email">
                <label for="email">{{ __('Email') }}*</label>
            </div>
            <div class="input-block-item">
                <input id="telephone" name="phone" type="tel">
                <label for="telephone">{{ __('Phone number') }}*</label>
            </div>
            <div class="data-block">
                <input id="arrival-date" name="date-arrival" data-provide="datepicker" readonly>
                <label for="arrival-date">{{ __('Arrival date') }}</label>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
                </svg>
            </div>
            <div class="data-block">
                <input id="date-departure" name="date-departure" data-provide="datepicker" readonly>
                <label for="date-departure">{{ __('Date departure') }}</label>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13 0H14V2H16C16.5523 2 17 2.44772 17 3V6V7V17C17 17.5523 16.5523 18 16 18H2C1.44772 18 1 17.5523 1 17V7V6V3C1 2.44772 1.44772 2 2 2H4V0H5V2H13V0ZM5 3H4H2V6H16V3H14H13H5ZM16 17H2V7H16V17ZM10 12H14V13H10V12ZM14 10H10V11H14V10ZM4 12H8V13H4V12ZM8 10H4V11H8V10Z" fill="#7A8793"/>
                </svg>
            </div>
            <div class="select-block">
                <select id="number-persons" name="number-persons">
                    <option>1 {{ __('Person') }}</option>
                    <option>2 {{ __('Persons') }}</option>
                    <option>3 {{ __('Persons') }}</option>
                    <option>4 {{ __('Persons') }}</option>
                    <option>5 {{ __('Person') }}</option>
                    <option>6 {{ __('Person') }}</option>
                </select>
                <label for="number-persons">{{ __('Number persons') }}</label>
            </div>
            <div class="select-block">
                <select id="type" name="type">
                    <option>{{ __('Whole apartment') }}</option>
                    <option>{{ __('House') }}</option>
                    <option>{{ __('Room') }}</option>
                    <option>{{ __('Garage') }}</option>
                </select>
                <label for="number-persons" >{{ __('Housing type') }}</label>
            </div>
            <div class="text-area-block">
                <textarea placeholder="{{ __('Message to owner') }}"></textarea>
            </div>
            <div class="checkbox-block checkbox-middle">
                <input id="email-checkbox" class="checkbox" type="checkbox" name="email-copy">
                <label for="email-checkbox">{{ __('Send me a copy by email') }}</label>
            </div>
            <div class="checkbox-block checkbox-top">
                <input id="consent-checkbox" class="checkbox" type="checkbox" name="consent">
                <label for="consent-checkbox">{{ __('I consent to the processing of my data as described in') }} <a href="#">{{ __('statement of consent') }}</a> {{ __('from') }} Checkzimmer.</label>
            </div>
            <a class="send-request" href="#">{{ __('Send request') }}</a>
        </form>
    </div>
</div>
<script>
    jQuery('.inquiry-form').submit({

    });
</script>
