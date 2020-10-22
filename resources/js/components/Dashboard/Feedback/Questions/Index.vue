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
import Forms from '../../../Forms';

let QuestionsRequest = ApiRequest('questions');
let questionsData = new QuestionsRequest;

export default {
    name: "Index",
    data() {
        return {
            textareaAnswer: '',
            modalApproove: false,
            fields: ['created_at', 'question', 'response', 'answer', 'delete'],
            questionItems: [],
            answer: true,
            loading: false,
            operationOk : false,
            operationError : false,
            textOperation: '',
            answerObject: {
                id: 0,
                status: '',
                created_at: '',
                question: '',
                response: ''
            }
        }
    },
    created() {
        questionsData.all()
            .then(resp => {
                this.questionItems = resp.data;
            })
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

            let data = {'answer' : this.answerObject.response};
            questionsData.update(this.answerObject.id, data)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = 'Ответ добавлен';
                        this.operationOk = true;
                    } else {
                        this.textOperation = 'Ошибка';
                        this.operationError = true;
                    } 
            });
        },
        answerCancel() {
            this.modalApproove = false;
        },
        answerDelete() {
            questionsData.delete(this.answerObject.id)
                .then(response => {
                    if(response.data.code == 'ok') {
                        this.textOperation = 'удален';
                        this.operationOk = true;
                        let index = this.questionItems.findIndex( (elem, index, arr) => elem.id === this.answerObject.id);
                        this.questionItems.splice(index, 1);
                    } else {
                        this.textOperation = 'Ошибка удаления';
                        this.operationError = true;
                    } 
            });
        },
        answerHidden() {
            if (this.modalApproove === false) {
                this.answerObject.response = '';
            }
        }
    }
}
</script>

<style scoped>

</style>
