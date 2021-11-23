<template>
    <section class="header-dashboard">
        <h1>{{ $t('Clients Feedback') }}</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin review-block">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="feedbackList" :fields="fields">
                                <template v-slot:cell(created_at)="data">
                                    {{ getDate(data.item.created_at) }}
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

        <div>
            <b-button id="show-modal" @click="showModal">Увидеть модалку</b-button>

            <b-modal hide-footer ref="feedback-modal" title="Отзывы клиентов">
                <div class="mb-5">
                    <p><strong>Name:</strong> здесь идет имя клиента </p>
                    <p><strong>Furnish:</strong> здесь будет стоять оценка </p>
                    <p><strong>Comfort:</strong> здесь будет стоять оценка </p>
                    <p><strong>Location:</strong> здесь будет стоять оценка </p>
                    <p><strong>P/Perf:</strong> здесь будет стоять оценка </p>
                    <p><strong>Cleanliness:</strong> здесь будет стоять оценка </p>
                    <p><strong>Staff:</strong> здесь будет стоять оценка </p>
                    <p><strong>Comment:</strong> здесь будет стоять оценка </p>
                </div>
                <div style="text-align: right;">
                    <b-button variant="outline-danger" @click="hideModal">Close</b-button>
                    <b-button variant="outline-primary" @click="hideModal">Ок</b-button>
                </div>
            </b-modal>
        </div>

    </section>
</template>

<script>
import ApiRequest from '../../../API/ApiRequest';

let FeedbackRequest = ApiRequest('feedback');
let feedbackData = new FeedbackRequest;

export default {
    name: "FeedbackForm",
    data() {
        return {
            loading: false,
            feedback: [],
            operationOk : false,
            operationError : false,
            textOperation: '',
            fields: [
                {
                    key: 'created_at',
                    label: this.$t('Created')
                },
                {
                    key: 'client_id',
                    label: this.$t('ClID')
                },
                {
                    key: 'name',
                    label: this.$t('Name')
                },
                {
                    key: 'furnish',
                    label: this.$t('Furnish')
                },
                {
                    key: 'comfort',
                    label: this.$t('Comfort')
                },
                {
                    key: 'location',
                    label: this.$t('Location')
                },
                {
                    key: 'price_to_perf',
                    label: this.$t('P/Perf')
                },
                {
                    key: 'cleanliness',
                    label: this.$t('Cleanliness')
                },
                {
                    key: 'cleanliness',
                    label: this.$t('Internet')
                },
                {
                    key: 'staff',
                    label: this.$t('Staff')
                },
                {
                    key: 'comment',
                    label: this.$t('Comment')
                },
            ],

            feedbackList: [],
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
    },
    mounted() {
        feedbackData.all()
            .then(resp => {
                this.feedbackList = resp.data;
            })
    },

    methods: {
        format00(num) {
            return num <= 9 ? '0' + num : num
        },
        getDate(date) {
            let dt = new Date(date.replace('T', ' ').replace(/-/g, '/'));
            let day = this.format00(dt.getDate());
            let month = this.format00(dt.getMonth() + 1);
            let year = dt.getFullYear();
            return `${year}-${month}-${day}`;
        },
        showModal() {
            this.$refs['feedback-modal'].show()
        },
        hideModal() {
            this.$refs['feedback-modal'].hide()
        }
    }
}
</script>

<style>

.table td, .table th {
    white-space: normal !important;
}

</style>
