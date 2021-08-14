<template>
    <section class="accommodation-facility-section">
        <div class="title">
            {{ $t('Accommodation data') }}
            <a href="#" @click.prevent="toPropertyData">{{  $t('Change') }}</a>
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
                <template v-for="room in propertyItem.rooms">
                    <div v-if="room.name" class="table-line table-body-line">
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
                </template>
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
        },
        toPropertyData() {
            this.$emit('toPropertyData', '');
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .accommodation-facility-section {
        &:after {
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
        background: #FFFFFF;
        box-shadow: 0 0 14px rgb(51 54 70 / 14%);
        border-radius: 12px;
        padding: 30px 16px 0 16px;
        margin-bottom: 20px;
        max-width: 780px;
        width: 100%;
        position: relative;
    }
    .title {
        a {
            font-weight: 500;
            font-size: 14px;
            line-height: 100%;
            color: #3B8B3E;
            text-decoration: none;
        }
        margin-bottom: 16px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .accommodation-facility-table {
        .head-table {
            div {
                &:first-of-type {
                    width: 120px;
                }
                &:nth-of-type(2) {
                    width: 45px;
                }
                &:nth-of-type(3) {
                    width: 57px;
                }
                &:last-of-type {
                    width: 56px;
                }
                font-weight: 600;
                font-size: 10px;
                line-height: 140%;
                letter-spacing: 0.02em;
                text-transform: uppercase;
                color: #8F98A2;
            }
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            height: 30px;
            padding: 0 36px;
        }
        .table-line {
            div {
                &:first-of-type {
                    img {
                        margin-right: 7px;
                    }
                    width: 120px;
                    display: flex;
                    align-items: center;
                    position: relative;
                }
                &:nth-of-type(2) {
                    width: 45px;
                    text-align: center;
                }
                &:nth-of-type(3) {
                    width: 57px;
                    text-align: center;
                }
                &:last-of-type {
                    width: 56px;
                }
            }
            svg.line {
                position: absolute;
                top: -6px;
                left: -14.5px;
            }
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .table-head-line {
            div {
                span {
                    font-size: 10px;
                }
                &:last-of-type {
                    font-weight: 700;
                }
                &:nth-of-type(2) {
                    margin-left: 21px;
                }
                font-weight: 600;
                font-size: 12px;
                line-height: 300%;
                color: #333646;
            }
            padding-left: 15px;
            padding-right: 36px;
            background-color: #f7f8fa;
        }
        .table-body-line {
            &:last-of-type {
                border-bottom: 0;
            }
            div {
                font-weight: 400;
                font-size: 12px;
                line-height: 300%;
                color: #333646;
            }
            padding-left: 36px;
            padding-right: 36px;
            height: 36px;
            border-bottom: 1px solid #edeef0;
        }
        padding-bottom: 17px;
    }
}

@media (max-width: 1040px) {
    .registration-section {
        .title {
            font-size: 18px;
        }
        .accommodation-facility-section {
            &::after {
                width: calc(100% - 32px);
            }
            max-width: none;
            border-radius: 0;
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .accommodation-facility-table {
            .head-table {
                padding: 0 10px;
            }
            .table-head-line {
                div {
                    &:nth-of-type(2) {
                        margin-left: 0;
                    }
                }
                padding: 0 10px;
            }
            .table-body-line {
                padding:  0 10px;
            }
            .table-line {
                svg.line {
                    display: none;
                }
            }
        }
    }
}

</style>
