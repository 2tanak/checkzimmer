@if(!request()->get('search') && false )
    <div class="property-list-subhead">
        <div class="container">
            <div class="title">{{ $options['motto_header'] ?? '' }}</div>
            <div class="subtitle">{{ $options['motto_subtitle'] ?? '' }}</div>
            <div class="property-list-subhead-gallery">
                <div class="gallery-block step-one">
                    <div class="double-photo">
                        <img class="first-photo" src="/img/hand-with-phone.png" alt="Phone">
                        <div style="width:229px; text-align:center">
                            <img class="second-photo" src="/img/QR.png" alt="QR-код">
                            <div class="gallery-block-text">
                                Открой камеру на телефоне и отсканируй QR-код
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery-block step-two">
                    <img class="screen" src="/img/screen1.png" alt="Phone">
                    <div style="width:170px" class="gallery-block-text">
                        Ответь на наши вопросы
                    </div>
                </div>
                <div class="gallery-block step-three">
                    <img class="screen" src="/img/screen2.png" alt="Phone">
                    <div style="width:224px" class="gallery-block-text">
                        Получи актуальные предложения в городе
                    </div>
                </div>
                <div class="gallery-block step-four">
                    <img class="screen" src="/img/screen3.png" alt="Phone">
                    <div style="width:170px" class="gallery-block-text">
                        Выбери и сразу забронируй
                    </div>
                </div>
            </div>
            <div class="whatsapp-link">
                <a class="whatsapp-link-number" href="tel:{{ $phoneNumAdmin }}">
                    <img src="/svg/whatsapp-big.svg" alt="Whatsapp">
                    {{ $options['website_phone'] ?? '' }}
                </a>
                <a class="whatsapp-link-text" href="tel:{{ $phoneNumAdmin }}">Просто напишите нам в Whatsapp</a>
            </div>
            <div class="mobile-underlink-text">Нажмите на кнопку и сделайте прямой запрос по WhatsApp. Сравните цены
                и доступность из более 150
                обьектов в городе Х
            </div>
        </div>
    </div>
@endif
