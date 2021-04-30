@extends('layouts.app-favorites')

@section('content')

 @include('registration.steps-registration')

 <section class="registration-section billing-section">
    <div class="billing-address-container">
        <div class="main-registration-content">
            @include('registration.billing-address')
            @include('registration.contact-information')
            @include('registration.languages-speak')

            <a href="#" class="save">Сохранить и продолжить</a>

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
