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
            <input type="text" value="" name="quality-input" id="quality-input" placeholder="0" v-model="room.num">
        </div>
        <div class="personen-input-block">
            <div class="personen-head-mobile table-head-item table-head-item-mobile">{{ $t('Personen') }}</div>
            <input type="text" value="" name="personen-input" id="personen-input" placeholder="0" v-model="room.persons">
        </div>
        <div class="price-input-block">
            <div class="price-head-mobile table-head-item table-head-item-mobile">{{ $t('PRICE / PERSON') }}</div>
            <span class="from">{{ $t('from') }}</span>
            <input type="text" value="" name="price-input" id="price-input" placeholder="0" v-model="room.price">
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

<style scoped>

</style>
