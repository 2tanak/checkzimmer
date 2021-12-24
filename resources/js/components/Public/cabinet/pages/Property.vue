<template>
    <div id="app-list">
        <div class="list-content">
            <div class="list-content-item">
                <div
                    :class="{
                        property: true
                    }"
                >
                    <div :class="{ container: true }">
                        <a href="#" class="create" @click.prevent="create">{{
                            $t("Button_create")
                        }}</a>

                        <div
                            v-for="(item, index) in property"
                            :key="'prop-id-' + index + '-' + item.id"
                            :class="{
                                'property-card': true
                            }"
                        >
                            <div class="property-card-container">
                                <ItemPictures :item="item" />

                                <div class="data">
                                    <a
                                        :href="
                                            getUrlLangPrefix +
                                                '/single/' +
                                                item.slug
                                        "
                                        class="title"
                                        ><span>{{ item.name }}</span></a
                                    >
                                    <ItemFeatures :item="item" />
                                </div>

                                <RoomsList
                                    :rooms="item.rooms"
                                    :item_id="item.id"
                                />
                            </div>
                            <div class="red">
                                <a href="#" @click.prevent="change(item.id)"
                                    >изменить</a
                                >
                                &nbsp&nbsp&nbsp
                                <a
                                    class="remove"
                                    href="#"
                                    @click.prevent="remove($event, item.id)"
                                    >удалить</a
                                >
                            </div>
                        </div>

                        <div class="pagination">
                            <button
                                class="btn btn-default"
                                @click="
                                    fetchPagination(pagination.prev_page_url)
                                "
                                :disabled="!pagination.prev_page_url"
                            >
                                prev
                            </button>
                            <span>
                                {{ pagination.current_page }}
                                of&nbsp
                            </span>
                            {{ pagination.last_page }}
                            <button
                                class="btn btn-default"
                                @click="
                                    fetchPagination(pagination.next_page_url)
                                "
                                :disabled="!pagination.next_page_url"
                            >
                                prev
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import ItemPictures from "../../partials/ItemPictures";
import ItemFeatures from "../../partials/ItemFeatures";
import RoomsList from "../../partials/RoomsList";
import ApiRequest from "../../../API/ApiRequest";
let AdvertRequest = ApiRequest("advert");
let advert = new AdvertRequest();

export default {
    components: {
        ItemPictures,
        ItemFeatures,
        RoomsList
    },
    data() {
        return {
            property: [],
            page: 1,
            pagination: []
        };
    },
    created() {},
    mounted() {
        this.getAdverts();
    },
    methods: {
        change(id) {
            this.$router.push("/personal/property/update?id=" + id);
        },
        create() {
            this.$router.push("/personal/property/create");
        },
        getAdverts() {
            advert.request("", {}, "get", { page: this.page }).then(resp => {
                this.makePagination(resp.data);
                //this.pagination(resp.data);
                this.property = resp.data.data;
            });
        },
        makePagination(data) {
            let pagination = {
                current_page: data.current_page,
                last_page: data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            };
            this.pagination = pagination;
        },
        fetchPagination(url) {
            let regV = /page=\d{1,}/i;
            let result = url.match(regV);
            let page = result[0].split("=")[1];
            this.page = page;
            this.getAdverts();
        },
        remove: function(event, id) {
            let thisElement = event.currentTarget;

            let textR = $(thisElement).text();
            $(thisElement).text("");
            $(thisElement).html(
                "<img src='/img/loading.gif' style='width:50px;height:2px'/>"
            );

            advert.delete(id).then(resp => {
                if (resp.data.status == "success") {
                    $(thisElement).html("");
                    $(thisElement).text(textR);
                    this.property = this.property.filter(c => c.id !== id);
                }
            });
        }
    },
    computed: {}
};
</script>
<style lang="scss">
.pagination {
    display: flex;
    justify-content: right;
    align-items: center;
    margin-right: 5px;
    margin-top: 10px;
}
.btn-default {
    border: 1px solid #ccc;
}
.red {
    margin-bottom: 10px;
    align-self: flex-end;
}
.property-card {
    background: #fff;
}
a.create {
    margin-bottom: 20px;
    margin-top: 20px;
    float: right;
    width: 20%;
    height: 54px;
    background: #6bb63f;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    line-height: 100%;
    color: #ffffff;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.16);
    position: relative;
    clear: both;
}
.list-content {
    background: #f7f8fa;
    padding-bottom: 114px;
}
.list-content .property .container > div {
    display: flex;
}
.list-content .property .property-shadow {
    height: 62px;
    background-color: #ffffff;
    box-shadow: 0 7px 14px rgba(51, 54, 70, 0.14);
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 14px;
    width: 100%;
}
.list-content .property .property-item {
    background: #ffffff;
    border-radius: 12px;
    z-index: 1;
    box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
    width: 100%;
}
.list-content .property .property-card.collapse-item {
    min-height: 80px;
    transition-duration: 0.4s;
}
.list-content .property .property-card.collapse-item .all-types-content {
    display: none;
}
.list-content .property .property-card.collapse-item .all-types {
    display: none;
}
.list-content .property .property-card.collapse-item .price-free {
    display: none;
}
.list-content .property .property-card.collapse-item .no-photo-block {
    display: none;
}
.list-content .property .property-card.collapse-item .superhost-icon {
    display: none;
}
.list-content .property .property-card.collapse-item .property-card-container {
    min-height: 80px;
    align-items: center;
    justify-content: space-between;
}
.list-content .property .container.active {
    max-width: none;
    padding: 0;
}
.list-content .property.not-map .property-card.collapse-item .type {
    display: none;
}
.list-content .property.not-map .property-card.collapse-item .favorites {
    display: none;
}
.list-content .property.not-map .property-card.collapse-item .night {
    height: auto;
    padding-top: 0;
}
.list-content .property.not-map .property-card.collapse-item .night .price {
    margin-top: 0;
}
.list-content .property.not-map .property-card.collapse-item .rating {
    padding-top: 0;
}
.list-content .property.not-map .property-card.collapse-item .rating-number {
    display: none;
}
.list-content
    .property.not-map
    .property-card.collapse-item
    .main-small-slider {
    display: none;
}
.list-content .property.not-map .property-card.collapse-item .geolocation {
    display: none;
}
.list-content .property.not-map .property-card.collapse-item .additionally {
    display: none;
}
.list-content .property.not-map .property-card.collapse-item .data {
    flex-direction: row;
    margin-left: 0;
    margin-right: 102px;
    align-items: center;
    min-height: auto;
    width: 80.2%;
}
.list-content .property.not-map .property-card.collapse-item .data a.title {
    margin-right: 46px;
    max-width: 556px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-bottom: 0;
    display: inline;
    min-height: auto;
}
.list-content
    .property.not-map
    .property-card.collapse-item
    .data-item
    > div:first-of-type {
    display: flex;
    align-items: center;
}
.list-content .property.not-map .property-card.collapse-item .humans {
    margin-bottom: 0;
    margin-right: 30px;
}
.list-content .property.not-map .property-card.collapse-item .distance {
    margin-bottom: 0;
}
.list-content .property.show-map .container > div {
    min-height: 100vh;
}
.list-content .property.show-map .google-map {
    display: block;
}
.list-content .property.show-map .property-item {
    min-width: 740px;
    max-width: 740px;
}
.list-content .property.show-map .property-card {
    cursor: pointer;
}
.list-content .property.show-map .property-card .data {
    margin-right: 30px;
}
.list-content .property.show-map .property-card .all-types-content {
    display: none;
}
.list-content .property.show-map .property-card .all-types {
    display: none;
}
.list-content .property.show-map .property-card .type {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .no-photo-block {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .photo-container {
    display: none;
}
.list-content
    .property.show-map
    .property-card.collapse-item
    .main-small-slider {
    display: none;
}
.list-content
    .property.show-map
    .property-card.collapse-item
    .property-card-slider {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item a.img-link {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .additionally {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .geolocation {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .data {
    min-height: auto;
    margin-left: 0;
    margin-right: 57px;
    flex-direction: column;
    align-items: end;
    width: auto;
    height: auto;
}
.list-content .property.show-map .property-card.collapse-item .data a.title {
    max-width: 527px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    margin-right: 0;
    min-height: auto;
    display: inline;
}
.list-content
    .property.show-map
    .property-card.collapse-item
    .data-item
    > div:first-of-type {
    display: flex;
    align-items: center;
    margin-top: 5px;
}
.list-content .property.show-map .property-card.collapse-item .humans {
    margin-bottom: 0;
    margin-right: 30px;
}
.list-content .property.show-map .property-card.collapse-item .distance {
    margin-bottom: 0;
}
.list-content .property.show-map .property-card.collapse-item .favorites {
    display: none;
}
.list-content .property.show-map .property-card.collapse-item .night {
    height: auto;
    padding-top: 0;
}
.list-content .property.show-map .property-card.collapse-item .night .price {
    margin-top: 0;
}
.list-content .property.show-map .property-card.collapse-item .rating {
    padding-top: 0;
}
.list-content .property.show-map .property-card.collapse-item .rating-number {
    display: none;
}
.list-content .favorites {
    width: 26px;
    height: 26px;
    border: 1px solid #dbe3f0;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.list-content .favorites:hover svg.favorites-usual path {
    fill: #ee483f;
    stroke: #ee483f;
    transition: all 0.4s ease;
}
.list-content .favorites svg.favorites-usual path {
    transition: all 0.4s ease;
}
.list-content .favorites svg.favorites-active {
    display: none;
}
.list-content .favorites.active svg.favorites-active {
    display: inline-block;
}
.list-content .favorites.active svg.favorites-usual {
    display: none;
}
.list-content .favorites.favorites-mobile {
    display: none;
}
.list-content .favorites.heart-active img.favorites-icon {
    display: none;
}
.list-content .favorites.heart-active img.favorites-active-icon {
    display: block;
}
.list-content .google-map {
    width: calc(100% - 740px);
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    height: 100vh;
}
.list-content .google-map .fullscreen-button {
    position: absolute;
    right: 10px;
    bottom: 10px;
    width: 26px;
    height: 26px;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    border-radius: 100px;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 2000;
}
.list-content .google-map .fullscreen-button img {
    width: 18px;
    height: 18px;
}
.list-content .google-map .close-button {
    position: absolute;
    width: 31px;
    height: 31px;
    background: #ffffff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
    border-radius: 100px;
    right: 20px;
    top: 20px;
    display: none;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 3500;
}
.list-content .google-map .close-button img {
    width: 11px;
    height: 11px;
}
.list-content .google-map .property-card {
    display: none;
    border: 1px solid #fdb64e;
}
.list-content .google-map .property-card .expand-collapse {
    position: absolute;
    width: 40px;
    height: 5px;
    background-color: #e3e3e3;
    left: 50%;
    transform: translatex(-50%);
    top: 10px;
    border-radius: 100px;
    cursor: pointer;
    display: none;
}
.list-content .google-map.fullscreen {
    position: fixed;
    width: 100%;
    height: 100vh;
    top: 0;
    left: 0;
    z-index: 1000;
    transition-duration: 0.4s;
}
.list-content .google-map.fullscreen .close-button {
    display: flex;
}
.list-content .google-map.fullscreen .fullscreen-button {
    display: none;
}
.list-content .google-map.fullscreen .middle-block {
    display: flex;
    justify-content: space-between;
    width: 100%;
}
.list-content .google-map.fullscreen.show-card {
    transition-duration: 0.4s;
    height: calc(100vh - 202px);
}
.list-content .google-map.fullscreen.show-card .property-card {
    display: flex;
}
.list-content .property-card {
    min-height: 186px;
    transition-duration: 0.4s;
    overflow: hidden;
    width: 100%;
}
.list-content .property-card .night-rating-block {
    display: flex;
}
.list-content .property-card img {
    width: 156px;
    height: 156px;
    -o-object-fit: cover;
    object-fit: cover;
    border-radius: 4.625px;
    pointer-events: none;
}
.list-content .property-card:not(:last-of-type) {
    border-bottom: 1px solid #e8e8ed;
}
.list-content .property-card .property-card-container {
    padding: 16px;
    display: flex;
    align-items: flex-start;
}
.list-content .property-card .data {
    margin-right: 44px;
    margin-left: 18px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    min-height: 156px;
    width: 100%;
    max-height: 190px;
}
.list-content .property-card a.title {
    margin-bottom: 9px;
    font-weight: 500;
    font-size: 16px;
    color: #333646;
    line-height: 150%;
    max-width: 363px;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
    text-decoration: none;
    min-height: 47px;
    -webkit-line-clamp: 2;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.list-content .property-card a.title:hover span {
    border-bottom: 1px solid #d0d2dd;
}
.list-content .property-card .geolocation {
    font-weight: 400;
    font-size: 13px;
    line-height: 160%;
    color: #333646;
    display: flex;
    align-items: center;
    margin-bottom: 5px;
}
.list-content .property-card .geolocation img {
    width: 14px;
    height: 14px;
    margin-right: 4px;
}
.list-content .property-card .humans {
    font-weight: 400;
    font-size: 12px;
    line-height: 100%;
    color: #333646;
    display: flex;
    align-items: center;
    white-space: nowrap;
    margin-bottom: 8px;
}
.list-content .property-card .humans img {
    width: 13px;
    height: 14px;
    margin-right: 5px;
}
.list-content .property-card .distance {
    font-weight: 400;
    font-size: 12px;
    line-height: 100%;
    color: #333646;
    display: flex;
    align-items: center;
    margin-bottom: 7px;
    white-space: nowrap;
}
.list-content .property-card .distance img {
    width: 14px;
    height: 13px;
    margin-right: 4px;
}
.list-content .property-card .distance .mobile-span {
    display: none;
}
.list-content .property-card .additionally {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin-top: 7px;
    height: 34px;
    overflow: hidden;
}
.list-content .property-card .additionally > div:last-of-type {
    margin-right: 0;
}
.list-content .property-card .data-block-circle {
    width: 28px;
    height: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #dbe3f0;
    border-radius: 50%;
    margin-right: 6px;
    margin-top: 6px;
    cursor: pointer;
    position: relative;
}
.list-content .property-card .data-block-circle img {
    width: 14px;
    height: 18px;
    -o-object-fit: contain;
    object-fit: contain;
}
.list-content .property-card .data-block-oval {
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #dbe3f0;
    font-weight: 400;
    font-size: 13px;
    line-height: 160%;
    color: #333646;
    margin-right: 6px;
    border-radius: 100px;
    height: 28px;
    padding: 7px;
    margin-top: 6px;
}
.list-content .property-card .data-block-oval img {
    margin-right: 5px;
    width: 14px;
    height: 14px;
}
.list-content .property-card .table-container .all-types {
    font-weight: 400;
    font-size: 12px;
    line-height: 170%;
    color: #333646;
    transition: all 0.4s;
    text-decoration: none;
}
.list-content .property-card .table-container .all-types:hover {
    transition: all 0.4s;
    color: #3b8b3e;
}
.list-content .property-card .table-container .all-types:hover svg path {
    transition: all 0.4s;
    fill: #3b8b3e;
}
.list-content .property-card .table-container .all-types svg {
    margin-right: 5px;
    transition: all 0.4s;
}
.list-content .property-card .type {
    margin-right: 44px;
    width: 390px;
}
.list-content .property-card .type .title {
    font-weight: 400;
    font-size: 12px;
    line-height: 140%;
    letter-spacing: 0.02em;
    text-transform: uppercase;
    color: #8f98a2;
    white-space: nowrap;
    padding-bottom: 9px;
    padding-right: 20px;
}
.list-content .property-card .type .title:first-of-type {
    padding-left: 19px;
    min-width: 155px;
    max-width: 155px;
}
.list-content .property-card .type .title:nth-of-type(2) {
    min-width: 70px;
    max-width: 70px;
    text-align: center;
}
.list-content .property-card .type .title:nth-of-type(3) {
    min-width: 86px;
    max-width: 86px;
    text-align: center;
}
.list-content .property-card .type .title:nth-of-type(4) {
    min-width: 88px;
    max-width: 88px;
    text-align: left;
}
.list-content .property-card .type .quantity-block {
    min-width: 70px;
    max-width: 70px;
    text-align: center;
}
.list-content .property-card .type .personen-block {
    min-width: 86px;
    max-width: 86px;
    text-align: center;
}
.list-content .property-card .type .price-block {
    min-width: 88px;
    max-width: 88px;
    text-align: left;
}
.list-content .property-card .type .type-block {
    font-weight: 400;
    font-size: 12px;
    line-height: 170%;
    color: #333646;
    white-space: nowrap;
    text-align: center;
    padding-bottom: 2px;
}
.list-content .property-card .type .type-block:first-of-type {
    text-align: left;
}
.list-content .property-card .type .type-block:not(:last-of-type) {
    padding-right: 20px;
}
.list-content .property-card .type .personen {
    margin-right: 20px;
}
.list-content .property-card .type .quantity {
    margin-right: 20px;
}
.list-content .property-card .type img {
    margin-right: 5px;
    width: 14px;
    height: 14px;
}
.list-content .property-card .type .quantity-block span {
    width: 100%;
    text-align: center;
}
.list-content .property-card .type .personen-block span {
    width: 100%;
    text-align: center;
}
.list-content .property-card .type .heigh-tr {
    display: none;
}
.list-content .property-card .type .heigh-tr.active {
    display: table-row;
}
.list-content .property-card .type .thead {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.list-content .property-card .type .visible-part {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.list-content .property-card .type .filling-block {
    display: flex;
    align-items: center;
}
.list-content .property-card .type-block.filling-block {
    max-width: 155px;
    text-overflow: ellipsis;
    overflow: hidden;
    min-width: 155px;
}
.list-content .property-card .type-block.price-block {
    text-align: left;
}
.list-content .property-card .night {
    padding-right: 7px;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-right: 1px solid #e8e8ed;
    padding-top: 7px;
}
.list-content .property-card .no-photo {
    min-width: 156px;
    max-width: 156px;
    height: 156px;
    border-radius: 6px;
    background: #dedee2;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    z-index: 10;
}
.list-content .property-card .price {
    width: 70px;
    margin-top: 23px;
}
.list-content .property-card .price-span {
    font-weight: 700;
    font-size: 16px;
    line-height: 100%;
    text-align: center;
    color: #333646;
    display: block;
    white-space: nowrap;
}
.list-content .property-card .night-span {
    font-weight: 500;
    font-size: 14px;
    line-height: 100%;
    text-align: center;
    color: #333646;
    display: block;
}
.list-content .property-card .price-free {
    margin-top: 35px;
}
.list-content .property-card .price-free .real-price {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
    position: relative;
}
.list-content .property-card .price-free .real-price svg {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: -13px;
}
.list-content .property-card .price-free .real-price span {
    font-weight: 400;
    font-size: 10px;
    line-height: 100%;
    color: #333646;
    white-space: nowrap;
}
.list-content .property-card .price-free .free {
    display: flex;
    align-items: center;
    position: relative;
}
.list-content .property-card .price-free .free .green-circle {
    width: 6px;
    height: 6px;
    background: #6bb63f;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    left: -12px;
}
.list-content .property-card .price-free .free span {
    font-weight: 400;
    font-size: 10px;
    line-height: 130%;
    color: #333646;
}
.list-content .property-card .rating {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-left: 12px;
    min-width: 35px;
    padding-top: 11px;
}
.list-content .property-card .rating-number {
    font-weight: 400;
    font-size: 12px;
    line-height: 130%;
    color: #333646;
    display: flex;
    align-items: center;
    margin-bottom: 31px;
}
.list-content .property-card .rating-number img {
    width: 14px;
    height: 14px;
    margin-right: 3px;
}
.list-content .property-card .collapse-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #fff0db;
    transition: all 0.4s ease;
}
.list-content .property-card .collapse-circle:hover {
    background-color: #ececec;
    transition: all 0.4s ease;
}
.list-content .property-card .collapse-circle:hover svg.minus rect {
    fill: #545769;
}
.list-content .property-card .collapse-circle.active {
    background-color: #f2f2f2;
}
.list-content .property-card .collapse-circle.active svg.plus {
    display: block;
}
.list-content .property-card .collapse-circle.active svg.minus {
    display: none;
}
.list-content .mobile-picture {
    height: 0;
    overflow: hidden;
    position: absolute;
    left: 0;
    top: 0;
    transition-duration: 0.2s;
    width: 100%;
}
.list-content .mobile-picture img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
}
.list-content .property-card-slider {
    min-width: 156px;
    max-width: 156px;
    height: 156px;
    margin-bottom: 0;
    position: relative;
    overflow: hidden;
    border-radius: 4px;
}
.list-content .property-card-slider .slick-list {
    padding: 0;
    border-radius: 4px;
}
.list-content .property-card-slider .slick-slide {
    outline: none;
    position: relative;
    height: 156px;
}
.list-content .property-card-slider .slick-slide::before {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    border: 0.5px solid rgba(0, 0, 0, 0.12);
    border-radius: 4.625px;
    z-index: 10;
    top: 0;
    left: 0;
    pointer-events: none;
}
.list-content .property-card-slider .slick-slide::after {
    position: absolute;
    content: "";
    width: 100%;
    height: 100%;
    background: linear-gradient(
        180deg,
        rgba(255, 255, 255, 0) 42.97%,
        rgba(0, 0, 0, 0.36) 100%
    );
    border-radius: 4.625px;
    z-index: 5;
    top: 0;
    left: 0;
    pointer-events: none;
}
.list-content .slick-dots {
    bottom: 4px;
}
.list-content .slick-dots li {
    width: 6px;
    height: 6px;
    margin: 0 2.5px;
}
.list-content .slick-dots li button {
    width: 6px;
    height: 6px;
    padding: 0;
}
.list-content .slick-dots li button::before {
    font-size: 6px;
    line-height: 6px;
    width: 6px;
    height: 6px;
    opacity: 0.4;
    color: #ffffff;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.14);
}
.list-content .slick-dots li.slick-active button::before {
    opacity: 1;
    color: #ffffff;
}
.list-content .superhost-icon {
    position: absolute;
    top: 4px;
    left: 4px;
    width: 70px;
    height: 18px;
    background: #ffffff;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12);
    border-radius: 2px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 500;
    font-size: 8px;
    line-height: 100%;
    letter-spacing: 0.02em;
    text-transform: uppercase;
    color: #333646;
    z-index: 10;
}

.list-content.favorites-content .sorting-block {
    display: none;
}

@media (max-width: 1230px) {
    .list-content .property .property-item {
        width: 100%;
    }
    .list-content .property-card .data {
        margin-right: 20px;
    }
    .list-content .property-card .type {
        margin-right: 20px;
    }
}
@media (max-width: 1200px) {
    .list-content .google-map {
        width: calc(100% - 650px);
    }
    .list-content .property.show-map .container > div {
        flex-direction: column-reverse;
    }
    .list-content .property.show-map .property-card.collapse .data {
        width: 100%;
    }
    .list-content .property.show-map .property-card.collapse .data a.title {
        max-width: none;
    }
    .list-content .property.show-map .property-item {
        min-width: 650px;
        max-width: 650px;
    }
    .list-content .property.not-map .property-card.collapse-item .data a.title {
        max-width: 450px;
    }
    .list-content .property-card .distance {
        white-space: normal;
    }
}
@media (max-width: 1140px) {
    .list-content .property.not-map .property-card.collapse-item .data {
        margin-right: 70px;
    }
    .list-content .property.not-map .property-card.collapse-item .data a.title {
        max-width: 400px;
    }
}
@media (max-width: 1040px) {
    .list-content .google-map {
        height: 452px;
        position: relative;
        width: 100%;
        transform: none;
    }
    .list-content .property.show-map .property-item {
        min-width: auto;
        max-width: none;
    }
    .list-content .property.show-map .property-card .all-types-content {
        display: block;
    }
    .list-content .property.show-map .property-card .all-types {
        display: block;
    }
    .list-content .property.show-map .property-card .type {
        display: table;
    }
    .list-content .property .property-card {
        position: relative;
        min-height: auto;
        max-height: none;
    }
    .list-content .property .property-card .all-types {
        text-align: right;
    }
    .list-content .property .property-card .price-free {
        margin-top: 0;
        display: flex;
        align-items: center;
        margin-right: 30px;
    }
    .list-content .property .property-card .price-free .real-price {
        margin-bottom: 0;
        margin-left: 0;
        margin-right: 21px;
    }
    .list-content .property .property-card .night {
        flex-direction: row-reverse;
        padding-right: 0;
        border-right: 0;
        height: auto;
        position: absolute;
        bottom: 17px;
        right: 16px;
        padding-top: 0;
    }
    .list-content .property .property-card .photo-container img {
        width: 117px;
        height: 168px;
    }
    .list-content .property .property-card .no-photo {
        min-width: 117px;
        max-width: 117px;
        height: 168px;
    }
    .list-content .property .property-card .price {
        margin-top: 0;
        margin-right: 12px;
        width: auto;
        display: flex;
        align-items: center;
    }
    .list-content .property .property-card .price-span {
        margin-right: 5px;
    }
    .list-content .property .property-card .rating {
        margin-left: 0;
        position: absolute;
        top: 20px;
        left: 89px;
        padding-top: 0;
    }
    .list-content .property .property-card .collapse-circle {
        display: none;
    }
    .list-content .property .property-card .rating-number {
        width: 40px;
        height: 20px;
        border-radius: 4px;
        background: #fff;
        justify-content: center;
        margin-bottom: 0;
    }
    .list-content .property .property-card .rating-number img {
        width: 10px;
        height: 10px;
    }
    .list-content .property .property-card .type {
        margin-right: 0;
        width: 330px;
    }
    .list-content .property .property-card .type .type-item span {
        display: none;
    }
    .list-content .property .property-card .type .type-block {
        text-align: left;
        height: 20px;
    }
    .list-content .property .property-card .type .type-block span {
        display: none;
    }
    .list-content
        .property
        .property-card
        .type
        .type-block:not(:last-of-type) {
        text-align: center;
    }
    .list-content .property .property-card .type .title:first-of-type {
        text-align: center;
        padding-left: 0;
        min-width: 70px;
        max-width: 70px;
    }
    .list-content .property .property-card .type .title:nth-of-type(2) {
        min-width: 70px;
        max-width: 70px;
        text-align: center;
    }
    .list-content .property .property-card .type .title:nth-of-type(3) {
        min-width: 86px;
        max-width: 86px;
        text-align: center;
    }
    .list-content .property .property-card .type .title:nth-of-type(4) {
        min-width: 88px;
        max-width: 88px;
        text-align: left;
    }
    .list-content .property .property-card .type .type-block.filling-block {
        text-align: center;
    }
    .list-content .property .property-card .type img {
        margin: auto;
    }
    .list-content .property .property-card .type th.title:first-of-type {
        padding-left: 0;
    }
    .list-content .property .property-card .type .type-block.filling-block {
        max-width: 70px;
        min-width: 70px;
    }
    .list-content .property .property-card .distance {
        white-space: nowrap;
    }
    .list-content .property .additionally {
        margin-top: 7px;
    }
    .list-content .property-card-slider {
        overflow: hidden;
        min-width: 117px;
        height: 168px;
    }
    .list-content .property-card-slider a {
        height: 100%;
    }
    .list-content .property-card-slider img {
        width: 100%;
        height: 100%;
        border-radius: 4.625px;
    }
    .list-content .property-card-slider > div {
        min-width: 117px;
        height: 168px;
    }
}
@media (max-width: 991px) {
    .list-content {
        padding-bottom: 59px;
    }
    .list-content .container {
        padding-left: 0;
        padding-right: 0;
    }
    .list-content .property-card .data-block-circle:nth-of-type(3) {
        display: none;
    }
    .list-content .property-card .data-block-circle:nth-of-type(4) {
        display: none;
    }
    .list-content .property-card .data {
        margin-left: 17px;
        justify-content: flex-start;
    }
    .list-content .property-card a.title {
        margin-bottom: 18px;
        max-height: 46px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .list-content .property-card .data-block-oval:last-of-type {
        margin-right: 0;
    }
    .list-content .property-card .type .type-item {
        margin-right: 14px;
    }
    .list-content .property-card .type .personen {
        margin-right: 14px;
    }
    .list-content .property-card .type .quantity {
        margin-right: 14px;
    }
    .list-content .property.not-map .property-card:first-of-type {
        border-radius: 0;
    }
    .list-content .property.not-map .property-card:last-of-type {
        border-radius: 0;
    }
}
@media (max-width: 840px) {
    .list-content .google-map.fullscreen.show-card {
        height: calc(100vh - 229px);
    }
}
@media (max-width: 767px) {
    .list-content .property .property-card .type {
        width: auto;
    }
    .list-content .property .property-card .type .price-block {
        width: 84px;
    }
    .list-content .property .property-card .table-container {
        min-width: 315px;
    }
    .list-content
        .property
        .property-card
        .all-types-content
        .type
        .quantity-block {
        width: 51px;
    }
    .list-content
        .property
        .property-card
        .all-types-content
        .type
        .personen-block {
        width: 88px;
    }
    .list-content
        .property
        .property-card
        .all-types-content
        .type
        .filling-block {
        width: 52px;
    }
}
@media (max-width: 720px) {
    .list-content .google-map.fullscreen.show-card {
        height: 100%;
    }
    .list-content .google-map.fullscreen.show-card .property-card {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
    }
    .list-content .google-map.fullscreen.show-card .middle-block {
        flex-direction: column;
    }
    .list-content .google-map.fullscreen.show-card .property-card-slider {
        display: none;
    }
    .list-content .google-map.fullscreen.show-card .rating {
        display: block;
    }
    .list-content .google-map.fullscreen.show-card .rating-number {
        position: absolute;
        top: -108px;
        left: -42px;
    }
    .list-content .google-map.fullscreen.show-card .data {
        margin-left: 0;
        margin-right: 0;
    }
    .list-content .google-map.fullscreen.show-card .title {
        margin-bottom: 8px;
        max-width: none;
    }
    .list-content .google-map.fullscreen.show-card .geolocation {
        display: none;
    }
    .list-content .google-map.fullscreen.show-card .geolocation img {
        margin-right: 0;
    }
    .list-content .google-map.fullscreen.show-card .data-item {
        margin-bottom: 0;
    }
    .list-content .google-map.fullscreen.show-card .night {
        padding-left: 0;
        position: static;
        padding-right: 0;
    }
    .list-content
        .google-map.fullscreen.show-card
        .property-card.active
        .additionally {
        display: flex;
        margin-top: 20px;
    }
    .list-content .google-map.fullscreen.show-card .property-card {
        flex-direction: column;
        transition-duration: 0.2s;
        height: 140px;
    }
    .list-content .google-map.fullscreen.show-card .property-card.big {
        transition-duration: 0.2s;
        height: calc(100vh - 106px);
        justify-content: space-between;
        overflow: visible;
    }
    .list-content
        .google-map.fullscreen.show-card
        .property-card.big
        .geolocation {
        display: block;
    }
    .list-content .google-map.fullscreen.show-card .property-card.big .type {
        display: flex;
        margin-top: 20px;
    }
    .list-content .google-map.fullscreen .mobile-picture.active {
        height: 169px;
        transition-duration: 0.2s;
    }
    .list-content .property .additionally {
        display: none;
    }
    .list-content .property .property-card .type {
        display: none;
    }
    .list-content .property .property-card .table-container {
        display: none;
    }
    .list-content .property .property-card .property-card-container {
        padding-bottom: 16px;
    }
    .list-content .property .property-card .data {
        min-height: auto;
    }
    .list-content .property .property-card .night {
        width: 100%;
        right: auto;
        left: 0;
        justify-content: space-between;
        padding-left: 150px;
        padding-right: 16px;
        bottom: 10px;
    }
    .list-content .property .property-card .price {
        font-size: 13px;
        order: 3;
        margin-right: 0;
    }
    .list-content .property .property-card .favorites {
        width: 24px;
        height: 24px;
        order: 1;
    }
    .list-content .property .property-card .favorites img {
        width: 10px;
        height: 10px;
    }
    .list-content .property .property-card .price-free {
        order: 2;
        margin-right: 0;
    }
    .list-content .property .property-card .rating {
        left: 68px;
    }
    .list-content .property .property-card a.title {
        margin-bottom: 10px;
    }
    .list-content .property.show-map .property-card .type {
        display: none;
    }
    .list-content .property-card-slider {
        min-width: 96px;
        height: 138px;
        max-width: 96px;
    }
    .list-content .property-card-slider > div {
        min-width: 96px;
        height: 138px;
        max-width: 96px;
    }
    .list-content .google-map .property-card {
        border: 0;
        border-radius: 10px 10px 0 0;
        padding-top: 23px;
    }
    .list-content .google-map .mobile-card-button {
        position: absolute;
        top: 10px;
        left: 50%;
        transform: translateX(-50%);
        width: 40px;
        height: 5px;
        background: #e3e3e3;
        border-radius: 100px;
        cursor: pointer;
    }
}
@media (max-width: 575px) {
    .list-content {
        padding-bottom: 69px;
    }
    .list-content .google-map {
        height: 189px;
    }
    .list-content .property.show-map .property-card .photo-container {
        display: none;
    }
    .list-content .property.show-map .property-card .night {
        position: static;
        padding: 0;
        justify-content: flex-end;
        margin-top: 10px;
    }
    .list-content .property.show-map .property-card .data {
        margin-right: 0;
        margin-left: 0;
    }
    .list-content .property.show-map .property-card .geolocation {
        display: none;
    }
    .list-content .property.show-map .property-card .favorites {
        display: none;
    }
    .list-content .property.show-map .property-card .property-card-container {
        flex-direction: column;
    }
    .list-content .property.show-map .property-card-slider {
        display: none;
    }
    .list-content .property.show-map .rating {
        display: none;
    }
    .list-content .property.show-map .property-card {
        flex-direction: column;
    }
    .list-content .property.show-map .night-rating-block {
        width: 100%;
    }
    .list-content .load-all-objects {
        height: 50px;
    }
    .list-content .property .property-card a.title {
        max-height: 42px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 15px;
    }
    .list-content .property .property-card a.title:hover span {
        border-bottom: 0;
    }
    .list-content .property .property-card .night {
        padding-left: 129px;
        bottom: 16px;
        align-items: flex-end;
    }
    .list-content .property .property-card .data {
        margin-right: 0;
        height: auto;
    }
    .list-content .property .property-card .geolocation {
        font-size: 11px;
    }
    .list-content .property .property-card .humans {
        font-size: 11px;
    }
    .list-content .property .property-card .distance {
        white-space: normal;
        font-size: 11px;
    }
    .list-content .property .property-card .rating {
        left: 54px;
    }
    .list-content .property .property-card .photo-container img {
        width: 96px;
        height: 138px;
    }
    .list-content .property .property-card .no-photo {
        min-width: 96px;
        max-width: 96px;
        height: 138px;
    }
    .list-content .property .property-card .no-photo .no-photo-small {
        min-width: 26px;
        max-width: 26px;
        height: 26px;
        background: #d8d8d8;
        border-radius: 2px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
    }
    .list-content .property .property-card .no-photo .no-photo-small svg {
        width: 20px;
        height: 9px;
    }
    .list-content .property .property-card .price-free {
        display: none;
    }
    .list-content .link-block {
        width: 100%;
        text-align: center;
    }
    .list-content .link-block .shadow-block {
        max-width: none;
    }
    .list-content .property-card-slider {
        min-width: 96px;
        max-width: 96px;
    }
    .list-content .property-card-slider > div {
        min-width: 96px;
        max-width: 96px;
    }
    .list-content .superhost-icon {
        left: 50%;
        transform: translateX(-50%);
    }
}
@media (max-width: 420px) {
    .list-content .property.not-map .property-card .distance .mobile-span {
        display: inline;
    }
    .list-content .property.not-map .property-card .distance .desctop-span {
        display: none;
    }
    .list-content .property .property-card .photo-container img {
        width: 82px;
    }
    .list-content .property .property-card .no-photo {
        min-width: 82px;
        max-width: 82px;
    }
    .list-content .property .property-card .night {
        padding-left: 115px;
        bottom: 17px;
    }
}
</style>
