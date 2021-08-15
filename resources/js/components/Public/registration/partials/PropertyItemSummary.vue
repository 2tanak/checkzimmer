<template>
    <div class="object-data-table-type object-data-table-line">

        <div class="select-type object-data-select">
            <img v-if="picture" :src="picture" />
            <svg v-else width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path d="M1.50098 5.5V13.5H13.001V5.5L7.00098 0.5L1.50098 5.5Z" fill="#DDE4EB"></path>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.34244 0.129383L13.1758 5.29357C13.2863 5.39121 13.3494 5.53154 13.3494 5.67892V13.4853C13.3494 13.7696 13.119 14 12.8347 14H1.16804C0.883745 14 0.65332 13.7696 0.65332 13.4853V5.67892C0.65332 5.53154 0.716456 5.39119 0.826788 5.29357L6.66011 0.129383C6.85485 -0.0432097 7.1477 -0.0430457 7.34244 0.129383ZM9.24997 12.9706H12.32V5.91072L7.00135 1.20219L1.68276 5.91072V12.9706H4.75489V8.93855C4.75489 8.65425 4.98528 8.42383 5.26958 8.42383H8.73525C9.01955 8.42383 9.24995 8.65425 9.24997 8.93855V12.9706ZM8.2204 12.9706V9.45324H5.78429V12.9706H8.2204Z" fill="#7A8793"></path>
                </g>
                <defs>
                    <clipPath id="clip0">
                        <rect width="14" height="14" fill="white" transform="translate(0.000976562)"></rect>
                    </clipPath>
                </defs>
            </svg>

            <v-select v-model="property.name"  name="select-type-item" id="select-type-room" :options="roomTypesList" @input="roomTypeSelected"></v-select>
        </div>

        <div class="quality-input-block">
            <div class="quality-head-mobile table-head-item table-head-item-mobile">{{ $t('QTY') }}</div>
            <input type="text" value="" name="quality-input" placeholder="0" v-model="property.num">
        </div>
        <div class="personen-input-block">
            <div class="personen-head-mobile table-head-item table-head-item-mobile">{{ $t('Personen') }}</div>
            <input type="text" value="" name="personen-input" placeholder="0" v-model="property.persons">
        </div>
        <div class="price-input-block">
            <div class="price-head-mobile table-head-item table-head-item-mobile">{{ $t('PRICE / PERSON') }}</div>
            <span class="from">{{ $t('from') }}</span>
            <input type="text" value="" name="price-input" placeholder="0" v-model="property.price">
            <span class="dollar-sign">€</span>
        </div>
        <div class="object-data-link">
            <a href="#" class="duplicate duplicate-desctope" @click.prevent="duplicateType">{{ $t('Duplicate') }}</a>
            <a href="#" class="duplicate duplicate-mobile" @click.prevent="duplicateType">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 4.4V13.6H12.6V4.4H5.4ZM5 3C4.44772 3 4 3.44772 4 4V14C4 14.5523 4.44772 15 5 15H13C13.5523 15 14 14.5523 14 14V4C14 3.44772 13.5523 3 13 3H5Z" fill="#9496A4"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.9998 1.70005C2.83412 1.70005 2.6998 1.83436 2.6998 2.00005V11C2.6998 11.3866 2.3864 11.7 1.9998 11.7C1.61321 11.7 1.2998 11.3866 1.2998 11V2.00005C1.2998 1.06117 2.06092 0.300049 2.9998 0.300049H9.9998C10.3864 0.300049 10.6998 0.613449 10.6998 1.00005C10.6998 1.38665 10.3864 1.70005 9.9998 1.70005H2.9998Z" fill="#9496A4"/>
                </svg>
            </a>
            <a href="#" :class="{'delete': true, 'delete-desctope': true, 'not-active': index === 0}" @click.prevent="deleteType">{{ $t('Delete (register)') }}</a>
            <a href="#" :class="{'delete': true, 'delete-mobile': true, 'not-active': index === 0}" @click.prevent="deleteType">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19497 3.20503C3.92161 2.93166 3.47839 2.93166 3.20503 3.20503C2.93166 3.47839 2.93166 3.92161 3.20503 4.19497L7.21025 8.2002L3.20542 12.205C2.93205 12.4784 2.93205 12.9216 3.20542 13.195C3.47878 13.4683 3.922 13.4683 4.19537 13.195L8.2002 9.19015L12.205 13.195C12.4784 13.4683 12.9216 13.4683 13.195 13.195C13.4683 12.9216 13.4683 12.4784 13.195 12.205L9.19015 8.2002L13.1954 4.19497C13.4687 3.92161 13.4687 3.47839 13.1954 3.20503C12.922 2.93166 12.4788 2.93166 12.2054 3.20503L8.2002 7.21025L4.19497 3.20503Z" fill="#9496A4"/>
                </svg>
            </a>
        </div>
    </div>
</template>

<script>

export default {
    name: "PropertyItemSummary",
    props: ['roomTypes', 'property', 'index'],
    data() {
        return {
            myValue: '',
            picture: false,
            options: [
                { code: 0, label: 'Выберите номер' },
                { code: 1, label: 'Квартира' },
                { code: 2, label: 'Дом (целиком)' },
                { code: 3, label: 'Пансионат' },
                { code: 4, label: 'Гостевой дом' },
                { code: 5, label: 'Хостел' },
                { code: 6, label: 'Отель' },

            ]
        }
    },
    methods: {
        roomTypeSelected(value) {
            let itemIndex = this.roomTypes.findIndex( item => item.name === value )
            if (itemIndex === -1) {
                return false;
            }
            return this.roomTypes[itemIndex].picture;
        },
        deleteType() {
            if (this.index === 0) {
                return false;
            }
            this.$emit('deleteType', this.index);
        },
        duplicateType() {
            this.$emit('duplicateType', this.index);
        }
    },
    computed: {
        roomTypesList() {
            return this.roomTypes.map( item => item.name);
        }
    }
}
</script>

<style lang="scss">

.registration-section {
    .object-data-table {
        .table-head-item-mobile {
            display: none;
        }
        .object-data-table-line {
            border-bottom: 1px solid #edeef0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .object-data-table-type {
            input {
                &::-webkit-input-placeholder {
                    font-weight: 600;
                    font-size: 12px;
                    line-height: 300%;
                    color: #8F98A2;
                }
                &::-moz-placeholder {
                    font-weight: 600;
                    font-size: 12px;
                    line-height: 300%;
                    color: #8F98A2;
                }
                &:-moz-placeholder {
                    font-weight: 600;
                    font-size: 12px;
                    line-height: 300%;
                    color: #8F98A2;
                }
                &:-ms-input-placeholder {
                    font-weight: 600;
                    font-size: 12px;
                    line-height: 300%;
                    color: #8F98A2;
                }
                font-weight: 600;
            }
            background: #FBFCFF;
            border-radius: 2px;
            padding-left: 9px;
        }
        .select-type {
            svg {
                margin-right: 6px;
            }
        }
        input {
            &:focus {
                background: #FFFFFF;
                border: 1px solid #C0C1C2;
                border-radius: 6px;
                box-shadow: 0 0 0 4px rgb(243 243 243 / 90%);
            }
            background: #F3F3F3;
            border-radius: 6px;
            padding: 0 12px;
            border: 0;
            outline: none;
            font-weight: 400;
            font-size: 12px;
            line-height: 300%;
            color: #333646;
        }
        .price-input-block {
            input {
                width: 57px;
                height: 29px;
            }
            span.from {
                font-weight: 500;
                font-size: 10px;
                line-height: 356.5%;
                color: #333646;
                margin-right: 6px;
            }
            span.dollar-sign {
                font-weight: 700;
                font-size: 10px;
                line-height: 360.5%;
                color: #333646;
                margin-left: 4px;
            }
            display: flex;
            align-items: center;
        }
        .personen-input-block {
            input {
                width: 57px;
                height: 29px;
            }
        }
        .quality-input-block {
            input {
                width: 50px;
                height: 29px;
            }
        }
        .object-data-link {
            a {
                text-decoration: none;
                font-weight: 400;
                font-size: 12px;
                line-height: 100%;
                color: #333646;
                outline: none;
                transition: all 0.2s;
            }
            a.duplicate {
                &:hover {
                    color: #3B8B3E;
                }
                margin-right: 20px;
            }
            a.not-active {
                pointer-events: none;
                color: #B5B7C1;
            }
            a.delete {
                &:hover {
                    color: #EE483F;
                }
            }
            a.duplicate.duplicate-mobile {
                display: none;
            }
            a.delete.delete-mobile {
                display: none;
            }
            display: flex;
            align-items: center;
            margin-right: 24px;
        }
        .object-data-select {
            display: flex;
            align-items: center;
        }
        .table-head-item {
            font-weight: 600;
            font-size: 10px;
            line-height: 140%;
            letter-spacing: 0.02em;
            text-transform: uppercase;
            color: #8F98A2;
            white-space: nowrap;
        }
        .selected-object {
            svg.mobile-line {
                display: none;
            }
        }
    }
    .object-data-table-room {
        .select-room {
            margin-left: 29px;
            position: relative;
        }
    }
}

@media (max-width: 760px) {
    .registration-section {
        .object-data-table {
            .price-input-block {
                margin-right: 23px;
            }
            .object-data-link {
                a.duplicate.duplicate-desctope {
                    display: none;
                }
                a.duplicate.duplicate-mobile {
                    display: block;
                }
                a.delete.delete-mobile {
                    display: block;
                }
                a.delete.delete-desctope {
                    display: none;
                }
                a.duplicate {
                    margin-right: 12px;
                }
                margin-right: 12px;
            }
            .select-room {
                margin-right: 10px;
                margin-left: 36px;
            }
            .select-type {
                margin-right: 10px;
                margin-left: 7px;
            }
            .quality-input-block {
                margin-right: 10px;
            }
            .personen-input-block {
                margin-right: 10px;
            }
        }
    }
}
@media (max-width: 479px) {
    .registration-section {
        .object-data-table {
            .table-head-item-mobile {
                display: block;
            }
            .object-data-table-line {
                &:first-of-type {
                    border-top: 1px solid #edeef0;
                }
                &:last-of-type {
                    border-bottom: 0;
                }
                flex-direction: column;
                align-items: flex-start;
            }
            input {
                width: 100% !important;
            }
            .price-input-block {
                input {
                    margin-left: 0;
                }
                margin-right: 0;
                margin-left: 0;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding-left: 34px;
                width: 100%;
            }
            .object-data-link {
                a.duplicate.duplicate-mobile {
                    display: none;
                }
                a.duplicate.duplicate-desctope {
                    display: block;
                }
                a.delete.delete-desctope {
                    display: block;
                }
                a.delete.delete-mobile {
                    display: none;
                }
                a.duplicate {
                    margin-right: 20px;
                }
                margin-right: 0;
                margin-left: 34px;
                margin-top: 5px;
            }
            .select-room {
                margin-right: 0;
                margin-left: 0;
                width: 100%;
                margin-bottom: 15px;
                padding-left: 20px;
            }
            .selected-object {
                .select-room {
                    svg.mobile-line {
                        display: block;
                        position: absolute;
                        top: -208px;
                        left: 6px;
                    }
                }
                .object-data-table-line {
                    padding: 14px 16px 20px 16px;
                }
            }
            .select-type {
                margin-right: 0;
                margin-left: 0;
                width: 100%;
                margin-bottom: 15px;
            }
            .quality-input-block {
                margin-right: 0;
                margin-left: 0;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding-left: 34px;
                padding-right: 11px;
                width: 100%;
            }
            .personen-input-block {
                margin-right: 0;
                margin-left: 0;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding-left: 34px;
                padding-right: 11px;
                width: 100%;
            }
            .quality-head-mobile {
                margin-right: 44px;
            }
            .personen-head-mobile {
                margin-right: 30px;
            }
            .price-head-mobile {
                margin-right: 10px;
            }
        }
    }
}

</style>
