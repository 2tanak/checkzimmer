<template>
    <section class="object-data-section">
        <div class="title">{{ $t('Object data') }}</div>
        <div class="object-data-table">
            <div class="table-head">
                <div class="type-head table-head-item">{{ $t('type (register)') }}</div>
                <div class="quality-head table-head-item">{{ $t('QTY') }}</div>
                <div class="personen-head table-head-item">{{ $t('Personen') }}</div>
                <div class="price-head table-head-item">{{ $t('PRICE / PERSON') }}</div>
                <div class="links-head"></div>
            </div>
            <PropertyItem v-for="(propertyItem, key) in property.propertyTypes" :index="key" :roomTypes="roomTypes"
                          :property="propertyItem" v-model="property.propertyTypes[key]"
                          :key="'prop' + JSON.stringify(propertyItem.name) + key"
                          @deleteType="deleteType" @duplicateType="duplicateType"
                          @addRoom="addRoom" @deleteRoom="deleteRoom" @duplicateRoom="duplicateRoom" />

            <div class="object-data-table-content unselected-object">

                <PropertyItemTypeAdd @click.native="propertyTypeAdd"/>

                <!--<PropertyItemRoomAdd/>-->
            </div>

        </div>
    </section>
</template>

<script>
import PropertyItem from "./PropertyItem";
import PropertyItemRoomAdd from "./PropertyItemRoomAdd";
import ApiRequest from "../../../API/ApiRequest";
import PropertyItemTypeAdd from "./PropertyItemTypeAdd";

let roomTypesRequest = ApiRequest('room-types');
let roomTypes = new roomTypesRequest;

export default {
    name: "PropertyData",
    components: {PropertyItemTypeAdd, PropertyItemRoomAdd, PropertyItem},
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
        propertyTypeAdd() {
            let property = { ...this.property };
            property.propertyTypes.push({ name: '', num: 0, persons: 1, price: 0, rooms: []});
        },
        deleteType(index) {
            let property = { ...this.property };
            property.propertyTypes.splice(index, 1);
            this.$emit('input', property);
        },
        duplicateType(index) {
            let property = { ...this.property };
            let propertyNew = JSON.parse(JSON.stringify(this.property.propertyTypes[index]));
            property.propertyTypes.push(propertyNew);
            this.$emit('input', property);
        },
        addRoom(index) {
            let property = { ...this.property };
            property.propertyTypes[index].rooms.push({
                name: '',
                num: 0,
                persons: 1,
                price: 0})
            this.$emit('input', property);
        },
        deleteRoom(data) {
            let property = { ...this.property };
            property.propertyTypes[data.index].rooms.splice(data.room, 1);
            this.$emit('input', property);
        },
        duplicateRoom(data) {
            let property = { ...this.property };
            let newRoom = JSON.parse(JSON.stringify(property.propertyTypes[data.index].rooms[data.room])) //{ ... }
            console.log(newRoom);
            property.propertyTypes[data.index].rooms.splice(data.room+1, 0, newRoom);
            this.$emit('input', property);
        }
    }
}
</script>

<style scoped>

</style>
