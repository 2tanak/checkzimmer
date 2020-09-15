<template>

    <section class="header-dashboard">
        <h1>Маппинг объектов</h1>


        <div class="row mt-5">
            <div class="col-md-6">
                <h2>Маппинг удобств</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4" v-for="(row, i) in mappingFeatureRows">
                            <div class="col-md-6">
                                <h4>Типы удобств на Booking.com</h4>
                                <b-select v-model="mappingFeatureRows[i].mapping_booking_feature_select, selected">
                                    <b-select-option value="null">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="elementName in featureBooking" href="#" :value="elementName.name">{{ elementName.name }}</b-select-option>
                                </b-select>
                            </div>
                            <div class="col-md-6">
                                <h4>Типы удобств на сайте</h4>
                                <b-select v-model="mappingFeatureRows[i].mapping_site_feature_select, selected">
                                    <b-select-option value="null">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="elementName in featureSite" href="#" :value="elementName.name">{{ elementName.name }}</b-select-option>
                                </b-select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4" style="text-align:right;">
                                <b-button @click="addRowFeature" variant="success">Добавить ряд</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h2>Маппинг типов жилья</h2>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4" v-for="(row, i) in mappingHousingRows">
                            <div class="col-md-6">
                                <h4>Типы жилья на Booking.com</h4>
                                <b-select v-model="mappingHousingRows[i].mapping_booking_housing_select, selected">
                                    <b-select-option value="null">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="elementName in housingBooking" href="#" :value="elementName.name">{{ elementName.name }}</b-select-option>
                                </b-select>
                            </div>
                            <div class="col-md-6">
                                <h4>Типы жилья на сайте</h4>
                                <b-select v-model="mappingHousingRows[i].mapping_site_housing_select, selected">
                                    <b-select-option value="null">Ничего не выбрано</b-select-option>
                                    <b-select-option v-for="elementName in housingSite" href="#" :value="elementName.name">{{ elementName.name }}</b-select-option>
                                </b-select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-4" style="text-align:right;">
                                <b-button @click="addRowHousing" variant="success">Добавить ряд</b-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>

export default {
    name: "Index",
    data() {
        return {
            selected: null,
            typeHousingSiteSelect: '',
            typeHousingBookingSelect: '',
            housingSite: [
                { created_at: '', feature_category: '', feature_category_id: 1, id: 1, name: 'Квартира', ord: 1, picture: '', updated_at: '' },
                { created_at: '', feature_category: '', feature_category_id: 1, id: 1, name: 'Гостиница', ord: 1, picture: '', updated_at: '' },
                { created_at: '', feature_category: '', feature_category_id: 1, id: 1, name: 'Дом', ord: 1, picture: '', updated_at: '' },
            ],
            housingBooking: [
                { created_at: '', id: 1, name: "Apartments", native_id: "201", type: "hotel", updated_at: '' },
                { created_at: '', id: 2, name: "Hostels", native_id: "201", type: "hotel", updated_at: '' },
                { created_at: '', id: 3, name: "Hotel", native_id: "201", type: "hotel", updated_at: '' }
            ],
            featureBooking: [
                { created_at: '', id: 1, name: "Parking", native_id: "2", parent: 1, type: "hotel", updated_at: '' },
                { created_at: '', id: 2, name: "Wi-Fi", native_id: "2", parent: 1, type: "hotel", updated_at: '' },
                { created_at: '', id: 3, name: "Darts", native_id: "2", parent: 1, type: "hotel", updated_at: '' }
            ],
            featureSite: [
                { created_at: '', id: 1, lang: "ru", name: "Кухня", ord: 1, updated_at: '' },
                { created_at: '', id: 2, lang: "ru", name: "Wi-Fi", ord: 1, updated_at: '' },
                { created_at: '', id: 3, lang: "ru", name: "Игры", ord: 1, updated_at: '' }
            ],
            mappingFeatureRows: [
                { mapping_booking_feature_select: '', mapping_site_feature_select: '' }
            ],
            mappingHousingRows: [
                { mapping_booking_housing_select: '', mapping_site_housing_select: '' }
            ]
        }
    },
    mounted() {
    },
    methods: {
        addRowFeature() {
            this.mappingFeatureRows.push({
                mapping_booking_feature_select: '',
                mapping_site_feature_select: ''
            });
        },
        addRowHousing() {
            this.mappingHousingRows.push({
                mapping_booking_housing_select: '',
                mapping_site_housing_select: ''
            });
        }
    }
}
</script>

<style scoped>

</style>
