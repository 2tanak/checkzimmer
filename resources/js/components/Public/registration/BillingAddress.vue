<template>

    <section class="registration-section">
        <div class="registration-container">
            <div class="main-registration-content">
                <section class="billing-address-section">
                    <div class="title">Платежный адрес</div>
                    <div class="type-company">
                        <span>Выберите тип компании:</span>
                        <div class="type-company-links">
                            <a href="#" class="private-person">Частное лицо</a>
                            <a href="#" class="entity active">Юридическое лицо</a>
                        </div>
                    </div>

                    <form class="billing-address-form">

                        <div class="forms-line company-line">
                            <div class="company-name">
                                <label for="name-company">Название компании:</label>
                                <input type="text" placeholder="Укажите название вашей компании" id="name-company" name="name-company">
                            </div>
                            <div class="steuer">
                                <label for="steuer-input">Steuer ID Nr:</label>
                                <input type="text" placeholder="DE300904393" name="steuer-input" id="steuer-input">
                            </div>
                        </div>


                        <div class="forms-line">
                            <div class="greeting">
                                <label for="greeting-select">Приветствие:</label>
                                <select id="greeting-select">
                                    <option value="mister" selected>
                                        Mister
                                    </option>
                                    <option value="missis">
                                        Missis
                                    </option>
                                </select>
                            </div>
                            <div class="name-block">
                                <label for="name-input">Имя:*</label>
                                <input type="text" placeholder="Укажите ваше имя" name="name-input" id="name-input">
                            </div>
                            <div class="surname-block">
                                <label for="surname-input">Фамилия:*</label>
                                <input type="text" placeholder="Укажите вашу фамилию" name="surname-input" id="surname-input">
                            </div>
                        </div>

                        <div class="forms-line">
                            <div class="street-block">
                                <label for="street-input">Улица:*</label>
                                <input type="text" placeholder="Укажите вашу улицу" id="street-input" name="street-input">
                            </div>
                            <div class="house-number-block">
                                <label for="house-number-input">Номер дома:*</label>
                                <input type="text" placeholder="Номер дома" id="house-number-input" name="house-number-input">
                            </div>
                        </div>

                        <div class="forms-line">
                            <div class="zip-block">
                                <label for="zip-input">Индекс:*</label>
                                <input type="text" placeholder="Ваш индекс" id="zip-input" name="zip-input">
                            </div>
                            <div class="city-block">
                                <label for="city-input">Город:*</label>
                                <input type="text" placeholder="Укажите ваш город" id="city-input" name="city-input">
                            </div>
                            <div class="country-block">
                                <label for="country-select">Страна:*</label>
                                <select id="country-select">
                                    <option value="01">Russia</option>
                                    <option value="02" selected>Germany</option>
                                    <option value="03">USA</option>
                                </select>
                            </div>
                        </div>

                        <div class="checkbox-line legal-address-line">
                            <input type="checkbox" id="legal-address">
                            <label for="legal-address">Юридический адрес совпадает с адресом объекта</label>
                        </div>

                        <div class="checkbox-line transfer-contacts-line">
                            <input type="checkbox" id="transfer-contacts">
                            <label for="transfer-contacts">Перенести контактные данные из платежных данных</label>
                        </div>

                    </form>

                    <div class="add-id">
                        <a href="#">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                            </svg>
                            Добавить Steuer ID
                        </a>
                    </div>

                </section>

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

</template>

<script>
export default {
    name: "BillingAddress",
    mounted() {
        jQuery(document).ready(function() {
            jQuery('.type-company-links a').click(function (e) {
                e.preventDefault();
                jQuery('.type-company-links a').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('.company-line').toggleClass('not-show');
                jQuery('.add-id').toggleClass('show');
            });

            jQuery('#greeting-select, #country-select').select2();
        })
    }
}
</script>

<style scoped>

</style>

