<template>
    <form>
        <template v-for="(item, ind) in data">
            <b-form-group :label="item.label" label-for="input-phone" v-if="item.type !== 'divider'">
                <b-form-input v-if="inputTypes.indexOf(item.type) !== -1" v-model="fields[ind]" :type="item.type" :id="'input-'+ind" :placeholder="item.placeholder"></b-form-input>
                <b-form-textarea v-else-if="item.type === 'textarea'" v-model="fields[ind]" :id="'input-'+ind" placeholder="copyright"></b-form-textarea>
                <b-form-file
                    v-if="item.type === 'file'"
                    v-model="file"
                    :state="Boolean(file)"
                    placeholder="Choose a file or drop it here..."
                    drop-placeholder="Drop file here..."
                ></b-form-file>
                <b-dropdown v-if="item.type === 'select'">
                    <template v-slot:button-content>
                        Select category
                    </template>
                    <b-dropdown-item v-for="(elem, i) in fields[ind]" href="#" :value="elem.id">{{ fields[ind] }}</b-dropdown-item>
                </b-dropdown>
            </b-form-group>
            <hr v-else-if="item.type === 'divider'">
        </template>
    </form>
</template>

<script>
    export default {
        name: "Index",
        props: ['fields', 'data'],
        methods: {

        },
        computed: {
            inputTypes() {
                return ['text', 'email', 'password']
            }
        }
    }
</script>

<style scoped>

</style>
