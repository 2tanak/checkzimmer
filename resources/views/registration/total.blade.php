<section class="total-section">
    <div class="title">
        Итого
        <a href="#">Изменить тариф</a>
    </div>
    <div class="total-content">
        <div class="address-checking-line strong-line">
            <div class="address-checking-name">Тариф <span class="name-tariff">POPULAR</span> <span class="price-tariff">(12x€20/мес.)</span></div>
            <div class="dots"></div>
            <div class="address-checking-total">€ 240,00</div>
        </div>
        <div class="address-checking-line">
            <div class="address-checking-name">Итого <span class="price-tariff">(нетто)</span></div>
            <div class="dots"></div>
            <div class="address-checking-total">€ 240,00</div>
        </div>
        <div class="address-checking-line">
            <div class="address-checking-name">НДС <span class="price-tariff">(16%)</span></div>
            <div class="dots"></div>
            <div class="address-checking-total">€ 38,40</div>
        </div>
        <div class="address-checking-line strong-line size-line">
            <div class="address-checking-name">Общая сумма <span class="price-tariff">(включая НДС 16%)</span></div>
            <div class="dots"></div>
            <div class="address-checking-total">€ 278,40</div>
        </div>
    </div>
</section>

<style>
    .registration-section .total-section {
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px;
        margin-bottom: 30px;
        max-width: 780px;
        width: 100%;
        position: relative;
    }
    .registration-section .total-section:after {
        position: absolute;
        content: "";
        max-width: 720px;
        width: 100%;
        height: 110px;
        left: 50%;
        transform: translateX(-50%);
        bottom: 0;
        background: #FFFFFF;
        box-shadow: 0 4px 30px rgb(51 54 70 / 16%);
        border-radius: 14px;
        z-index: -1;
    }
    .registration-section .total-section .address-checking-line {
        display: flex;
        align-items: flex-end;
    }
    .registration-section .total-section .address-checking-line:not(:last-of-type) {
        margin-bottom: 16px;
    }
    .registration-section .total-section .address-checking-name {
        font-weight: 400;
        font-size: 14px;
        line-height: 100%;
        color: #333646;
        margin-right: 10px;
    }
    .registration-section .total-section .strong-line .address-checking-name {
        font-weight: 500;
    }
    .registration-section .total-section .size-line .address-checking-name {
        font-size: 16px;
    }
    .registration-section .total-section .address-checking-name span.name-tariff {
        text-transform: uppercase;
    }
    .registration-section .total-section .address-checking-name span.price-tariff {
        font-weight: 400;
        color: #99a3ad;
    }
    .registration-section .total-section .address-checking-total {
        font-weight: 500;
        font-size: 14px;
        line-height: 100%;
        color: #000000;
        margin-left: 10px;
    }
    .registration-section .total-section .size-line .address-checking-total {
        font-size: 16px;
    }
    .registration-section .total-section .dots {
        flex-grow: 1;
        border-bottom: 1px dotted #c5c5c5;
        margin-bottom: 2px;
    }

    @media (max-width: 1040px) {
        .registration-section .total-section {
            max-width: none;
            border-radius: 0;
        }

        .registration-section .total-section:after {
            width: calc(100% - 32px);
        }
    }
    @media (max-width: 575px) {
        .registration-section .total-section .dots {
            display: none;
        }
        .registration-section .total-section .address-checking-name {
            margin-right: 0;
            margin-bottom: 12px;
        }
        .registration-section .total-section .address-checking-total {
            margin-left: 0;
        }
        .registration-section .total-section .address-checking-line:not(:last-of-type) {
            margin-bottom: 24px;
        }
        .registration-section .total-section .address-checking-line {
            flex-direction: column;
            align-items: flex-start;
        }
    }

</style>
