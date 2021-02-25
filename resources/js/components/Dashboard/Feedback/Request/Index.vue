<template>

    <section class="header-dashboard">
        <h1>{{ $t('Customer inquiries') }}</h1>

        <div class="row mt-4">

            <div class="col-md-12 grid-margin sorting-block">
                <div class="card">
                    <div class="card-body">
                        <b-form-group :label="$t('Sorting')">
                            <b-select v-model="sortingSelected" :options="sortingOptions"></b-select>
                        </b-form-group>
                    </div>
                </div>
            </div>

            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <b-form-group>
                            <b-table striped hover responsive :busy="loading" :items="requestList" :fields="requestFields">
                                <template v-slot:cell(created_at)="data">
                                    {{ data.item.created_at }}
                                </template>
                                <template v-slot:cell(company)="data">
                                    {{ data.item.company }}
                                </template>
                                <template v-slot:cell(name)="data">
                                    {{ data.item.name }}
                                </template>
                                <template v-slot:cell(email)="data">
                                    {{ data.item.email }}
                                </template>
                                <template v-slot:cell(phone)="data">
                                    {{ data.item.phone }}
                                </template>
                                <template v-slot:cell(arrival_date)="data">
                                    {{ data.item.arrival_date }}
                                </template>
                                <template v-slot:cell(date_departure)="data">
                                    {{ data.item.date_departure }}
                                </template>
                                <template v-slot:cell(number_persons)="data">
                                    {{ data.item.number_persons }}
                                </template>
                                <template v-slot:cell(housing_type)="data">
                                    {{ data.item.housing_type }}
                                </template>
                                <template v-slot:cell(message)="data">
                                    <b-button variant="success" @click='$bvModal.show("reviewsModal")'>{{ $t('Read message') }}</b-button>
                                </template>
                                <template v-slot:cell(status)="data">
                                        <b-select v-model="statusSelected" :options="statusOptions"></b-select>
                                </template>
                                <template v-slot:cell(delete)="data">
                                    <a style="text-decoration:none;" href="" @click='$bvModal.show("requestDelete")' @click.prevent="frequestDelete()"><span style="font-size:22px;">&times;</span></a>
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

        <b-modal id="reviewsModal" :title="$t('Request message')" @ok="messageOk">
            <textarea name="request-message" id="request-message" cols="55" rows="10"></textarea>
        </b-modal>

        <b-modal id="requestDelete" :title="$t('Request Delete')" @ok="deleteOk">
            <strong>A you sure you want to delete request?</strong>
        </b-modal>

    </section>

</template>

<script>
export default {
name: "Index",
    data() {
        return {
            loading: false,
            sortingSelected: 'a',
            statusSelected: 'a',
            sortingOptions: [
                { value: 'a', text: this.$t('All') },
                { value: 'b', text: this.$t('Executed') },
                { value: 'c', text: this.$t('Completed') }
            ],
            statusOptions: [
                { value: 'a', text: this.$t('Choice') },
                { value: 'b', text: this.$t('Processing') },
                { value: 'c', text: this.$t('Completed') }
            ],
            requestFields: [this.$t('created_at'), this.$t('company'), this.$t('Name'), this.$t('email'), this.$t('phone'), this.$t('arrival_date'), this.$t('date_departure'), this.$t('number_persons'), this.$t('housing_type'), this.$t('message'), this.$t('status'), this.$t('Delete')],
            requestList: [
                { created_at: '01', company: 'Test company', name: 'Max', email: 'test@email.com', phone: '+79996669966', arrival_date: '01.01.2012', date_departure: '01.02.2021', number_persons: '5', housing_type: 'hostel' }
            ]
        }
    }
}
</script>

<style scoped>

</style>
