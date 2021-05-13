<template>
    <div>
        <div v-if="hideAddress" class="data-item-container">
            <div class="distance" v-if="distance">
                <img src="/svg/i-distance.svg" alt="">
                {{ distance }}{{ $t('km') }} {{ $t('from') }}&nbsp;<span class="desctop-span">{{ $t('said') }}</span> <span class="mobile-span">{{ $t('said') }}.</span> &nbsp; {{ $t('your addresses') }}
            </div>
        </div>
        <div class="geolocation">
            <img src="/svg/i-pin.svg" alt="">
            <span v-if="!isHideZip">{{ item.zip }}</span>,&nbsp;<span>{{ item.city }}</span>
        </div>
        <div class="humans">
            <img src="/svg/i-people.svg" alt="">
            {{ sumPeopleNumStr }}
        </div>
        <div class="distance" v-if="distance">
            <img src="/svg/i-distance.svg" alt="">
            {{ distance }}{{ $t('km') }} {{ $t('from') }}&nbsp;<span class="desctop-span">{{ $t('your addresses') }}</span> <span class="mobile-span">{{ $t('your addr') }}.</span> &nbsp;
        </div>
    </div>
</template>

<script>
export default {
    name: "ItemProperties",
    props: ['item'],
    data() {
        return {
        }
    },
    methods: {
        sumPeopleNum() {
            if (!this.item.rooms.some( elem => elem.person > 0 )) {
                return 'n/a';
            }
            return this.item.rooms.reduce((sum, elem) => sum + elem.person * elem.number, 0)
        },
        findOption(name) {
            if (!this.item.options) {
                return false;
            }
            return this.item.options.find( elem => elem.key === name);
        },
    },
    computed: {
        isHideZip() {
            let hideZip = this.findOption('hideZip');
            return hideZip && parseInt(hideZip.value);
        },
        hideAddress(){
            let hideAddress = this.item.options.find(it => it.key === 'hide_address');
            return hideAddress && hideAddress.value === '1'
        },
        distance() {
            if (!this.item.geo) {
                return 0;
            }
            let c_1 = Math.abs(parseFloat(this.item.geo.lng) - parseFloat(this.item.lng));
            let c_2 = Math.abs(parseFloat(this.item.geo.lat) - parseFloat(this.item.lat));
            return Math.ceil(Math.sqrt( c_1 ** 2 + c_2 ** 2 ) * 111);
        },
        sumPeopleNumStr() {
            let sum = this.sumPeopleNum(),
                base_sum = sum;
            if (sum === 'n/a') {
                return sum;
            }
            sum = sum % 10;
            if (sum >= 2 && sum <= 4) {
                return base_sum + ' ' + this.$t('people');
            }
            return base_sum + ' ' + this.$t('person');
        },

    }
}
</script>

<style scoped>

</style>
