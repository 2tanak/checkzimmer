<template>
    <section class="header-dashboard">
        <h1 style="font-size:26px;">{{ $t('Hotel editing') }}</h1>
        <div class="delete-hotel-container">
            <h2 style="margin-bottom:0;">{{ property.name }}</h2>
            <div>
                <b-button v-b-modal.deleteHotelModal variant="danger" @click="deleteHotel">{{ $t('Delete hotel') }}</b-button>
                <b-button type="submit" variant="success" class="mr-2 " @click="save">{{ $t('Save') }}</b-button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <b-form-group :label="$t('Name hotel')" label-for="input-hotel-name">
                                        <b-form-input v-model="property.name" id="input-hotel-name"></b-form-input>
                                    </b-form-group>
                                    <b-form-group :label="$t('Page address')" label-for="input-hotel-name">
                                        <b-form-input v-model="property.slug" id="input-hotel-name"></b-form-input>
                                    </b-form-group>
                                    <b-form-group :label="$t('Object display order')" label-for="input-hotel-name">
                                        <b-form-input v-model="property.ord" id="input-hotel-name"></b-form-input>
                                    </b-form-group>
                                    <b-form-group :label="$t('Object access')" label-for="input-hotel-name">
                                        <b-form-input v-model="property.access" id="input-hotel-name"></b-form-input>
                                        <small v-if="!property.access" class="text-info">{{ $t('Free access') }}</small>
                                        <small v-else class="text-danger">{{ $t('access is limited by the specified PIN codes. Codes can be separated by commas') }}</small>
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
                                            <b-form-group :label="$t('Latitude')" label-for="input-hotel-lat">
                                                <b-form-input v-model="property.lat" id="input-hotel-lat"></b-form-input>
                                            </b-form-group>
                                        </div>
                                        <div class="col-md-3">
                                            <b-form-group :label="$t('Longitude')" label-for="input-hotel-lng">
                                                <b-form-input v-model="property.lng" id="input-hotel-lng"></b-form-input>
                                            </b-form-group>
                                        </div>
                                        <div class="col-md-3">
                                            <b-form-group :label="$t('City')" label-for="input-hotel-city">
                                                <b-form-input v-model="property.city" id="input-hotel-city"></b-form-input>
                                            </b-form-group>
                                        </div>
                                        <div class="col-md-3">
                                            <b-form-group :label="$t('Postcode')" label-for="input-hotel-lng">
                                                <b-form-input v-model="property.zip" id="input-hotel-lng"></b-form-input>
                                            </b-form-group>
                                        </div>
                                        <div class="col-md-12">
                                            <b-form-group :label="$t('Address')" label-for="input-hotel-address">
                                                <b-form-input v-model="property.address" id="input-hotel-address"></b-form-input>
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
                                    <h4>{{ $t('Photo') }}</h4>
                                    <draggable class="row mt-4 photos-gallery" v-model="imageData" @start="drag=true" @end="drag=false">
                                        <div class="col-xl-2 col-lg-3 col-sm-4 mb-4" v-for="element in imageData" :key="element.id">
                                            <div class="photos-gallery-item">
                                                <img :src="element.url_max300">
                                                <a class="delete-photo-link" href="" v-b-modal.deletePhotoBigGallery @click.prevent="deletePhotoBigGallery" @click="imgPath = element.url_original">&times;</a>
                                                <div v-b-modal.bigPhotoModal class="blackout" @click="imgPath = element.url_original"></div>
                                            </div>
                                        </div>

                                    </draggable>
                                    <div class="col-md-2 mb-4 add-photo-container">
                                        <input type="file" id="add-photo" class="inputfile" ref="inputfile" @change="savePhotoHotel" accept="image/*">
                                        <label for="add-photo"><span>&#10010;</span></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4 mb-4">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4>{{ $t('Facilities') }}</h4>
                                    <template v-for="feature in features">
                                        <div class="comfort-block mt-5">
                                            <h3>{{feature.name }}</h3>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-4 col-6 comfort-block-item mt-2" v-for="itemFeature in feature.features">
                                                    <img :src="itemFeature.picture" alt="alt">
                                                    <span>{{ itemFeature.name }}</span>
                                                    <input type="checkbox" :name="itemFeature.name" v-model="itemFeature.check"  @change="addFeatures(itemFeature)">
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 style="margin-bottom:0;">{{ $t('Rooms') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <draggable
                               v-model="property.rooms"
                               @start="drag=true"
                               @update="$forceUpdate()"
                               @end="drag=false">
                    <div class="mb-4" v-for="(room, i) in property.rooms">
                        <div class="card" style="width:100%;">
                            <div class="card-body">
                                <div class="row justify-content-sm-between">
                                    <div>
                                        <b-button class="button-collapse" v-b-toggle="'id-'+room.id"> {{ $t('Room') }} № {{ i+1 }}</b-button>
                                    </div>
                                    <div class="delete-room">
                                        <b-button v-if="room.newRoom" type="submit" variant="success" class="mr-2" @click="saveRoom(room)">
                                            {{ $t('Save room') }}</b-button>
                                        <b-button v-if="room.newRoom" variant="danger" @click="deleteNewRoom()">{{ $t('Delete room') }}</b-button>
                                        <b-button v-else variant="danger" @click="deleteRoomOk($event, room)">{{ $t('Delete room') }}</b-button>
                                    </div>
                                </div>
                                <b-collapse :id="'id-'+room.id" visible>
                                    <div class="mt-4">
                                        <div class="row">
                                            <div class="col-xl-6 mb-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <b-form-group :label="$t('Name')" :label-for="'input-room-'+i+'-name'">
                                                            <b-form-input  v-model="property.rooms[i].options[3].value" :id="'input-room-'+i+'-name'"></b-form-input>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <b-form-group :label="$t('Description')" :label-for="'input-room-'+i+'-descr'">
                                                            <b-form-textarea style="height:80px;" v-model="property.rooms[i].options[4].value"  :id="'input-room-'+i+'-name'"></b-form-textarea>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Number of rooms')" :label-for="'input-room-'+i+'-number'">
                                                            <b-form-input v-model="room.number" :id="'input-room-'+i+'-name'"></b-form-input>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Number of persons')" :label-for="'input-room-'+i+'-person'">
                                                            <b-form-input v-model="room.person" :id="'input-room-'+i+'-person'"></b-form-input>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Cost, from')" :label-for="'input-room-'+i+'-price'">
                                                            <b-form-input v-model="room.price" :id="'input-room-'+i+'-price'"></b-form-input>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Shower')" :label-for="'input-room-'+i+'-shower'">
                                                            <b-select v-model="room.shower">
                                                                <b-select-option value="single">{{ $t('Its') }}</b-select-option>
                                                                <b-select-option value="shared">{{ $t('Joint') }}</b-select-option>
                                                                <b-select-option value="none">{{ $t('Absent') }}</b-select-option>
                                                            </b-select>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Bed')" :label-for="'input-room-'+i+'-shower'">
                                                            <b-select v-model="room.bed">
                                                                <b-select-option value="single">{{ $t('Single') }}</b-select-option>
                                                                <b-select-option value="double">{{ $t('Double')}}</b-select-option>
                                                                <b-select-option value="none">{{ $t('Absent') }}</b-select-option>
                                                            </b-select>
                                                        </b-form-group>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <b-form-group :label="$t('Kitchen')" :label-for="'input-room-'+i+'-shower'">
                                                            <b-select v-model="room.kitchen">
                                                                <b-select-option value="single">{{ $t('Its') }}</b-select-option>
                                                                <b-select-option value="shared">{{ $t('Joint') }}</b-select-option>
                                                                <b-select-option value="kitchenette">{{ $t('Kitchenette') }}</b-select-option>
                                                                <b-select-option value="none">{{ $t('Absent') }}</b-select-option>
                                                            </b-select>
                                                        </b-form-group>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6" v-if="!room.newRoom">
                                                <draggable class="row photos-gallery"
                                                           v-model="rooms[i].photos"
                                                           @start="drag=true"
                                                           @update="$forceUpdate()"
                                                           @end="drag=false">
                                                    <div class="col-md-3 mb-4" v-for="element in rooms[i].photos" :key="element.id">
                                                        <div class="photos-gallery-item">
                                                            <img :src="element.url_max300">
                                                            <a class="delete-photo-link" href="" @click.prevent="deletePhotoSmallGalleryOk($event, room, element.id)">&times;</a>
                                                            <div v-b-modal.bigPhotoModal class="blackout" @click="imgPath = element.url_original"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4 add-photo-container">
                                                        <input type="file" :id="i" class="inputfile" ref="inputfilePhotoRoom" @change="savePhotoRoom($event, rooms[i])" accept="image/*">
                                                        <label :for="i"><span>&#10010;</span></label>
                                                    </div>
                                                </draggable>
                                            </div>
                                        </div>
                                    </div>
                                </b-collapse>
                            </div>
                        </div>
                    </div>
                    </draggable>
                </form>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-12">
                <b-button type="submit" variant="outline-primary" class="mr-2" @click="addRoom">{{ $t('Add room') }}</b-button>
            </div>
        </div>

        <b-modal id="deleteHotelModal" :title="$t('Delete Hotel')" @ok="deleteHotelOk">
            <p class="text-danger">{{ $t('Are you sure you want to delete') }} {{ property.name }}</p>
        </b-modal>

        <b-modal id="deletePhotoBigGallery" :title="$t('Delete Hotel Photo')" @ok="deletePhotoBigGalleryOk">
            <p class="text-danger">{{ $t('Are you sure you want to delete this photo') }}?</p>
        </b-modal>

        <b-modal id="deletePhotoSmallGallery" :title="$t('Delete Room Photo')" @ok="deletePhotoSmallGalleryOk">
            <p class="text-danger">{{ $t('Are you sure you want to delete this photo') }}?</p>
        </b-modal>

        <b-modal id="bigPhotoModal" data-date="imgPath" size="xl" title="Picture">
            <img :src="imgPath" class="full-width">
        </b-modal>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
import draggable from 'vuedraggable';
let PropertyRequest = ApiRequest('property');
let properties = new PropertyRequest;
let TypesRequest = ApiRequest('booking-roomtypes');
let types = new TypesRequest;
let RoomRequest = ApiRequest('room');
let roomRequest = new RoomRequest;
let ImageRequest = ApiRequest('image-upload');
let imageRequest = new ImageRequest;
let featureRequest = ApiRequest('features');
let features = new featureRequest;

export default {
    name: "Single",
    data() {
        return {
            property: {},
            imageData: [],
            newRoomOptions: [
                {
                    key:"facilities",
                    parent:1,
                    type:"room",
                    value:"[{\"room_facility_type_id\":4,\"name\":\"Shower\"},{\"room_facility_type_id\":8,\"name\":\"TV\"},{\"name\":\"Hairdryer\",\"room_facility_type_id\":12},{\"room_facility_type_id\":27,\"name\":\"Free toiletries\"},{\"room_facility_type_id\":31,\"name\":\"Toilet\"},{\"room_facility_type_id\":38,\"name\":\"Private bathroom\"},{\"name\":\"Heating\",\"room_facility_type_id\":40},{\"name\":\"Satellite channels\",\"room_facility_type_id\":44},{\"name\":\"Flat-screen TV\",\"room_facility_type_id\":75},{\"name\":\"Hardwood or parquet floors\",\"room_facility_type_id\":82},{\"name\":\"Wardrobe or closet\",\"room_facility_type_id\":95},{\"room_facility_type_id\":125,\"name\":\"Linen\"},{\"room_facility_type_id\":141,\"name\":\"Toilet paper\"},{\"room_facility_type_id\":170,\"name\":\"Trash cans\"},{\"room_facility_type_id\":177,\"name\":\"Shampoo\"},{\"name\":\"Body soap\",\"room_facility_type_id\":179},{\"name\":\"Socket near the bed\",\"room_facility_type_id\":184},{\"room_facility_type_id\":187,\"name\":\"Non-feather pillow\"},{\"room_facility_type_id\":201,\"name\":\"Smoke alarm\"},{\"room_facility_type_id\":204,\"name\":\"Key card access\"},{\"room_facility_type_id\":205,\"name\":\"Reading light\"},{\"room_facility_type_id\":208,\"name\":\"Window\"}]",
                },
                {
                    key:"native_id",
                    parent:1,
                    type:"room",
                    value:'1',
                },
                {
                    key:"photos",
                    parent:1,
                    type:"room",
                    value: '[]'
                },
                {
                    key:"name",
                    parent:1,
                    type:"room",
                    value: '',
                },
                {
                    key:"descriptions",
                    parent:1,
                    type:"room",
                    value: '',
                }
            ],
            rooms:[],
            deleteRoom: {},
            show: false,
            imgPath:'',
            features: []
        }
    },
    components: {
        draggable,
    },
    created() {
        properties.get(this.$route.params.item)
            .then(resp => {
                this.property = resp.data;
                this.rooms = this.property.rooms;
                this.property.rooms.forEach( room => room.photos = this.getRoomPhotos(room));
                this.imageData = this.getPhotos();
                this.property.rooms.forEach(item => {
                    item.options[3] = item.options[3] || '';
                    item.options[4] = item.options[4] || '';
                    return item;
                });

                features.all()
                    .then(res => {
                        if(res.status === 200) {
                            const features = Object.assign([], res.data);
                            features.forEach(item => {
                                item.check = this.property ? this.property.features.findIndex(featuresItem => featuresItem.id === item.id) !== -1 : false;
                            });
                            const featuresCategoryId = features.map(item => item.feature_category_id).filter((value, index, self ) => self.indexOf(value) === index);
                            featuresCategoryId.forEach( categoryId => {
                                this.features.push({
                                    name: features.find(feature => feature.feature_category_id === categoryId).feature_category.name,
                                    features: this.feature_category(features, categoryId)
                                })
                            })
                        }
                    })
            });

    },
    methods: {
        addFeatures(feature){
            const indexFeatures = this.property.features.findIndex(item => item.id === feature.id);

            if(indexFeatures === -1){
                this.property.features.push(feature);
            }
            else {
                this.property.features.splice(indexFeatures, 1);
            }

        },
        feature_category(arrayFeature, feature_category_id){
            return arrayFeature.filter(item => item.feature_category_id === feature_category_id);
        },
        savePhotoHotel: function (event) {
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = (e) => {
                    imageRequest.create({"image": e.target.result})
                    .then(res => {
                        this.imageData.push({
                            url_max300: res.data.image,
                            url_original: res.data.image,
                            url_square60: res.data.image
                        });
                    })
                }
            }
        },
        savePhotoRoom: function(event, room) {
            if(!room.photos){
                room.photos = [];
            }
            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = (e) => {
                    imageRequest.create({"image": e.target.result})
                        .then(res => {
                            room.photos.push({
                                url_max300: res.data.image,
                                url_original: res.data.image,
                                url_square60: res.data.image
                            });
                            this.$forceUpdate();
                        })
                }
            }
        },
        changeName(item, name){
            item.options.forEach(option => option.key === 'name' ? option.value = name : '')
        },
        getFieldValue(name, item, def, json) {
            if (!item || !item.options) {
                return def;
            }
            for (let i in item.options) {
                if (item.options[i].key === name && item.options[i].value) {
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
            properties.delete(this.property.id)
                .then(res => {
                    if(res.status === 200){
                        this.$router.push({ name: 'property' });
                    }
                })
        },
        deletePhotoBigGallery() {

        },
        deletePhotoSmallGallery() {

        },
        deletePhotoBigGalleryOk(){
            this.imageData.forEach((item, index, array) => {
                item['url_original'] === this.imgPath ? this.imageData.splice(index, 1) : '';
            });
        },
        deletePhotoSmallGalleryOk(event, room, photoId){
            this.$bvModal.msgBoxConfirm('Are you sure you want to delete this photo?')
                .then(value => {
                    if(value) {
                        room.photos.splice(photoId, 1);
                        this.$forceUpdate();
                    }
                })
        },
        save() {
            for(let option of this.property.options){
                if(option.key === 'photos'){
                    option.value = JSON.stringify(this.imageData);
                }
            }
            this.property.rooms.forEach(room => {
                for(let option of room.options){
                    if(option.key === 'photos'){
                        option.value = JSON.stringify(room.photos);
                    }
                }
                delete room.photos;
            });
            properties.update(this.property.id, this.property)
                .then(resp => {
                    properties.get(this.$route.params.item)
                        .then(resp => {
                            this.property = resp.data;
                            this.rooms = this.property.rooms;
                            this.property.rooms.forEach( room => room.photos = this.getRoomPhotos(room));
                            this.imageData = this.getPhotos();
                        })
                })
        },
        addRoom() {
            this.property.rooms.push({
                id: '',
                bed:'',
                kitchen:'',
                native_id:0,
                number:0,
                options: this.newRoomOptions,
                person:0,
                price:0,
                property_id: this.property.id,
                room_type_id: 0,
                shower:"",
                status:"approved",
                newRoom: true
            })
        },
        saveRoom(newRoom){
            delete newRoom.newRoom;
            roomRequest.create(newRoom)
                .then(resp => {
                    properties.get(this.$route.params.item)
                        .then(resp => {
                            this.property = resp.data;
                            this.rooms = this.property.rooms;
                            this.property.rooms.forEach( room => room.photos = this.getRoomPhotos(room));
                        })
                })
        },
        deleteRoomOk(e, room) {
            this.$bvModal.msgBoxConfirm('Are you sure you want to delete this room?')
                .then(value => {
                    if(value){
                        roomRequest.delete(room.id)
                            .then(resp => {
                                properties.get(this.$route.params.item)
                                    .then(resp => {
                                        this.property = resp.data;
                                        this.rooms = this.property.rooms;
                                        this.property.rooms.forEach( room => room.photos = this.getRoomPhotos(room));
                                    })
                            })
                    }
                })
        },
        deleteNewRoom() {
            const pointLastElement = this.property.rooms.length - 1;
            this.property.rooms.splice(pointLastElement, 1);
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
    .delete-room {
        display: flex;
        flex-wrap: wrap;
    }
    .full-width {
        max-width: 100vh;
        width: 100%;
        height: 59vh;
        object-fit: cover;
        margin: 0 auto;
        display: block;
    }
</style>
