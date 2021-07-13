<template>
    <div class="object-data-table-content selected-object">

        <PropertyItemSummary :roomTypes="roomTypes" :index="index" :property="property" v-model="property" @deleteType="deleteType" @duplicateType="duplicateType" />

        <PropertyItemRoom v-for="(room, ind) in property.rooms" :key="index + 'room' + JSON.stringify(room.name) + ind" :room="room" :index="ind" v-model="property.rooms[ind]" @duplicate="duplicateRoom" @delete="deleteRoom"/>

        <PropertyItemRoomAdd @click.native="addRoom"/>

    </div>
</template>

<script>
import PropertyItemRoomAdd from "./PropertyItemRoomAdd";
import PropertyItemRoom from "./PropertyItemRoom";
import PropertyItemSummary from "./PropertyItemSummary";

export default {
    name: "PropertyItem",
    components: {PropertyItemSummary, PropertyItemRoom, PropertyItemRoomAdd},
    props: ['roomTypes', 'property', 'index'],
    data() {
        return {
            rooms: [{
                title: '1'
            }, {
                title: '2'
            }, {
                title: '3'
            }]
        }
    },
    mounted() {
    },
    methods: {
        addRoom() {
            this.$emit('addRoom', this.index);
        },
        deleteRoom(index) {
            this.$emit('deleteRoom', { index: this.index, room: index });
        },
        duplicateRoom(index) {
            this.$emit('duplicateRoom', { index: this.index, room: index });
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
    }
}
</script>

<style scoped>

</style>
