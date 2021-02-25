<template>
    <div class="object-description object-description-desctope" id="object-description">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#description">{{ $t('Description object') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#reviews">{{ $t('Reviews') }} <span>{{ reviews ? reviews.length : 0 }}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#questions">{{ $t('Questions') }} <span>{{ questions ? questions.length : 0 }}</span></a>
            </li>
            <li class="nav-item map-active">
                <a class="nav-link" data-toggle="tab" href="#map-block">{{ $t('Map') }}</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="description-content tab-pane fade show active" id="description">
                {{ description }}
                <div v-if="false" class="collapse collapse-content" id="description-collapse">
                    Absolutely brand new, amazing studio unit (part of 3 unit complex) located in prime central Leipzig,
                    one block from Ristrasse Street. Surrounded by embassies, restaurants, cafes this makes for amazing
                    location. The apartment is totally equipped with everything including king sized bed, LCD TV with Smart TV,
                    fully equipped kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much
                    more. Perfect place for your next stay in Leipzig! Absolutely brand new, amazing studio unit
                    (part of 3 unit complex) located in prime central Leipzig, one block from Ristrasse Street.
                    Surrounded by embassies, restaurants, cafes this makes for amazing location. The apartment is
                    totally equipped with everything including king sized bed, LCD TV with Smart TV, fully equipped
                    kitchen, balcony, Air Conditioner, High Speed Wi Fi, washing machine, shower cabin and much more.
                    Perfect place for your next stay in Leipzig!
                </div>
                <a v-if="false" class="more-details" data-toggle="collapse" href="#description-collapse" role="button" aria-expanded="false" aria-controls="description-collapse">
                    {{ $t('More details') }}
                    <img src="/svg/i-arrow-show-more.svg" alt="alt">
                </a>
            </div>
            <div class="tab-pane fade reviews-content" id="reviews">
                <div class="top-block">
                    <div class="top-block-head">
                        <a class="give-feedback" href="#">{{ $t('Give feedback') }}</a>
                    </div>
                    <div class="empty-block">
                        <div class="reviews-form">
                            <div class="close-form">
                                <img src="/svg/i-close-popup.svg" alt="alt">
                            </div>
                            <div class="rate">
                                <div class="title">{{ $t('Rate the object') }}:</div>
                                <div class="stars">
                                    <img src="/svg/star-gray.svg" alt="alt">
                                    <img src="/svg/star-gray.svg" alt="alt">
                                    <img src="/svg/star-gray.svg" alt="alt">
                                    <img src="/svg/star-gray.svg" alt="alt">
                                    <img src="/svg/star-gray.svg" alt="alt">
                                </div>
                            </div>
                            <form @submit.prevent="addReviews">
                                <div class="top-form">
                                    <input type="text" v-model="reviewsForm.name" :placeholder="$t('Your name')">
                                    <input type="text" v-model="reviewsForm.company" :placeholder="$t('Company name')">
                                    <input type="hidden" name="rating" value="0">
                                    <input type="hidden" name="grecaptcha" value="">
                                </div>
                                <input type="text" v-model="reviewsForm.title" :placeholder="$t('Review title')">
                                <textarea v-model="reviewsForm.description" :placeholder="$t('Review text')"></textarea>
                                <input type="submit" :value="$t('Send')">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="reviews-block">
                    <!--@foreach ($reviews as $key => $review)-->
                    <div v-for="review in reviews" class="reviews-block-item">
                        <div class="reviews-head">
                            <img class="avatar" src="/svg/avatar.svg" alt="avatar">
                            <div class="customer-data">
                                <div class="name">{{ review.name }}</div>
                                <div class="entity">{{ review.company }}</div>
                            </div>
                        </div>
                        <div class="set-rating">
                            <div class="stars-item">
                                <div class="stars-block">
                                    <svg v-for="i in review.rating" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#F5C61C"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                    <svg v-for="i in 5 - review.rating" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0)">
                                            <path d="M6.00032 9.77196L2.73023 11.952C2.52474 12.089 2.25398 11.9184 2.2889 11.6739L2.84013 7.8153L0.0840011 5.05917C-0.0824812 4.89269 0.0125503 4.6076 0.245625 4.5743L4.08667 4.02558L5.7377 0.173166C5.83666 -0.057722 6.16398 -0.057722 6.26293 0.173166L7.91396 4.02558L11.755 4.5743C11.9881 4.6076 12.0831 4.89269 11.9166 5.05917L9.16051 7.8153L9.71173 11.6739C9.74666 11.9184 9.47589 12.089 9.2704 11.952L6.00032 9.77196Z" fill="#CBCDD1"/>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0">
                                                <rect width="12" height="12" fill="white"/>
                                            </clipPath>
                                        </defs>
                                    </svg>

                                </div>
                                <span>{{ review.rating }}</span>
                            </div>
                            <div class="title">{{ review.title }}</div>
                        </div>
                        <div class="reviews-text">
                            {{ review.description }}
                        </div>
                        <a class="full" href="#">
                            {{ $t('Read completely') }} <img src="/svg/i-arrow-show-more.svg" alt="alt">
                        </a>
                    </div>
                </div>
                <div class="pagination-block">
                    <ul class="pagination-list" v-if="reviewsPages > 1">
                        <li class="prev">
                            <a href="" @click.prevent="pagePrev">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.4227 1.57613C9.65702 1.81044 9.65702 2.19034 9.4227 2.42465L4.84697 7.00039L9.4227 11.5761C9.65702 11.8104 9.65702 12.1903 9.4227 12.4247C9.18839 12.659 8.80849 12.659 8.57417 12.4247L3.57417 7.42465C3.33986 7.19034 3.33986 6.81044 3.57417 6.57613L8.57417 1.57613C8.80849 1.34181 9.18839 1.34181 9.4227 1.57613Z" fill="#3B8B3E"/>
                                </svg>
                            </a>
                        </li>
                        <li class="number-page" v-for="i in reviewsPages">
                            <a :class="{'active': i === reviewsCurrent}" href="#" @click.prevent="pageChange(i)">{{ i }}</a>
                        </li>
                        <li class="next" @click.prevent="pageNext">
                            <a href="">
                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5773 1.57613C4.34298 1.81044 4.34298 2.19034 4.5773 2.42465L9.15303 7.00039L4.5773 11.5761C4.34298 11.8104 4.34298 12.1903 4.5773 12.4247C4.81161 12.659 5.19151 12.659 5.42583 12.4247L10.4258 7.42465C10.6601 7.19034 10.6601 6.81044 10.4258 6.57613L5.42583 1.57613C5.19151 1.34181 4.81161 1.34181 4.5773 1.57613Z" fill="#3B8B3E"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade questions-content" id="questions">
                <form class="questions-form" @submit.prevent="addQuestion">
                    <input type="text" v-model="questionsForm.text" :placeholder="$t('Ask your question')" name="question">
                    <input type="submit" :value="$t('Send')">
                </form>
                <div class="questions-received">
                    <div v-for="question in questions" class="questions-block">
                        <div class="questions" data-toggle="collapse" :data-target="'#questions-' + question.id" aria-expanded="false" :aria-controls="'questions-' + question.id">
                            <div class="collapse-button"></div>
                            {{ question.question }}
                        </div>
                        <div class="collapse " :id="'questions-'+question.id">
                            <div class="answer">
                                {{ question.response }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade map-content" id="map-block">
                <div id="map"></div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Single",
    data() {
        return {
            description: '',
            reviewsForm: [],
            questionsForm: [],
            questions: [],
            reviews: [],
            reviewsPages: 1,
            reviewsCurrent: 1
        }
    },
    mounted() {
        axios.get('/questions?page=1')
        .then(resp => {
            this.questions = resp.data.data;
        })
        axios.get('/reviews?page=1')
            .then(resp => {
                this.reviews = resp.data.data;
                this.reviews_page = resp.data.last_page;
            })
        this.description = jQuery('.description-content').text();
        this.initMap();
        this.initGrecaptcha();
    },
    methods: {
        addQuestion() {
            let reviewFormData = {
                    'question' : this.questionsForm.text,
                    'property_id' : window.hotel.id,
                };
            axios.post('/question/create',reviewFormData)
                .then(resp => {

                }).catch(error => {

                });
        },
        addReviews() {
            let captcha = document.querySelectorAll('.reviews-form input[name="grecaptcha"]')[0].value,
                rating = document.querySelectorAll('.reviews-form input[name="rating"]')[0].value,
                reviewFormData = {
                    'name' : this.reviewsForm.name,
                    'company' : this.reviewsForm.company,
                    'property_id' : window.hotel.id,
                    'rating': rating,
                    'title': this.reviewsForm.title,
                    'description': this.reviewsForm.description,
                    'grecaptcha': captcha,
                };
            axios.post('/reviews/create',reviewFormData)
                .then(resp => {

                }).catch(error => {

                });
        },
        initGrecaptcha() {
            if (typeof grecaptcha === 'undefined') {
                setTimeout( () => { this.initGrecaptcha() }, 100 );
                return;
            }
            grecaptcha.ready(function() {
                grecaptcha.execute('6LejY9AZAAAAAFpdc0QzQzrqRtaaflf3PfP64qdE', {action: 'submit'}).then(function(token) {
                    let elements = document.querySelectorAll('[name="grecaptcha"]');
                    elements.forEach( el => el.value = token);
                });
            });
        },
        initMap() {
            if (typeof google === 'undefined' || !document.getElementById('map')) {
                setTimeout( () => { this.initMap() }, 100 );
                return;
            }

            let mapCanvas = document.getElementById("map");

            let myCenter = new google.maps.LatLng(window.myCenter.lat, window.myCenter.lng);
            let myTrip = window.myTrip;

            let mapOptions = {
                center: myCenter,
                zoom: 10,
                disableDefaultUI: true,
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.DEFAULT,
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
                mapTypeId: google.maps.MapTypeId.DESCTOPE
            };
            let images = '/img/point-img.png';
            let marker = new google.maps.Marker ({
                position: myCenter,
                map: mapCanvas,
                icon: images
            });
            let map = new google.maps.Map(mapCanvas ,mapOptions);

            var contentString = '<div id="content">'+
                '<span class="index"><strong>&euro;' + window.hotel_price + '</strong></span>'+
                '<span>&nbsp;</span>'+
                '<span class="town"></span>'+
                '</div>';
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            infowindow.open(map, marker);

            var flightPath = new google.maps.Polygon({
                path: myTrip,
                strokeColor: "#6bb638",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "rgb(117, 242, 122)",
                fillOpacity: 0.2
            });

            marker.setMap(map);

            flightPath.setMap(map);
        },
        reviewsLoad() {
            axios.get('/reviews?page='+this.reviewsCurrent)
                .then(resp => {
                    this.reviews = resp.data.data;
                    this.reviews_page = resp.data.last_page;
                })
        },
        pagePrev() {
            if (this.reviewsCurrent > 1) {
                this.reviewsCurrent--;
                this.reviewsLoad();
            }
        },
        pageNext() {
            if (this.reviewsCurrent < this.reviewsPages) {
                this.reviewsCurrent++;
                this.reviewsLoad();
            }
        },
        pageChange(page) {
            this.reviewsCurrent = page;
            this.reviewsLoad();
        }
    }
}
</script>

<style scoped>

</style>
