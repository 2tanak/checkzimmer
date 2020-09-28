<template>
    <section class="header-dashboard">
        <h1 style="font-size:26px;">Редактирование отеля</h1>
        <div class="delete-hotel-container">
            <h2 style="margin-bottom:0;">{{ property.name }}</h2>
            <b-button v-b-modal.deleteHotelModal variant="danger" @click="deleteHotel">Удалить отель</b-button>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <b-form-group label="Название отеля" label-for="input-hotel-name">
                                        <b-form-input :value="property.name" id="input-hotel-name"></b-form-input>
                                    </b-form-group>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row mt-4 mb-4">
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
                                        <div class="col-md-12">
                                            <b-form-group label="Адрес" label-for="input-hotel-address">
                                                <b-form-input :value="property.address" id="input-hotel-address"></b-form-input>
                                            </b-form-group>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Фото</h4>
                                    <div class="row mt-4 photos-gallery">
                                        <div class="col-xl-2 col-lg-3 col-sm-4 mb-4" v-for="photo in hotelPhotos">
                                            <div class="photos-gallery-item">
                                                <img :src="photo.url_max300">
                                                <a class="delete-photo-link" href="" v-b-modal.deletePhotoBigGallery @click.prevent="deletePhotoBigGallery">&times;</a>
                                                <div v-b-modal.bigPhotoModal class="blackout"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-4 add-photo-container">
                                            <input type="file" id="add-photo" class="inputfile">
                                            <label for="add-photo"><span>&#10010;</span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="margin-bottom:0;">Номера</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4" v-for="(room, i) in property.rooms">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <b-button class="button-collapse" v-b-toggle="'id-'+room.id"> Комната № {{ i+1 }}</b-button>
                                    </div>
                                    <div class="col-2" style="text-align:right;">
                                        <b-button variant="danger" v-b-modal.deleteRoom>Удалить комнату</b-button>
                                    </div>
                                </div>
                                <b-collapse :id="'id-'+room.id" visible>
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-xl-6 mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <b-form-group label="Наименование" :label-for="'input-room-'+i+'-name'">
                                                            <b-form-input :value="getName(property.rooms[i])" :id="'input-room-'+i+'-name'"></b-form-input>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b-form-group label="Описание" :label-for="'input-room-'+i+'-descr'">
                                                            <b-form-textarea style="height:80px;" :value="getDescription(property.rooms[i])" :id="'input-room-'+i+'-name'"></b-form-textarea>
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
                                                                <b-select-option value="shared">Совместная</b-select-option>
                                                                <b-select-option value="kitchenette">Кухонька</b-select-option>
                                                                <b-select-option value="none">Отсутствует</b-select-option>
                                                            </b-select>
                                                        </b-form-group>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="row photos-gallery">
                                                    <div class="col-md-3 mb-4" v-for="photo in getRoomPhotos(property.rooms[i])">
                                                        <div class="photos-gallery-item">
                                                            <img :src="photo.url_max300">
                                                            <a class="delete-photo-link" href="" v-b-modal.deletePhotoSmallGallery @click.prevent="deletePhotoSmallGallery">&times;</a>
                                                            <div class="blackout"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4 add-photo-container">
                                                        <input type="file" id="add-photo-room" class="inputfile">
                                                        <label for="add-photo"><span>&#10010;</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </b-collapse>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <b-button type="submit" variant="outline-primary" class="mr-2" @click="addRoom">Добавить комнату</b-button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b-button type="submit" variant="success" class="mr-2" @click="save">Сохранить</b-button>
            </div>
        </div>

        <b-modal id="deleteHotelModal" title="Delete Hotel" @ok="deleteHotelOk">
            <p class="text-danger">Are you sure you want to delete {{ property.name }}</p>
        </b-modal>

        <b-modal id="deletePhotoBigGallery" title="Delete Hotel" @ok="deletePhotoBigGalleryOk">
            <p class="text-danger">Are you sure you want to delete this photo?</p>
        </b-modal>

        <b-modal id="deletePhotoSmallGallery" title="Delete Hotel" @ok="deletePhotoSmallGalleryOk">
            <p class="text-danger">Are you sure you want to delete this photo?</p>
        </b-modal>

        <b-modal id="deleteRoom" title="Delete Room" @ok="deleteRoomOk">
            <p class="text-danger">Are you sure you want to delete this room?</p>
        </b-modal>

        <b-modal id="bigPhotoModal" size="xl" title="Picture"></b-modal>

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
            property: {}
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
        },
        deleteHotel() {

        },
        deleteHotelOk() {

        },
        deletePhotoBigGallery() {

        },
        deletePhotoSmallGallery() {

        },
        save() {

        },
        addRoom() {

        },
        deletePhotoBigGalleryOk() {

        },
        deletePhotoSmallGalleryOk() {

        },
        deleteRoomOk() {

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
    .photos-gallery .photos-gallery-item {
        position: relative;
    }
    .photos-gallery .photos-gallery-item .blackout {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) scale(0);
        background-color: rgba(0,0,0,0.8);
        transition: all 0.2s;
        width: 0;
        height: 0;
    }
    .photos-gallery .photos-gallery-item:hover .blackout {
        width: 100%;
        height: 100%;
        transform: translate(-50%, -50%) scale(1);
        cursor: pointer;
    }
    .photos-gallery img {
        width: 100%;
        height: 150px;
        object-fit: cover
    }
    .photos-gallery .photos-gallery-item a.delete-photo-link {
        position: absolute;
        top: 5px;
        right: -17px;
        z-index: 10;
        text-decoration: none;
        color: #fff;
        font-size: 28px;
        line-height: 15px;
        transition: all 0.3s;
    }
    .photos-gallery .photos-gallery-item:hover a.delete-photo-link {
        right: 5px;
    }
    .delete-hotel-container {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
    }
    .add-photo-container .inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }
    .add-photo-container .inputfile + label {
        width: 100%;
        height: 100%;
        margin-bottom: 0;
        background-color: #d6e5ef;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        min-height: 150px;
    }
    .add-photo-container label span {
        font-size: 24px;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        border: 4px solid #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }
    .add-photo-container label:hover {
        background-color: #cde4f3;
    }
    .button-collapse {
        background-color:transparent;
        border:0;
        width:100%;
        text-align:left;
        outline: none;
        padding-left: 0;
    }
    .button-collapse:active {
        background-color: transparent !important;
        border-color: transparent !important;
    }
    .button-collapse:focus {
        box-shadow: none !important;
    }
</style>
