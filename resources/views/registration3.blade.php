@extends('layouts.app-favorites')

@section('content')

    @include('registration.steps-registration')

    <section class="registration-section data-checking-section">
        <div class="billing-address-container">
            <div class="main-registration-content">
                @include('registration.billing-address-checking')
                @include('registration.contact-information-checking')
                @include('registration.accommodation-facility')
                @include('registration.furnishings')
                @include('registration.photos-property')
                @include('registration.total')

                <div class="familiarization">
                    <div class="checkbox-line legal-address-line">
                        <input type="checkbox" id="got-acquainted">
                        <label for="got-acquainted">Я ознакомился с <span>условиями</span>, <span>политикой отмены</span> и положениями о защите данных провайдера,<br>
                            и я согласен на оформление моей заявки.</label>
                    </div>
                </div>

                <a href="#" class="save">Подтвердить с обязанностью платежа</a>

                <div class="duration">
                    * Продолжительность 12 месяцев с автоматом. Продление. Срок уведомления 4 недели. Процедура обратной оплаты (§ 13b UStG) для клиентов, находящихся за границей
                </div>

            </div>
            <aside class="registration-sidebar">
                <div class="your-tariff">
                    <div class="your-tariff-top">
                        <div style="display:flex;align-items:center">
                            <div class="sidebar-title">Ваш тариф:</div>
                            <div class="tariff tariff-mobile">Popular</div>
                        </div>
                        <a href="/de/plans">Изменить</a>
                    </div>
                    <div class="tariff tariff-desctope">Popular</div>
                    <div class="price">
                        <div class="price-item">€129<span>*</span></div>
                        <div class="month">/ Month</div>
                    </div>
                    <div class="description">
                        For most businesses that want to optimize web queries
                    </div>
                </div>
                <div class="try">
                    <div class="guarantee">Попробуйте нас в течение 14 дней с нашей <span>гарантией возврата денег</span></div>
                    <div class="choice">Просто выберите подходящий пакет из представленных нами типов заявок!</div>
                </div>
            </aside>
        </div>
    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {

        if (jQuery(window).width() <= 1040) {
            jQuery('.data-checking-section .collapse').addClass('show')
        } else {
            jQuery('.data-checking-section .collapse').removeClass('show')
        }

    });
</script>


