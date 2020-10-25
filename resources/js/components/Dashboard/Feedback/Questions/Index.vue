<template>
    <section class="header-dashboard">
        <h1>Вопросы клиентов</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover responsive :busy="loading" :items="questionItems" :fields="fields">
                            <template v-slot:cell(created_at)="data">
                                {{ data.item.created_at }}
                            </template>
                            <template v-slot:cell(question)="data">
                                {{ data.item.question }}
                            </template>
                            <template v-slot:cell(response)="data">
                                {{ data.item.response }}
                            </template>
                            <template v-slot:cell(answer)="data">
                                <b-button v-b-modal.modalQuestion variant="success" @click="answerModal(data.item)" v-if="data.item.response === ''">Ответить</b-button>
                                <b-button v-b-modal.modalQuestion variant="outline-primary" @click="answerModal(data.item)" v-else>Редактировать</b-button>
                            </template>
                            <template v-slot:cell(delete)="data">
                                <b-button v-b-modal.modalQuestionDelete variant="danger" @click="answerModalDelete(data.item)">Удалить</b-button>
                            </template>
                            <template v-slot:table-busy>
                                <div class="text-center text-danger my-2">
                                    <b-spinner class="align-middle"></b-spinner>
                                    <strong>Loading...</strong>
                                </div>
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>

        <b-modal id="modalQuestion" @ok="answerOk" @cancel="answerCancel" @hidden="answerHidden" title="Answer to the question">
            <div><span><strong>Data:</strong></span> {{ answerObject.created_at }}  </div>
            <div><span><strong>Question:</strong></span> {{ answerObject.question }}  </div>
            <div>
                <div class="mb-2 mt-3"><strong>Your answer:</strong></div>
                <div>
                    <b-form-textarea id="textareaAnswer" v-model="answerObject.response" placeholder="Enter your answer" rows="10"></b-form-textarea>
                </div>
            </div>
        </b-modal>

        <b-modal id="modalQuestionDelete" @ok="answerDelete" title="Delete question">
            <p class="mb-3">Are you sure you want to delete?</p>
            <div><span><strong>Data:</strong></span> {{ answerObject.created_at }}  </div>
            <div><span><strong>Question:</strong></span> {{ answerObject.question }}  </div>
        </b-modal>

    </section>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            textareaAnswer: '',
            modalApproove: false,
            fields: ['created_at', 'question', 'response', 'answer', 'delete'],
            questionItems: [
                { id: 1, status: 'waiting', created_at: '01.01.2020', question: 'Текст вопроса', response: '' },
                { id: 2, status: 'waiting', created_at: '02.02.2020', question: 'Текст вопроса 2', response: '' },
                { id: 3, status: 'answered', created_at: '03.03.2020', question: 'Текст вопроса 3', response: '' }
            ],
            answer: true,
            loading: false,
            answerObject: {
                id: 0,
                status: '',
                created_at: '',
                question: '',
                response: ''
            }
        }
    },
    mounted() {
    },
    methods: {
        answerModal(item) {
            this.answerObject = item;
        },
        answerModalDelete(item) {
            this.answerObject = item;
        },
        answerOk() {
            this.modalApproove = true;
        },
        answerCancel() {
            this.modalApproove = false;
        },
        answerDelete() {
            let index = this.questionItems.findIndex( (elem, index, arr) => elem.id === this.answerObject.id);
            this.questionItems.splice(index, 1);
        },
        answerHidden() {
            if (this.modalApproove === false) {
                this.answerObject.response = '';
            }
        }
    }
}
</script>

<style>

.table td, .table th {
    white-space: normal !important;
}

</style>
