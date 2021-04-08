<template>
    <div :class="{'property-card':true, 'active' : active}" :id="'property-'+item.id">
        <div class="property-card-container">
            <ItemPictures :item="item"/>
            <div class="data">
                <a :href="getUrlLangPrefix()+'single/'+item.slug" class="title"><span>{{ item.name }}</span></a>
                <ItemFeatures :item="item"/>
            </div>
            <RoomsList :rooms="item.rooms" :item_id="item.id"/>
            <ItemAdditional :item="item"/>
        </div>
    </div>
</template>

<script>
import RoomsList from "./partials/RoomsList";
import ItemPictures from "./partials/ItemPictures";
import ItemFeatures from "./partials/ItemFeatures";
import ItemAdditional from "./partials/ItemAdditional";

export default {
    name: "PropertyListItem",
    props: ['item', 'active'],
    components: {ItemAdditional, ItemPictures, RoomsList, ItemFeatures},
    data() {
        return {
            NoPhoto: false,
            hideAdress: true,
            urlPrefix: 333
        }
    },
    mounted() {
    },
    created() {
    },
    methods: {
        getUrlLangPrefix() {
            let locale = document.location.pathname.split('/')[1];
            return locale ? "/" + locale + "/" : "/";
        },
        findOptionRoom(room, name) {
            if (!room.options) {
                return false;
            }
            return room.options.find(elem => elem.key === name);
        },
        addToFavorites() {
            let id = this.item.id;
            let favoritesObject = JSON.parse(localStorage.getItem("favoritesList"));

            if (favoritesObject === null) {
                favoritesObject = [];
            }
            if (favoritesObject.indexOf(id) !== -1) {
                favoritesObject.splice(favoritesObject.indexOf(id), 1);
            } else {
                favoritesObject.push(id);
            }
            localStorage.setItem('favoritesList', JSON.stringify(favoritesObject));
            this.$emit('favsUpdated');
        },

        getRoomOptionByType(name) {
            let resultName = name.charAt(0).toUpperCase() + name.slice(1);
            let result = [];
            this.item.rooms.some(room => {
                if (room[name] !== 'none') {
                    let text = room[name].charAt(0).toUpperCase() + room[name].slice(1);
                    if (result.indexOf(text) === -1)
                        result.push(text);
                }
            });
            if (result.length > 0)
                return (result[result.length - 1] === 'Kitchenette') ? result.join(' + ') : result.join(' + ') + ' ' + resultName;
            else
                return false;
        },
        transFeatureName(item) {
            return item.name
        }
    },
    computed: {

        isHideZip() {
            let hideZip = this.findOption('hideZip');
            return hideZip && parseInt(hideZip.value);
        },
        isRealPrice() {
            let realprice = this.findOption('realprice');
            return realprice && parseInt(realprice.value);
        },
        isFree() {
            let free = this.findOption('free');
            return free && parseInt(free.value);
        },

        getRooms() {
            return this.item.rooms;
        },
    }
}

</script>

<style scoped>

</style>

