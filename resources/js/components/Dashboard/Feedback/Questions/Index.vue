<template>
    <section class="header-dashboard">
        <h1>Вопросы клиентов</h1>
        <div class="row mt-4">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-table striped hover :items="items" :fields="fields">
                            <template v-slot:cell(created_at)="data">
                                01.01.2020
                            </template>
                            <template v-slot:cell(question)="data">
                                Текст вопроса
                            </template>
                            <template v-slot:cell(response)="data">
                                {{ answerText }}
                            </template>
                            <template v-slot:cell(answer)="data">
                                <b-button v-b-modal.modal-question variant="success" v-if="answer">Ответить</b-button>
                                <b-button v-b-modal.modal-question variant="outline-primary" v-if="edit">Редактировать</b-button>
                            </template>
                        </b-table>
                    </div>
                </div>
            </div>
        </div>
        <b-modal id="modal-question">
            <template>
                <b-form-textarea id="textarea-answer" v-model="answerText" placeholder="Enter answer"></b-form-textarea>
            </template>
        </b-modal>
    </section>
</template>

<script>
export default {
name: "Index",
    data() {
        return {
            answerText: '',
            fields: ['created_at', 'question', 'response', 'answer'],
            items: [
                { created_at: '01.01.2020', question: 'Текст вопроса', response: 'Текст ответа' }
            ],
            answer: true,
            edit: false
        }
    },
    mounted() {
    },
    methods: {

    }
}
</script>

<style scoped>

</style>
