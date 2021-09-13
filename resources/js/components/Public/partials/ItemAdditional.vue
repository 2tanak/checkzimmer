<template>
    <div class="night-rating-block">
        <div class="night">
            <a href="#" class="favorites" :class="{ active: isFavorite }" @click.prevent="addToFavorites">
                <svg class="favorites-usual" width="12" height="11" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11.6211 5.98172C12.6977 4.8747 12.6977 3.07667 11.6211 1.96965C10.5487 0.867074 8.8134 0.867074 7.74102 1.96965L7.20482 2.52096C7.09263 2.6363 6.90737 2.6363 6.79518 2.52096L6.25898 1.96965C5.1866 0.867074 3.45132 0.867074 2.37895 1.96965C1.30226 3.07667 1.30226 4.8747 2.37895 5.98172L7 10.7329L11.6211 5.98172ZM7.33139 1.57124C8.62813 0.237973 10.7339 0.237973 12.0307 1.57124C13.3231 2.90006 13.3231 5.05131 12.0307 6.38013L7.20482 11.3419C7.09263 11.4573 6.90737 11.4573 6.79518 11.3419L1.96932 6.38013C0.676895 5.05131 0.676895 2.90006 1.96932 1.57124C3.26606 0.237973 5.37187 0.237973 6.66861 1.57124L7 1.91196L7.33139 1.57124Z" fill="#333646" stroke="#333646" stroke-width="0.2"/>
                </svg>
                <svg class="favorites-active" width="14" height="11" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.1 1.5c-.6-.7-1.5-1-2.4-1-.9 0-1.8.4-2.4 1l-.3.3-.3-.3C6.1.8 5.2.5 4.3.5c-.9 0-1.8.4-2.4 1C.6 2.9.6 5.1 1.9 6.4l4.8 5c.1.1.2.1.3.1.1 0 .2 0 .3-.1l4.8-5c1.3-1.3 1.3-3.5 0-4.9z" fill="#EE483F"/>
                </svg>
            </a>
            <div class="price">
                <span class="price-span">{{ $t('from') }}&nbsp;{{ minRoomPrice }}&euro;</span>
                <span class="night-span">{{ $t('night') }}</span>
            </div>
            <div class="price-free">
                <div v-if="isRealPrice" class="real-price">
                    <svg width="10" height="8" viewBox="0 0 10 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.99502 1.00501C9.26839 1.27838 9.26839 1.7216 8.99502 1.99496L3.99502 6.99496C3.72166 7.26833 3.27844 7.26833 3.00507 6.99496L0.505074 4.49496C0.231707 4.2216 0.231707 3.77838 0.505074 3.50501C0.778441 3.23165 1.22166 3.23165 1.49502 3.50501L3.50005 5.51004L8.00507 1.00501C8.27844 0.731646 8.72166 0.731646 8.99502 1.00501Z" fill="#333646"/>
                    </svg>
                    <span>{{ $t('Real price') }}</span>
                </div>
                <div v-if="isFree" class="free">
                    <div class="green-circle"></div>
                    <span>{{ $t('Free') }}</span>
                </div>
            </div>
        </div>
        <div class="rating">
            <div v-if="item.rate" class="rating-number">
                <img src="/img/i-rate.png" alt="rating">
                {{ item.rate }}
            </div>
            <a href="#" class="collapse-circle" @click.prevent="collapseCircle">
                <svg v-if="status === true" class="minus" width="12" height="2" viewBox="0 0 12 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="12" width="2" height="12" rx="1" transform="rotate(90 12 0)" fill="#DF9D3C"/>
                </svg>
                <svg v-else class="plus" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0)">
                        <rect x="12" y="5" width="2" height="12" rx="1" transform="rotate(90 12 5)" fill="#545769"/>
                        <rect x="5" width="2" height="12" rx="1" fill="#545769"/>
                    </g>
                    <defs>
                        <clipPath id="clip0">
                            <rect width="12" height="12" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </a>
        </div>
    </div>
</template>

<script>
export default {
    name: "ItemAdditional",
    props: ['item', 'status'],
    methods: {
        findOption(name) {
            if (!this.item.options) {
                return false;
            }
            return this.item.options.find( elem => elem.key === name);
        },
        getMinRoomPrice(room) {
            if (room.price) {
                return Math.floor(room.price);
            }
            return this.minRoomPrice;
        },
        addToFavorites(e) {
            e.preventDefault();

            let id = this.item.id;

            favoritesAddRemove(id);

            this.$emit('favsUpdated');
        },
        collapseCircle() {
            this.$emit('collapse')
        }
    },
    computed: {
        minRoomPrice() {
            let prices = this.item.rooms.map( elem => elem.price ).filter( elem => elem > 0);
            if (prices.length === 0) {
                return 0
            }
            return Math.floor(Math.min( ...prices ));
        },
        isRealPrice() {
            let realprice = this.findOption('realprice');
            return realprice && parseInt(realprice.value);
        },
        isFree() {
            let free = this.findOption('free');
            return free && parseInt(free.value);
        },
        isFavorite() {
            let id = this.item.id;
            let favoritesObject = JSON.parse(localStorage.getItem("favoritesList")) || [];

            return favoritesObject.includes(id);
        },

    }
}
</script>

<style scoped>

</style>
