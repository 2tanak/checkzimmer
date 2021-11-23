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
                                <template v-slot:cell(rating)="data">
                                    {{
                                        Math.floor( (data.item.furnish + data.item.comfort + data.item.location + data.item.price_to_perf +
                                            data.item.cleanliness + data.item.staff) / 6 )
                                    }}
                                </template>
                                <template v-slot:cell(info)="data")>
                                    <button @click="showModal(data.item)">Details</button>
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

            <b-modal hide-footer ref="feedback-modal" title="Отзывы клиентов">
                <div class="mb-5">
                    <p><strong>Name:</strong> {{ current.name }} </p>
                    <p><strong>Furnish:</strong> {{ current.furnish}} </p>
                    <p><strong>Comfort:</strong> {{ current.comfort }} </p>
                    <p><strong>Location:</strong> {{ current.location }} </p>
                    <p><strong>P/Perf:</strong> {{ current.price_to_perf }} </p>
                    <p><strong>Cleanliness:</strong> {{ current.cleanliness }} </p>
                    <p><strong>Staff:</strong> {{ current.staff }} </p>
                    <p><strong>Comment:</strong> {{ current.comment }} </p>
                </div>
                <div style="text-align: right;">
                    <!--<b-button variant="outline-danger" @click="hideModal">Close</b-button>-->
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
            current: {
                name: '1',
                furnish: '2',
                comfort: '3',
                location: '3',
                price_to_perf: '4',
                cleanliness: '3',
                staff: '5',
                comment: '123',

            },
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
                    key: 'rating',
                    label: this.$t('Rating')
                },
                {
                    key: 'info',
                    label: this.$t('Info')
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
        showModal(data) {
            this.current = data;
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
