<template>
    <div class="object-data-table-content selected-object">

        <PropertyItemSummary />

        <PropertyItemRoom v-for="(room, index) in rooms" :key="JSON.stringify(room) + index" :room="room" :index="index" @duplicate="duplicateRoom" @delete="deleteRoom"/>

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
        duplicateRoom(index) {
            this.rooms.splice(index, 0, { ...this.rooms[index] });
        },
        deleteRoom(index) {
            console.log(index);
            this.rooms.splice(index, 1);
        },
        addRoom() {
            this.rooms.push({ title: String(this.rooms.length + 1)});
        }
    }
}
</script>

<style scoped>

</style>
