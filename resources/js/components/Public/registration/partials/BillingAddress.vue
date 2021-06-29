<template>

    <section class="billing-address-section">
        <div class="title">Платежный адрес</div>
        <div class="type-company">
            <span>Выберите тип компании:</span>
            <div class="type-company-links">
                <a href="#" class="private-person" @click.prevent="setAccountType('private')">Частное лицо</a>
                <a href="#" class="entity active" @click.prevent="setAccountType('company')">Юридическое лицо</a>
            </div>
        </div>

        <form class="billing-address-form">

            <div :class="{'forms-line': true, 'company-line': true, 'not-show': data.type === 'private' && !steurShow, 'steuer-show': steurShow && data.type === 'private'}">
                <div class="company-name forms-line-block">
                    <label for="name-company">{{ $t('Company Name') }}:</label>
                    <input type="text" placeholder="Укажите название вашей компании" id="name-company" name="name-company" v-model="data.company">
                </div>
                <div class="steuer forms-line-block">
                    <label for="steuer-input">Steuer ID Nr:</label>
                    <input type="text" placeholder="DE300904393" name="steuer-input" id="steuer-input" v-model="data.stid">
                </div>
            </div>

            <div class="forms-line">
                <div class="greeting forms-line-block">
                    <label for="greeting-select">Приветствие:</label>
                    <v-select id="greeting-select" v-model="data.person.addr" :options="optionsPerson" @input="toContactDetails"></v-select>
                </div>
                <div class="name-block forms-line-block">
                    <label for="name-input">Имя:*</label>
                    <input type="text" placeholder="Укажите ваше имя" name="name-input" id="name-input" v-model="data.person.first_name" @input="toContactDetails">
                    <span class="error-text">Вы не указали имя</span>
                </div>
                <div class="surname-block forms-line-block">
                    <label for="surname-input">Фамилия:*</label>
                    <input type="text" placeholder="Укажите вашу фамилию" name="surname-input" id="surname-input" v-model="data.person.last_name" @input="toContactDetails">
                    <span class="error-text">Вы не указали фамилию</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="street-block forms-line-block">
                    <label for="street-input">Улица:*</label>
                    <input type="text" placeholder="Укажите вашу улицу" id="street-input" name="street-input" v-model="data.address.street">
                    <span class="error-text">Вы не указали улицу</span>
                </div>
                <div class="house-number-block forms-line-block">
                    <label for="house-number-input">Номер дома:*</label>
                    <input type="text" placeholder="Номер дома" id="house-number-input" name="house-number-input" v-model="data.address.house">
                    <span class="error-text">Вы не указали дома</span>
                </div>
            </div>

            <div class="forms-line">
                <div class="zip-block forms-line-block">
                    <label for="zip-input">Индекс:*</label>
                    <input type="text" placeholder="Ваш индекс" id="zip-input" name="zip-input" v-model="data.address.postcode">
                    <span class="error-text">Вы не указали индекс</span>
                </div>
                <div class="city-block forms-line-block">
                    <label for="city-input">Город:*</label>
                    <input type="text" placeholder="Укажите ваш город" id="city-input" name="city-input" v-model="data.address.city">
                    <span class="error-text">Вы не указали город</span>
                </div>
                <div class="country-block forms-line-block">
                    <label for="country-select">Страна:*</label>
                    <v-select id="country-select" v-model="data.address.country" :options="optionsCountry"></v-select>
                </div>
            </div>

            <div class="checkbox-line legal-address-line">
                <input type="checkbox" id="legal-address" v-model="data.match_address">
                <label for="legal-address">Юридический адрес совпадает с адресом объекта</label>
            </div>

            <div class="checkbox-line transfer-contacts-line">
                <input type="checkbox" id="transfer-contacts" v-model="data.match_person" @change="setContactAsBilling">
                <label for="transfer-contacts">Перенести контактные данные из платежных данных</label>
            </div>
        </form>

        <div :class="{'add-id': true, show: !steurShow && data.type === 'private'}">
            <a href="#" @click.prevent="showSteur">
                <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 9C4 9.55228 4.44772 10 5 10C5.55228 10 6 9.55229 6 9V6H9C9.55228 6 10 5.55228 10 5C10 4.44772 9.55229 4 9 4L6 4V1C6 0.447715 5.55228 0 5 0C4.44772 0 4 0.447715 4 1V4L1 4C0.447715 4 0 4.44771 0 5C0 5.55228 0.447715 6 1 6H4V9Z" fill="#3B8B3E"/>
                </svg>
                Добавить Steuer ID
            </a>
        </div>

    </section>


</template>

<script>
export default {
    name: "BillingAddress",
    props: [ 'data' ],
    data() {
        return {
            account: this.data,
            optionsPerson: [ 'Mister', 'Missis' ],
            optionsCountry: [ 'Germany', 'Russia', 'USA'  ],
            steurShow: false,
        }
    },
    /*watch: {
        data() {
            this.props = data
        }
    },*/
    mounted() {
        jQuery(document).ready(function() {
            jQuery('.type-company-links a').click(function (e) {
                e.preventDefault();
                jQuery('.type-company-links a').removeClass('active');
                jQuery(this).addClass('active');
                //jQuery('.company-line').toggleClass('not-show');
                //jQuery('.add-id').toggleClass('show');
            });

            jQuery('.add-id a').click(function (e) {
                e.preventDefault();
                //jQuery('.company-line').removeClass('not-show');
                //jQuery('.company-line').addClass('steuer-show');
            });

            jQuery('.entity').click(function (e) {
                e.preventDefault();
                //jQuery('.company-line').removeClass('steuer-show');
                //jQuery('.company-line').removeClass('not-show');
            });
        })
    },
    methods: {
        setAccountType(type) {
            let billing = { ...this.data };
            billing.type = type
            if (type === 'private') {
                this.steurShow = false;
            }
            this.$emit('input', billing);
        },
        toContactDetails() {
            this.setContactAsBilling()
        },
        setContactAsBilling() {
            if (this.data.match_person) {
                this.$emit('setContactAsBilling', '');
            }
        },
        showSteur() {
            this.steurShow = !this.steurShow;
        }
    }
}
</script>

<style scoped>

</style>

