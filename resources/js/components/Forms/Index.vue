<template>
    <form>
        <template v-for="(item, ind) in data">
            <b-form-group :label="item.label" label-for="input-phone"
                          v-if="['divider', 'hidden'].indexOf(item.type) === -1">
                <b-form-input v-if="inputTypes.indexOf(item.type) !== -1" v-model="fields[ind]" :type="item.type" :id="'input-'+ind" :placeholder="item.placeholder"></b-form-input>
                <b-form-textarea v-else-if="item.type === 'textarea'" v-model="fields[ind]" :id="'input-'+ind" placeholder="copyright"></b-form-textarea>
                <b-form-file
                    v-if="item.type === 'file'"
                    v-model="fileObj"
                    :state="Boolean(fields[ind])"
                    placeholder="Choose a file or drop it here..."
                    drop-placeholder="Drop file here..."
                ></b-form-file>
                <b-select v-if="item.type === 'select'" v-model="fields[ind]">
                    <b-select-option v-for="(elem, i) in item.options" :value="i" :key="'item-'+i">{{ elem }}</b-select-option>
                </b-select>
            </b-form-group>
            <hr v-else-if="item.type === 'divider'">
            <input v-else-if="item.type === 'hidden'" type="hidden" :id="'input-'+ind" v-model="fields[ind]" />
        </template>
    </form>
</template>

<script>
    export default {
        name: "Index",
        props: ['fields', 'data'],
        data() {
            return {
                fileObj: null,
            }
        },
        methods: {

        },
        computed: {
            inputTypes() {
                return ['text', 'email', 'password']
            }
        },
    }
</script>

<style scoped>

</style>
