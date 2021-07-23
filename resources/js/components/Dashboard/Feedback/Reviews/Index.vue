<template>
    <section class="header-dashboard">
        <h1>{{ $t('Customer Reviews') }}</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin sorting-block">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Sorting')">
                            <b-select v-model="selected" :options="options"></b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin review-block">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="reviewList" :fields="fields">
                                <template v-slot:cell(created_at)="data">
                                    {{ data.item.created_at }}
                                </template>
                                <template v-slot:cell(raiting)="data">
                                    <div class="d-flex align-items-center">
                                        <img src="/svg/star-yellow.svg" v-for="star in data.item.raiting">
                                    </div>
                                </template>
                                <template v-slot:cell(name)="data">
                                    {{ data.item.name }}
                                </template>
                                <template v-slot:cell(company)="data">
                                    {{ data.item.company }}
                                </template>
                                <template v-slot:cell(title)="data">
                                    {{ data.item.title }}
                                </template>
                                <template v-slot:cell(description)="data">
                                    {{ data.item.description }}
                                </template>
                                <template v-slot:cell(publish)="data">
                                    <b-button variant="success" @click="showReviews(data.item, 1)" v-if=" data.item.status === 2 ">
                                        {{ $t('Post') }}</b-button>
                                    <b-button variant="outline-primary" @click="withdrawReview(data.item, 2)" v-else>
                                        {{ $t('Revoke') }}</b-button>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <b-button variant="danger" @click='deleteReview(data.item)'>{{ $t('Delete') }}</b-button>
                                </template>
                                <template v-slot:table-busy>
                                    <div class="text-center text-danger my-2">
                                        <b-spinner class="align-middle"></b-spinner>
                                        <strong>{{ $t('Loading') }}...</strong>
                                    </div>
                                </template>
                            </b-table>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="reviewsModal" :title="$t('Want to publish')" @ok="handleOk">
            <div><span class="mr-2"><strong>{{ $t('Created At') }}:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>{{ $t('Rating') }}:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>{{ $t('Name') }}:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>{{ $t('Company') }}:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>{{ $t('Title') }}:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>{{ $t('Text review') }}:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

        <b-modal id="deleteReviewModal" :title="$t('Delete review')" @ok="handleDeleteReview">
            <p class="mb-3">{{ $t('A you sure you want to delete review') }}?</p>
            <div><span class="mr-2"><strong>{{ $t('Created At') }}:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>{{ $t('Rating') }}:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>{{ $t('Name') }}:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>{{ $t('Company') }}:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>{{ $t('Title') }}:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>{{ $t('Text review') }}:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

        <b-modal id="withdrawReviewModal" :title="$t('Withdraw review')" @ok="handleWithdrawReview()">
            <p class="mb-3">{{ $t('A you sure you want to withdraw review') }}?</p>
            <div><span class="mr-2"><strong>{{ $t('Created At') }}:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>{{ $t('Rating') }}:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>{{ $t('Name') }}:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>{{ $t('Company') }}:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>{{ $t('Title') }}:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>{{ $t('Text review') }}:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

        <div class="row mt-5">
            <div class="col-md-12">

                <b-alert dismissible v-model="operationOk" variant="success">
                    {{ textOperation}}
                </b-alert>
                <b-alert dismissible v-model="operationError" variant="danger">
                    {{ textOperation}}
                </b-alert>
            </div>
        </div>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';
// import Forms from '../../../Forms';

let ReviewsRequest = ApiRequest('reviews');
let reviewsData = new ReviewsRequest;

export default {
    name: "Index",
    data() {
        return {
            loading: false,
            selected: 'a',
            options: [
                { value: 'a', text: this.$t('All') },
                { value: 'b', text: this.$t('Published') },
                { value: 'c', text: this.$t('Unpublished') }
            ],
            reviews: [],
            operationOk : false,
            operationError : false,
            textOperation: '',
            fields: [this.$t('created_at'), this.$t('raiting'), this.$t('name'), this.$t('company'), this.$t('title'), this.$t('description'), this.$t('publish'), this.$t('delete')],
            reviewList: [],
            activeReview: {
                id: 0,
                status: '',
                created_at: '',
                rating: '',
                name: '',
                company: '',
                title: '',
                review: ''
            }
        }
    },
    created() {
        reviewsData.all()
            .then(resp => {
                this.reviewList = resp.data.data;
            })
    },
    mounted() {
    },

    methods: {
        deleteReview(item) {
            reviewsData.delete(item.id)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('Delete');
                        this.operationOk = true;
                        let index = this.reviewList.findIndex( (elem, index, arr) => elem.id === item.id);
                        this.reviewList.splice(index, 1);
                    } else {
                        this.textOperation = this.$t('Delete error');
                        this.operationError = true;
                    }
            });
        },
        showReviews(item) {
             let data = {'status' : status};
            reviewsData.update(item.id, data)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('published');
                        this.operationOk = true;
                    } else {
                        this.textOperation = this.$t('Error');
                        this.operationError = true;
                    }
            });
        },
        withdrawReview(item, status) {
            let data = {'status' : status};
            reviewsData.update(item.id, data)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = this.$t('Withdrawn');
                        this.operationOk = true;
                    } else {
                        this.textOperation = this.$t('Error');
                        this.operationError = true;
                    }
            });
        },
        handleOk() {
            let index = this.reviewList.find( (elem, index, arr) => elem.id === this.activeReview.id);
            index.status = 'published';
        },
        handleDeleteReview() {
            let index = this.reviewList.findIndex( (elem, index, arr) => elem.id === this.activeReview.id);
            this.reviewList.splice(index, 1);
        },
        handleWithdrawReview() {
            let index = this.reviewList.find( (elem, index, arr) => elem.id === this.activeReview.id);
            index.status = 'waiting';
        }
    }
}
</script>

<style>

.table td, .table th {
    white-space: normal !important;
}

</style>
