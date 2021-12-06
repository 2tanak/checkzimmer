<template>
    <div id="app-list">
        <div class="list-content" :style="{display: loading ? 'none' : 'block'}">
            <div class="list-content-item">
                <div class="container">
                    <div class="sorting-block">
                        <ListModeDisplay :listMode="listMode" :total="totals.reduce( (sum, item) => sum + item)" v-model="listMode" />
                        <OrderDropdown :mode="this.search.ord" @switch="loadSort" />
                    </div>
                </div>

                <div :class="{property: true, 'not-map': listMode === 'list', 'show-map': listMode === 'map'}">
                    <div :class="{container: true, active: listMode === 'map'}">
                        <transition name="fade" appear>
                            <div class="property-container" :style="{position: 'relative', opacity: loading ? 0:1, position: loading ? 'absolute':'relative'}">
                                <div class="property-item">
                                    <div>
                                        <PropertyListItem v-for="(item, index) in property" :key="'prop-id-'+index+'-'+item.id" :item="item" :active="activeItems[index]" :index="index" :ref="'listItem' + item.id" @click.native="goToMap(item, index)" @favsUpdated="updateFavCount"/>
                                    </div>
                                    <ItemLoading first="true" />

                                    <div class="load-all-objects" v-if="loadingData" @click.prevent="loadMore">
                                        <div class="load-all">
                                            <svg class="rot" width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.00281 0.330903C6.77399 0.330985 6.54232 0.342716 6.30831 0.36667C6.30831 0.36667 6.30591 0.367316 6.30125 0.368581C5.36538 0.468219 4.48872 0.76195 3.71128 1.20818C3.26076 1.46771 2.842 1.77883 2.46372 2.13299C1.86113 2.6993 1.36427 3.37639 1.00525 4.13089C0.738588 4.68923 1.13859 5.33089 1.75525 5.33089C2.01615 5.33089 2.26511 5.21157 2.41632 5.00825C3.18549 3.23976 4.95037 2.00001 6.99997 2C7.22735 2 7.45068 2.01554 7.66914 2.04554M7.00281 0.330903C8.84369 0.330239 10.5001 1.08351 11.7083 2.29167L11.7207 2.27913L12.2416 1.75C12.7666 1.225 13.6666 1.6 13.6666 2.34167V5.33334C13.6666 5.48629 13.6249 5.62996 13.5522 5.75351C13.4207 5.97705 13.188 6.13473 12.9182 6.16235C12.8903 6.16521 12.862 6.16668 12.8333 6.16668H11.9398L9.84164 6.16667C9.09997 6.16667 8.7333 5.26667 9.2583 4.74167L10.5166 3.48334C9.76469 2.72443 8.78005 2.1982 7.66966 2.04561M7.01588 13.6667C7.24303 13.6664 7.47299 13.6547 7.70526 13.6309C7.70513 13.6305 7.70501 13.6301 7.70489 13.6298C8.64366 13.5309 9.523 13.2367 10.3026 12.7892C10.7529 12.5298 11.1715 12.2187 11.5497 11.8647C12.1523 11.2984 12.6493 10.6212 13.0083 9.86668C13.275 9.30834 12.875 8.66668 12.2583 8.66668C11.9974 8.66668 11.7484 8.786 11.5972 8.98932C10.8281 10.7578 9.06319 11.9976 7.01359 11.9976C6.78625 11.9976 6.56295 11.982 6.34452 11.952C5.23387 11.7996 4.24901 11.2733 3.49692 10.5142L4.75526 9.25589C5.28026 8.73089 4.91359 7.83089 4.17192 7.83089H1.18026C1.15161 7.83089 1.12329 7.83235 1.09537 7.83521C0.825604 7.86283 0.592869 8.02051 0.461363 8.24406C0.388683 8.36761 0.346924 8.51127 0.346924 8.66422V11.6559C0.346924 12.3976 1.24692 12.7726 1.77192 12.2476L2.2929 11.7184L2.30526 11.7059C2.31587 11.7165 2.32651 11.7271 2.3372 11.7376C3.54253 12.9272 5.18604 13.6673 7.01075 13.6667C7.01246 13.6667 7.01417 13.6667 7.01588 13.6667Z" fill="#7A8793"/>
                                            </svg>
                                            <span>{{ $t('Loading') }}...</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="property-shadow" v-if="property.length"></div>
                                <div :class="{'google-map': true, 'fullscreen': fullscreenMap}">
                                    <div id="map"></div>

                                    <div class="fullscreen-button" @click="mapFullscreen"><img src="/svg/i-fullscrean.svg" alt="Full Screen Map"></div>
                                    <div class="close-button" @click="mapFullscreenOff"><img src="/svg/i-close-burger.svg" alt="Full Screen Map"></div>

                                    <div class="mobile-picture">
                                        <img src="/img/property-picture.png" alt="alt">
                                    </div>
                                    <!--<PropertyCard v-if="false" /> -->

                                </div>
                            </div>
                        </transition>
                        <transition name="fade">
                            <div class="load-block-content" :style="{ display: loading ? 'block':'none' }">
                                <ItemListLoading />
                                <div class="place-card"></div>
                            </div>
                        </transition>
                    </div>
                </div>

                <!--<div class="container">
                    <PromoBlock v-if="false" />
                </div>-->

                <div class="alternative-classifieds" v-if="this.nodist && this.propertyAlt.length">
                    <div class="property not-map">
                        <div class="container">
                            <span class="title-text">Alternative Anzeigen in der Umgebung</span>
                            <div class="alternative-classifieds-content">
                                <PropertyListItem v-for="(item, index) in propertyAlt" :key="'prop-id-'+index+'-'+item.id" :item="item" :active="activeItems[index]" :index="index" :ref="'listItem' + item.id" @click.native="goToMap(item, index)" @favsUpdated="updateFavCount"/>
                            </div>
                        </div>
                    </div>
                </div>


                <transition name="fade">
                <div class="communication not-active" style="top:34px;position:relative;">
                    <div class="description">
                    <div class="load-more" v-if="additional_load">
                        <div style="display:none;" class="btn btn-success" @click.prevent="loadMore">{{ $t('Load more') }}</div>
                    </div>
                    <div style="display:none;" class="description" v-if="!additional_load && !endoflist">
                        {{ $t('The offers on your request are over, but you can check surrounding places within chosen distance') }}
                    </div>
                    <div class="description" v-if="!additional_load && endoflist">
                        {{ $t('The offers on your request are over, increase the distance or contact the manager directly') }}
                    </div>
                    <div style="display:none;" class="link-block" v-if="!additional_load && !endoflist">
                        <a href="/registration" @click.prevent="loadMore">{{ $t('Load surrounding places') }}</a>
                        <div class="shadow-block"></div>
                    </div>
                    <div class="link-block" v-if="!additional_load && endoflist" @click.prevent="modalShow">
                        <a href="#">{{ $t('Contact manager') }}</a>
                        <div class="shadow-block"></div>
                    </div>
                </div>
                </div>
                </transition>

            </div>

        </div>
    </div>
</template>

<script>

import ApiRequest from "../API/ApiRequest";
import PropertyListItem from "./PropertyListItem";
import ItemLoading from "./partials/ItemLoading";

import styles from '../Data/mapStyle';
import popupInit from '../Data/mapMarker';
import ItemListLoading from "./partials/ItemListLoading";
import OrderDropdown from "./partials/OrderDropdown";
import ListModeDisplay from "./partials/ListModeDisplay";
//import PromoBlock from "./partials/PromoBlock";
//import PropertyCard from "./partials/PropertyCard";

let PropertyRequest = ApiRequest('property')
let properties = new PropertyRequest;

let search = document.location.search.substr(1).split('&').map( item => item.split('=') );
let searchLine = {};

for (let i in search) {
    searchLine[ search[i][0] ] = search[i][1]
}

let newSearch = {
    address: searchLine.address || '',
    distance: searchLine.distance || '30',
    people: searchLine.person || '2',
    single: false,
    double: false,
    multi: false,
    ord: 'def'
};

export default {
    name: 'app',
    components: {
        ListModeDisplay,
        OrderDropdown,
        ItemListLoading,
        PropertyListItem,
        ItemLoading,
        //PropertyCard,
        //PromoBlock,
    },
    data() {
        return {
            map: null,
            listMode: 'list',
            loading: true,
            loadingData: false,
            endoflist: false,
            property: [],
            totals: [0, 0, 0],
            propertyAlt: [],
            page: 1,
            nocity: 0,
            nodist: 0,
            additional_load: true,
            coords_load: [],
            additional_pages: true,
            search: {...newSearch},
            activeItems: [],
            fullscreenMap: false
        };
    },
    mounted() {
        let that = this;

        jQuery('.entry.login-link').click(function(e) {
            that.login(e);
        })
        jQuery('.modal-form.login input').on('input', function() {
            jQuery(this).removeClass('error');
            jQuery(this).closest('.input-block').find('.error-text').removeClass('active')
        });
        jQuery(document).on('click', '.popup-container .index', (e) => {
            this.selectMapMarker(e);
        });
        jQuery('#number-personse').change( (e) => {
            this.search.people = jQuery('#number-personse').val()
        })
        jQuery('#distance-select').change( (e) => {
            this.search.distance = jQuery('#distance-select').val()
        })
        jQuery('#text').on('input', (e) => {
            this.search.address = jQuery('#text').val()
        })
        jQuery('#single-rooms').on('input', (e) => {
            this.search.single = jQuery('#single-rooms').prop('checked')
        })
        jQuery('#double-rooms').on('input', (e) => {
            this.search.double = jQuery('#double-rooms').prop('checked')
        })
        jQuery('#multi-bed-rooms').on('change', (e) => {
            this.search.multi = jQuery('#multi-bed-rooms').prop('checked')
        })

        jQuery('.find-housing').click((e) => {
            e.preventDefault();
            this.submitForm(true);
        });

        jQuery(window).scroll((e) => {
            this.mapScrolling()
        });

        this.submitForm(true);

        /*jQuery('body').on('click', 'a.favorites', function(e) {
            e.preventDefault();
            jQuery(this).toggleClass('active');
        });*/
        jQuery(window).scroll( () => {
            this.lazySearch()
        })

        let timer = null;
        jQuery('[name="address"]').on('focus', () => {
            let item = jQuery('.result-search ul li:first-child');
            if (jQuery(item).attr('type')) {
                jQuery('.result-search').addClass('active');
            }
        });
        jQuery('[name="address"]').on('input', (e) => {
            if (e.target.value.length < 3) {
                return;
            }
            if (timer) {
                clearTimeout(timer);
            }
            timer = setTimeout( () => {
                timer = null;
                // ToDo: geocode address in not postcode or city
                // ToDo: check distances for city and postcode in case ciy does not have a domain
                axios.post('/search/tooltip', { input: e.target.value})
                    .then( (resp) => {
                        that.searchRes = resp.data;
                        if (that.searchRes.length === 0) {
                            jQuery('.result-search ul').html('<li>' + that.$t('No results found') + '</li>');
                            jQuery('.result-search').addClass('active');
                            return;
                        }
                        let str = [];
                        for (let i in that.searchRes) {
                            let value = that.searchRes[i]['type'] === 'code' ? that.searchRes[i]['code'] : '';
                            let line = `<li type="${that.searchRes[i]['type']}" domain="${that.searchRes[i]['domain']}" value="${value}">${that.searchRes[i]['text']}</li>`;
                            str.push(line)
                        }
                        jQuery('.result-search ul').html(str);
                        jQuery('.result-search').addClass('active');
                    })
            }, 1000)
        })
        jQuery('.result-search').on('click', 'ul li', (e) => {
            let type = jQuery(e.target).attr('type');
            if (!type) {
                jQuery('.result-search').removeClass('active');
                return;
            }
            let domain = jQuery(e.target).attr('domain');
            let value = jQuery(e.target).attr('value');

            jQuery('form input[name="address"]').val(value);
            jQuery('form input[name="address"]').attr('type', type);
            jQuery('form input[name="address"]').attr('domain', domain);
            let subdomain = domain.split('//')[1].split('.')[0];
            let current = document.location.hostname.split('.')[0];
            if (current !== subdomain) {
                document.location = domain + '/?' + jQuery('form.find-subdomain-redirect').serialize().replace(/_token=.*?&/, '');
            } else {
                this.search.address = value;
                jQuery('.result-search').removeClass('active');
                this.submitForm(true);
            }

        })
        jQuery('body').on('click', (e) => {
            if (jQuery(e.target).closest('.result-search').length === 0 && jQuery(e.target).closest('form').length === 0) {
                jQuery('.result-search').removeClass('active');
            }

        })
    },
    methods: {
        lazySearch() {
            if (this.loadingData) {
                return;
            }
            let screenTop = jQuery(window).scrollTop();
            let screenHeight = jQuery(window).height();
            let itemTop = jQuery('.property-container').offset().top;
            let itemHeight = jQuery('.property-container').height();

            if (screenTop + screenHeight + 200 > itemTop + itemHeight && !this.endoflist) {
                this.submitForm();
            }
        },
        modalShow() {
            jQuery('.inquiry-modal-overlay').addClass('modal-show');
        },
        mapScrolling() {
            if (!jQuery('.list-content .property').hasClass('show-map')) {
                return;
            }
            let mapLayout = jQuery('.property-container').offset();
            let scrollTop = jQuery(window).scrollTop();
            let delta = scrollTop - mapLayout.top;
            let scrollEnd = scrollTop - (mapLayout.top + jQuery('.property-container').height() - jQuery(window).height());
            if (delta > 0 && scrollEnd <=0) {
                jQuery('.list-content .google-map').css({ position: 'fixed', transform: 'translate3d(0, 0, 0)' })

            } else if (scrollEnd > 0 ) {
                jQuery('.list-content .google-map').css({ position: 'fixed', transform: 'translate3d(0, -'+scrollEnd+'px, 0)', 'transition-duration': '0' })
            } else {
                jQuery('.list-content .google-map').css({ position: 'absolute', transform: 'translate3d(0, 0, 0)' })
            }

        },
        initMap() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout( () => { this.initMap() }, 100 );
                return;
            }

            this.map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.340654, lng: 12.375411},
                disableDefaultUI: true,
                zoom: 15,
                styles: styles
            });

            this.map.setOptions({styles: styles});
            this.setMapMarker();
        },
        setMapMarker() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout(() => {
                    this.setMapMarker();
                }, 100);
            } else {
                let popupClass = new popupInit();
                let popupFactory = new popupClass.init();
                this.property.forEach(item => {
                    var popup = new popupFactory(
                        new google.maps.LatLng(parseFloat(item.lat), parseFloat(item.lng)),
                        this.createInfoBlock('&euro;' + this.minRoomPrice(item), item.id)
                    );
                    popup.setMap(this.map);
                })
            }
        },
        goToMap(item, index) {
            this.setActiveProperty(index);
            this.map.setCenter({ lat: parseFloat(item.lat), lng: parseFloat(item.lng)});
            setTimeout(() => {
                jQuery('.popup-bubble[data-id="' + item.id + '"]').closest('.popup-bubble-anchor').addClass('active');
            }, 10);
        },
        createInfoBlock(text, id) {
            var newDiv = document.createElement("div");
            newDiv.setAttribute("id", "object_modal");
            newDiv.setAttribute("data-id", id);
            newDiv.innerHTML = '<span class="index">'+ text +'</span>';
            newDiv.addEventListener("click", this.selectMapMarker);
            return newDiv;
        },
        selectMapMarker(e) {
            let elem = e.target;
            if (jQuery(elem).hasClass('index')) {
                elem = jQuery(elem).parent();
            }

            let id = parseInt(jQuery(elem).attr('data-id'));

            let index = this.property.findIndex( item => item.id === id );

            this.setActiveProperty(index);
            this.scrollActiveMap(id);

            jQuery(elem).closest('.popup-bubble-anchor').addClass('active');

        },
        setActiveProperty(index) {
            jQuery('.popup-bubble-anchor').removeClass('active');
            this.activeItems.forEach((item, ind) => {
                this.$set(this.activeItems, ind, false);
            })
            this.$set(this.activeItems, index, true);

        },
        scrollActiveMap(id) {
            let elem = document.getElementById('property-'+id);
            let rect = elem.getBoundingClientRect();
            jQuery('html, body').animate({scrollTop: window.scrollY + rect.top - 200}, 200);
        },
        login(e) {
            e.preventDefault();
            let res = true;
            jQuery('.modal-form.login input').each(function() {
                var value = jQuery(this).val();
                if (value === '') {
                    jQuery(this).addClass('error');
                    jQuery(this).closest('.input-block').find('.error-text').addClass('active')
                    res = false;
                }
            })

            if (res === false) {
                return;
            }
            this.$auth.login({
                data: {
                    email: jQuery('#mail-phone').val(),
                    password: jQuery('#password').val()
                },
                staySignedIn: true,
                fetchUser: true
            })
            .then((resp) => {
                if(resp.data.data.role == 'holder'){
					document.location = '/cabinet';
					return false;
				}
				if(resp.data.data.role == 'admin'){
				    document.location = '/dashboard';
					return false;
				}
            });
        },
        modeSwitch(mode) {
            this.listMode = mode;
        },
        submitForm(clear) {
            clear = clear || false

            if (clear) {
                this.page = 1;
                this.nocity = 0;
                this.additional_load = true;
                this.endoflist = false;
                this.nodist = 0;
                this.property = [];
                this.propertyAlt = [];
                this.totals = [0, 0, 0];
            } else {
                this.page += 1;
            }

            this.loadingData = true;
            let that = this;

            let search = { ...this.search };
            search.distance = this.nodist ? search.distance : 60;
            properties.request('queryFilter', this.search, 'post', { page: this.page, nocity: this.nocity, nodist: this.nodist})
                .then( resp => {
                    if (!this.nodist) {
                        that.property = that.property.concat(resp.data.objects.data);
                    } else {
                        that.propertyAlt = resp.data.objects.data;
                    }
                    //that.totals += resp.data.objects.total;
                    that.foundTotal(resp.data.objects.total);
                    that.page = resp.data.objects.current_page;
                    that.additional_pages = resp.data.current_page < resp.data.last_page;
                    that.loadingData = false;
                    that.loading = false;
                    jQuery(' .load-block-content.first-load-block-content').css('display', 'none')
                    if (resp.data.objects.current_page  >= resp.data.objects.last_page) {
                        if (that.additional_load === false) {
                            if (this.nodist === 0 ) {
                                that.nodist = 1;
                            } else {
                                that.endoflist = true;
                            }

                        }
                        that.additional_load = false;
                        that.page = 0;
                        that.nocity = 1;
                    }
                    that.favoritesDisplay();
                    that.initMap();
                })
        },
        loadMore() {
            let that = this;
            that.page = ++that.page;
            let params = {};
            if (!this.additional_load) {
                params.nocity = 1
            }
            properties.byPage(that.page, params)
                .then( resp => {
                    that.property = that.property.concat(resp.data.objects.data);
                    that.loading = false;
                    that.additional_pages = resp.data.current_page < resp.data.last_page;

                    if (resp.data.objects.current_page  >= resp.data.objects.last_page - 1) {
                        if (that.additional_load == false) {
                            that.endoflist = true;
                        }
                        that.additional_load = false;
                        that.page = 0;
                    }

                    that.favoritesDisplay();
                    //that.foundTotal();
            })
        },

        loadSort(order) {
            this.search.ord = order;
            this.loading = true;
            this.loadingData = true;
            jQuery(' .load-block-content.first-load-block-content').css('display', 'block');
            this.submitForm(true);

            /*properties.request('querySort', data)
                .then( resp => {
                    this.property = resp.data.objects.data;
                    that.favoritesDisplay();
                    that.foundTotal();
                })*/
        },

        favoritesCount() {
            let favs = JSON.parse(localStorage.getItem("favoritesList")) || [];
            let favNoNull = favs.filter( (item) => item !== null);
            if (favs.filter( (item) => item === null).length) {
                localStorage.setItem('favoritesList', JSON.stringify(favNoNull));
            }
            return favNoNull.length;
        },
        favoritesDisplay() {
            jQuery('.favoritesCount').text( this.favoritesCount() )
        },
        updateFavCount() {
            this.favoritesDisplay();
        },
        foundTotal(total) {
            if (total === 0) {
                return;
            }
            let ind = (this.nocity === 0 && this.nodist === 0) ? 0 : (this.nocity === 1 && this.nodist === 0 ? 1 : 2);
            this.totals[ind] = total;
        },
        minRoomPrice(property, room) {
            if (room && room.price) {
                return room.price;
            }
            if (property.rooms.length === 0) {
                return 0;
            }
            return property.rooms.reduce( (acc, cur) => cur.price ? ( acc ? Math.min(acc, cur.price) : cur.price ) : acc, 0 )
        },
        mapFullscreen() {
            this.fullscreenMap = true;
        },
        mapFullscreenOff() {
            this.fullscreenMap = false;
        }
    }
}
</script>

<style lang="scss">

.fade-enter-active, .fade-leave-active {
    transition: opacity 1.2s;
}
.fade-enter, .fade-leave-to {
    opacity: 0;
}
.popup-bubble {
    position: absolute;
    top: 0;
    left: 0;
    transform: translate(-50%, -100%);
    background-color: white;
    padding: 5px;
    border-radius: 5px;
    font-family: sans-serif;
    overflow-y: auto;
    max-height: 60px;
    box-shadow: 0 2px 10px 1px rgba(0, 0, 0, 0.5);
}
.popup-bubble-anchor {
    &::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        transform: translate(-50%, 0);
        width: 0;
        height: 0;
        border-left: 6px solid transparent;
        border-right: 6px solid transparent;
        border-top: 8px solid white;
    }
    position: absolute;
    width: 100%;
    bottom: 8px;
    left: 0;
}
.popup-container {
    cursor: auto;
    height: 0;
    position: absolute;
    width: 200px;
}

.list-content {
    .load-all-objects {
        .load-all {
            svg {
                margin-right: 7px;
            }
            span {
                font-weight: 500;
                font-size: 15px;
                line-height: 100%;
                color: #333646;
            }
            svg.rot {
                animation: 1s linear 0s normal none infinite running rot;
                -webkit-animation: 1s linear 0s normal none infinite running rot;
            }
            display: flex;
            align-items: center;
        }
        height: 74px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-top: 1px solid #e8e8ed;
    }
}
.load-more {
    .btn {
        &:hover {
            background-color: #60a338;
            transition: all 0.4s ease;
        }
        background: #6bb63f;
        border-color: #6bb63f;
        color: #ffffff;
    }
}

@keyframes rot {
    0% {transform: rotate(0);}

    100% {transform: rotate(360deg);}
}

@media (max-width: 991px) {
    .load-more {
        .btn {
            bottom: -68px;
        }
    }
}
@media (max-width: 575px) {
    .load-more {
        .btn {
            bottom: -78px;
        }
    }
}

.alternative-classifieds {
    .alternative-classifieds-content {
        &::after {
            content: "";
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            bottom: 0;
            z-index: -1;
            background: #FFFFFF;
            box-shadow: 0 4px 30px rgba(51, 54, 70, 0.16);
            border-radius: 14px;
            width: calc(100% - 60px);
            height: 110px;
        }
        background: #FFFFFF;
        box-shadow: 0 0 14px rgba(51, 54, 70, 0.14);
        border-radius: 12px;
        position: relative;
        flex-direction: column;
    }
    .title-text {
        margin-bottom: 24px;
        font-weight: 600;
        font-size: 20px;
        line-height: 130%;
        color: #333646;
        padding: 0 16px;
        display: block;
    }
    .property-card {
        background-color: transparent;
    }
    margin-top: 44px;
}

</style>
