<template>
    <section class="accommodation-facility-section">
        <div class="title">
            {{ $t('Accommodation data') }}
            <a href="#">{{  $t('Change') }}</a>
        </div>
        <div class="accommodation-facility-table">
            <div class="head-table">
                <div>{{ $t('type') }}</div>
                <div>{{ $t('Num') }}</div>
                <div>{{ $t('persone') }}</div>
                <div>{{ $t('Price') }}</div>
            </div>

            <div v-for="propertyItem in property.propertyTypes" class="table-block">
                <div class="table-line table-head-line">
                    <div>
                        <img :src="getPicture(propertyItem)" alt="">
                        {{ propertyItem.name }}
                    </div>
                    <div>{{ propertyItem.num }}x</div>
                    <div>{{ propertyItem.persons }}</div>
                    <div><span>{{ $t('from') }}</span>{{ propertyItem.price }}&euro;</div>
                </div>
                <div v-for="room in propertyItem.rooms" class="table-line table-body-line">
                    <div>
                        <svg class="line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
                        </svg>
                        <img :src="getRoomPicture(room.persons)" alt="">
                        {{  room.name  }}
                    </div>
                    <div>{{ room.num }}x</div>
                    <div>{{ room.persons }}</div>
                    <div><span>{{ $t('from') }}</span>{{ room.price }}&euro;</div>
                </div>
            </div>

        </div>
    </section>

</template>

<script>
import ApiRequest from "../../../API/ApiRequest";

let roomTypesRequest = ApiRequest('room-types');
let roomTypes = new roomTypesRequest;

export default {
    name: "PropertyDataSummary",
    props: ['property'],
    data() {
        return {
            roomTypes: []
        }
    },
    mounted() {
        roomTypes.all()
            .then(resp => {
                this.roomTypes = resp.data;
            })
    },
    methods: {
        getPicture(propertyItem) {
            let item = this.roomTypes.find( item => item.name === propertyItem.name);
            return item ? item.picture : '/svg/i-house-filled.svg';
        },
        getRoomPicture(persons) {
            switch (persons) {
                case 1: return '/svg/i-one.svg';
                case 2: return '/svg/i-two.svg'
            }
            return '/svg/i-multi.svg';
        }
    }
}
</script>

<style scoped>

</style>
