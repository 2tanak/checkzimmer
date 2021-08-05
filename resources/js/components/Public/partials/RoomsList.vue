<template>
    <div class="table-container">
        <div class="type">
            <div class="thead">
                <div class="title">{{ $t('Type') }}</div>
                <div class="title">{{ $t('Num') }}</div>
                <div class="title">{{ $t('Personen') }}</div>
                <div class="title">{{ $t('Price') }}</div>
            </div>
            <div v-for="room in roomTypes.slice(0, 5)" class="visible-part">
                <div class="type-block filling-block">
                    <img :src="getPersonsPic(room.minPpl)" :alt="getPersonsText(room.minPpl)">
                    <span> {{ room.name }} </span>
                </div>
                <div class="type-block quantity-block">{{ room.number }}</div>
                <div class="type-block personen-block">{{ room.person }}</div>
                <div class="type-block price-block"><b>{{ room.price }}&#8364;/{{ $t('persone') }}</b></div>
            </div>
        </div>
        <div class="type collapse fade" v-for="room in roomTypes.slice(5)" :id="'id-' + item_id">
            <div class="visible-part not-visible-part">
                <div class="type-block filling-block">
                    <img :src="getPersonsPic(room.minPpl)" :alt="getPersonsText(room.minPpl)">
                    <span> {{ room.name }} </span>
                </div>
                <div class="type-block quantity-block">{{ room.number }}</div>
                <div class="type-block personen-block">{{ room.person }}</div>
                <div class="type-block price-block"><b>{{ room.price }}&#8364;</b>/{{ $t('persone') }}</div>
            </div>
        </div>
        <a v-if="roomTypes.length > 5" :href="'#' + 'id-' + item_id" class="all-types" :aria-controls="'id-' + item_id" role="button" aria-expanded="false" data-toggle="collapse">
            <svg width="15" height="14" viewBox="0 0 15 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7 1.5C6.72386 1.5 6.5 1.72386 6.5 2V6H2.5C2.22386 6 2 6.22386 2 6.5C2 6.77614 2.22386 7 2.5 7H6.5V11C6.5 11.2761 6.72386 11.5 7 11.5C7.27614 11.5 7.5 11.2761 7.5 11V7H11.5C11.7761 7 12 6.77614 12 6.5C12 6.22386 11.7761 6 11.5 6H7.5V2C7.5 1.72386 7.27614 1.5 7 1.5Z" fill="#7A8793"/>
            </svg>
            <span>{{ $t('Show all facilities') }}</span>
        </a>
    </div>
</template>

<script>
export default {
    name: "RoomsList",
    props: ['rooms', 'item_id'],
    methods: {
        getPersonsPic(number) {
            switch (number) {
                case 1: return '/svg/i-one.svg';
                case 2: return '/svg/i-two.svg';
                default: return '/svg/i-multi.svg';
            }
        },
        getPersonsText(number) {
            switch (number) {
                case 1: return this.$t('single');
                case 2: return this.$t('double');
                case 3: return this.$t('triple');
                case 4: return this.$t('quadruple');
                case 5: return this.$t('five-seater');
                case 6: return this.$t('six-seater');
                case 7: return this.$t('seven-seater');
                case 8: return this.$t('eight-seater');
                default: return this.$t('not specified');
            }
        },
        getRoomName(room) {

            let names = ['', this.$t('Single room'), this.$t('Double room'), this.$t('Triple room'), this.$t('Quadruple'), this.$t('Quintuple'), this.$t('Six-seater'), this.$t('Seven-seater'), this.$t('Eight-seater'), this.$t('Nine-seater'), this.$t('Ten-seater') ]
            return names[room.person] ? names[room.person] : 'n/a';
        },
        getMinRoomPrice(room) {
            if (room.price) {
                return Math.floor(room.price);
            }
            return this.minRoomPrice;
        },

    },
    computed: {
        minRoomPrice() {
            let prices = this.rooms.map( elem => elem.price ).filter( elem => elem > 0);
            if (prices.length === 0) {
                return 0
            }
            return Math.floor(Math.min( ...prices ));
        },
        roomTypes() {
            let types = []
            this.rooms.forEach( item => {
                let index = types.findIndex( itm => itm.name === item.room_type.name );
                if (index === -1) {
                    index = types.length;
                    types.push({
                        name: item.room_type.name,
                        number: 0,
                        person: 0,
                        price: 0,
                        ppl: 0,
                        minPpl: ''
                    })
                }
                types[index].number += item.number;
                types[index].persons += item.number * item.person;
                types[index].price = types[index].price ? Math.min(types[index].price, item.price) : item.price;
                types[index].minPpl = types[index].minPpl ? Math.min(types[index].minPpl, item.person) : item.person;
            })
            return types;
        }
    }
}
</script>

<style scoped>

</style>
