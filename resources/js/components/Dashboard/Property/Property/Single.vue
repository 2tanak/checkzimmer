<template>
    <section class="header-dashboard">
        <h1>Редактирование отеля</h1>
        <h2>{{ property.name }}</h2>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-12">
                                    <b-form-group label="Название отеля" label-for="input-hotel-name">
                                        <b-form-input :value="property.name" id="input-hotel-name"></b-form-input>
                                    </b-form-group>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <b-form-group label="Широта" label-for="input-hotel-lat">
                                        <b-form-input :value="property.lat" id="input-hotel-lat"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-3">
                                    <b-form-group label="Долгота" label-for="input-hotel-lng">
                                        <b-form-input :value="property.lng" id="input-hotel-lng"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-3">
                                    <b-form-group label="Город" label-for="input-hotel-city">
                                        <b-form-input :value="property.city" id="input-hotel-city"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-3">
                                    <b-form-group label="Почтовый индекс" label-for="input-hotel-lng">
                                        <b-form-input :value="property.zip" id="input-hotel-lng"></b-form-input>
                                    </b-form-group>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <b-form-group label="Адрес" label-for="input-hotel-address">
                                        <b-form-input :value="property.address" id="input-hotel-address"></b-form-input>
                                    </b-form-group>
                                </div>
                            </div>
                            <h4 class="mt-4">Фото</h4>
                            <div class="row mt-4 photos-gallery">
                                <div class="col-md-2 mb-2" v-for="photo in hotelPhotos">
                                    <img :src="photo.url_max300">
                                </div>
                            </div>
                            <h4 class="mt-4 ">Номера</h4>
                            <div class="row mt-4" v-for="(room, i) in property.rooms">
                                <div class="col-md-12 mb-4">
                                    Комната № {{ i+1 }}
                                </div>
                                <div class="col-md-6">
                                    <b-form-group label="Наименование" :label-for="'input-room-'+i+'-name'">
                                        <b-form-input :value="getName(property.rooms[i])" :id="'input-room-'+i+'-name'"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-6">
                                    <b-form-group label="Описание" :label-for="'input-room-'+i+'-descr'">
                                        <b-form-input :value="getDescription(property.rooms[i])" :id="'input-room-'+i+'-name'"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Количество номеров" :label-for="'input-room-'+i+'-number'">
                                        <b-form-input :value="property.rooms[i].number" :id="'input-room-'+i+'-name'"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Количество человек" :label-for="'input-room-'+i+'-person'">
                                        <b-form-input :value="property.rooms[i].person" :id="'input-room-'+i+'-person'"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Стоимость, от" :label-for="'input-room-'+i+'-price'">
                                        <b-form-input :value="property.rooms[i].price" :id="'input-room-'+i+'-price'"></b-form-input>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Душ" :label-for="'input-room-'+i+'-shower'">
                                        <b-select v-model="property.rooms[i].shower">
                                            <b-select-option value="single">Свой</b-select-option>
                                            <b-select-option value="shared">Совместный</b-select-option>
                                            <b-select-option value="none">Отсутствует</b-select-option>
                                        </b-select>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Кровать" :label-for="'input-room-'+i+'-shower'">
                                        <b-select v-model="property.rooms[i].bed">
                                            <b-select-option value="single">Одноместная</b-select-option>
                                            <b-select-option value="double">Двухместная</b-select-option>
                                            <b-select-option value="none">Отсутствует</b-select-option>
                                        </b-select>
                                    </b-form-group>
                                </div>
                                <div class="col-md-4">
                                    <b-form-group label="Кухня" :label-for="'input-room-'+i+'-shower'">
                                        <b-select v-model="property.rooms[i].kitchen">
                                            <b-select-option value="single">Своя</b-select-option>
                                            <b-select-option value="shared">Свместная</b-select-option>
                                            <b-select-option value="kitchenette">Кухонька</b-select-option>
                                            <b-select-option value="none">Отсутствует</b-select-option>
                                        </b-select>
                                    </b-form-group>
                                </div>
                                <div class="row mt-4 photos-gallery">
                                    <div class="col-md-2 mb-2" v-for="photo in getRoomPhotos(property.rooms[i])">
                                        <img :src="photo.url_max300">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2">Сохранить</b-button>
            </div>
        </div>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
let PropertyRequest = ApiRequest('property')
let properties = new PropertyRequest;
let TypesRequest = ApiRequest('booking-roomtypes');
let types = new TypesRequest;

export default {
    name: "Single",
    data() {
        return {
            property: {},

        }
    },
    created() {
        properties.get(this.$route.params.item)
            .then(resp => {
                this.property = resp.data;
            })
    },
    methods: {
        getFieldValue(name, item, def, json) {
            if (!item || !item.options) {
                return def;
            }
            for (let i in item.options) {
                if (item.options[i].key === name) {
                    return json ? JSON.parse(item.options[i].value) : item.options[i].value;
                }
            }
            return def;
        },
        getPhotos() {
            return this.getFieldValue('photos', this.property, [], true);
        },
        getName(item) {
            return this.getFieldValue('name', item, '+');
        },
        getDescription(item) {
            return this.getFieldValue('description', item,'');
        },
        getRoomPhotos(item) {
            return this.getFieldValue('photos', item,'', true);
        }
    },
    computed: {
        hotelPhotos() {
            return this.getPhotos()
        }
    },
}
</script>

<style scoped>
    .photos-gallery img {
        width: 100%;
        height: 150px;
        object-fit: cover
    }
</style>
