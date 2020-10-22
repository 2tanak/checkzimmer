<template>
    <section class="header-dashboard">
        <h1>Отзывы клиентов</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin sorting-block">
                <div class="card">
                    <div class="card-body">
                        <b-form-group label="Сортировка">
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
                                <template v-slot:cell(rating)="data">
                                    <div class="d-flex align-items-center">
                                        <img src="/svg/star-yellow.svg" v-for="star in data.item.rating">
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
                                <template v-slot:cell(review)="data">
                                    {{ data.item.review }}
                                </template>
                                <template v-slot:cell(publish)="data">
                                    <b-button variant="success" v-b-modal.reviewsModal @click="showReviews(data.item)" v-if=" data.item.status === 'waiting' ">Опубликовать</b-button>
                                    <b-button variant="outline-primary" v-b-modal.withdrawReviewModal @click="withdrawReview(data.item)" v-else>Отозвать</b-button>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <b-button variant="danger" v-b-modal.deleteReviewModal @click='deleteReview(data.item)'>Удалить</b-button>
                                </template>
                                <template v-slot:table-busy>
                                    <div class="text-center text-danger my-2">
                                        <b-spinner class="align-middle"></b-spinner>
                                        <strong>Loading...</strong>
                                    </div>
                                </template>
                            </b-table>
                        </b-form-group>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="reviewsModal" title="Want to publish?" @ok="handleOk">
            <div><span class="mr-2"><strong>Created At:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>Rating:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>Name:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>Company:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>Title:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>Text review:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

        <b-modal id="deleteReviewModal" title="Delete review" @ok="handleDeleteReview">
            <p class="mb-3">A you sure you want to delete review?</p>
            <div><span class="mr-2"><strong>Created At:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>Rating:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>Name:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>Company:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>Title:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>Text review:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

        <b-modal id="withdrawReviewModal" title="Withdraw review" @ok="handleWithdrawReview()">
            <p class="mb-3">A you sure you want to withdraw review?</p>
            <div><span class="mr-2"><strong>Created At:</strong></span> {{ activeReview.created_at }}</div>
            <div><span class="mr-2"><strong>Rating:</strong></span> <img src="/svg/star-yellow.svg" v-for="star in activeReview.rating"></div>
            <div><span class="mr-2"><strong>Name:</strong></span> {{ activeReview.name }}</div>
            <div><span class="mr-2"><strong>Company:</strong></span> {{ activeReview.company }}</div>
            <div><span class="mr-2"><strong>Title:</strong></span> {{ activeReview.title }}</div>
            <div><span class="mr-2"><strong>Text review:</strong></span> {{ activeReview.review }}</div>
        </b-modal>

    </section>
</template>

<script>

export default {
    name: "Index",
    data() {
        return {
            loading: false,
            selected: 'a',
            options: [
                { value: 'a', text: 'Все' },
                { value: 'b', text: 'Опубликованные' },
                { value: 'c', text: 'Не опубликованные' }
            ],
            reviews: [],
            fields: ['created_at', 'rating', 'name', 'company', 'title', 'review', 'publish', 'delete'],
            reviewList: [
                { id: 1, status: 'published', created_at: '01.01.2020', rating: 1 , name: 'Иван', company: 'Билайн', title: 'Заголовок', review: 'Текст отзыва' },
                { id: 2, status: 'published', created_at: '02.02.2020', rating: 2, name: 'Сергей', company: 'МТС', title: 'Заголовок2', review: 'Текст отзыва 2' },
                { id: 3, status: 'waiting', created_at: '03.03.2020', rating: 3,  name: 'Дмитрий', company: 'Йота', title: 'Заголовок3', review: 'Текст отзыва 3' }
            ],
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
    },
    methods: {
        deleteReview(item) {
            this.activeReview = item;
        },
        showReviews(item) {
            this.activeReview = item;
        },
        withdrawReview(item) {
            this.activeReview = item;
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
