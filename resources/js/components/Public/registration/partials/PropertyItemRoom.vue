<template>
    <div class="object-data-table-room object-data-table-line">
        <div class="select-room object-data-select">
            <svg class="desctope-line" width="10" height="27" viewBox="0 0 10 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223858 1 0.5V25.5C1 25.7761 1.22386 26 1.5 26H9.5C9.77614 26 10 26.2239 10 26.5C10 26.7761 9.77614 27 9.5 27H1.5C0.671573 27 0 26.3284 0 25.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
            </svg>
            <svg class="mobile-line" width="10" height="223" viewBox="0 0 10 223" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 0C0.776142 0 1 0.223861 1 0.500004V221.5C1 221.776 1.22386 222 1.5 222H9.5C9.77614 222 10 222.224 10 222.5C10 222.776 9.77614 223 9.5 223H1.5C0.671573 223 0 222.328 0 221.5V0.5C0 0.223858 0.223858 0 0.5 0Z" fill="#CCD1DA"/>
            </svg>

            <v-select v-model="room.name"  name="select-type-item" id="select-type-room" :options="options"></v-select>
        </div>
        <div class="quality-input-block">
            <div class="quality-head-mobile table-head-item table-head-item-mobile">{{ $t('QTY') }}</div>
            <input type="text" value="" name="quality-input" placeholder="0" v-model="room.num">
        </div>
        <div class="personen-input-block">
            <div class="personen-head-mobile table-head-item table-head-item-mobile">{{ $t('Personen') }}</div>
            <input type="text" value="" name="personen-input" placeholder="0" v-model="room.persons">
        </div>
        <div class="price-input-block">
            <div class="price-head-mobile table-head-item table-head-item-mobile">{{ $t('PRICE / PERSON') }}</div>
            <span class="from">{{ $t('from') }}</span>
            <input type="text" value="" name="price-input" placeholder="0" v-model="room.price">
            <span class="dollar-sign">€</span>
        </div>
        <div class="object-data-link">
            <a href="#" class="duplicate duplicate-desctope" @click.prevent="duplicateMe">{{ $t('Duplicate') }}</a>
            <a href="#" class="duplicate duplicate-mobile" @click.prevent="duplicateMe">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.4 4.4V13.6H12.6V4.4H5.4ZM5 3C4.44772 3 4 3.44772 4 4V14C4 14.5523 4.44772 15 5 15H13C13.5523 15 14 14.5523 14 14V4C14 3.44772 13.5523 3 13 3H5Z" fill="#9496A4"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.9998 1.70005C2.83412 1.70005 2.6998 1.83436 2.6998 2.00005V11C2.6998 11.3866 2.3864 11.7 1.9998 11.7C1.61321 11.7 1.2998 11.3866 1.2998 11V2.00005C1.2998 1.06117 2.06092 0.300049 2.9998 0.300049H9.9998C10.3864 0.300049 10.6998 0.613449 10.6998 1.00005C10.6998 1.38665 10.3864 1.70005 9.9998 1.70005H2.9998Z" fill="#9496A4"/>
                </svg>
            </a>
            <a href="#" class="delete delete-desctope" @click.prevent="deleteMe">{{ $t('Delete (register)') }}</a>
            <a href="#" class="delete delete-mobile" @click.prevent="deleteMe">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.19497 3.20503C3.92161 2.93166 3.47839 2.93166 3.20503 3.20503C2.93166 3.47839 2.93166 3.92161 3.20503 4.19497L7.21025 8.2002L3.20542 12.205C2.93205 12.4784 2.93205 12.9216 3.20542 13.195C3.47878 13.4683 3.922 13.4683 4.19537 13.195L8.2002 9.19015L12.205 13.195C12.4784 13.4683 12.9216 13.4683 13.195 13.195C13.4683 12.9216 13.4683 12.4784 13.195 12.205L9.19015 8.2002L13.1954 4.19497C13.4687 3.92161 13.4687 3.47839 13.1954 3.20503C12.922 2.93166 12.4788 2.93166 12.2054 3.20503L8.2002 7.21025L4.19497 3.20503Z" fill="#9496A4"/>
                </svg>
            </a>
        </div>
    </div>
</template>

<script>

export default {
    name: "PropertyItemRoom",
    props: [ 'room', 'index' ],
    components: {},
    data() {
        return {
            myValue: '',
            options: [ this.$t('Select room'), this.$t('Single'), this.$t('Double'), this.$t('Triple'), this.$t('Quadruple'), this.$t('Five-seater'), this.$t('Multi-seat') ],
        }

    },
    methods: {
        duplicateMe() {
            this.$emit('duplicate', this.index)
        },
        deleteMe() {
            this.$emit('delete', this.index)
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
        .select-type {
            svg {
                margin-right: 6px;
            }
        }
        .price-input-block {
            input {
                width: 57px;
                height: 29px;
            }
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
        .price-input-block {
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
        svg.desctope-line {
            position: absolute;
            top: -13px;
            left: -13px;
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
                margin-right: 0;
                margin-left: 0;
                margin-bottom: 15px;
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding-left: 34px;
                width: 100%;
            }
            .price-input-block {
                input {
                    margin-left: 0;
                }
            }
            .select-room {
                margin-right: 0;
                margin-left: 0;
                width: 100%;
                margin-bottom: 15px;
                padding-left: 20px;
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
                margin-right: 0;
                margin-left: 34px;
                margin-top: 5px;
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
                svg.desctope-line {
                    display: none;
                }
                .add-room {
                    svg.mobile-line {
                        display: block;
                        position: absolute;
                        top: -200px;
                        left: 22px;
                    }
                }
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
