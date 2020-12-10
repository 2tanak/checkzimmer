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
                    v-on:change="onFileChanged"
                    :state="Boolean(fields[ind])"
                    placeholder="Choose a file or drop it here..."
                    drop-placeholder="Drop file here..."
                ></b-form-file>
                <div class="d-flex align-items-center" style="position:relative;" v-if="item.type === 'picture'" v-model="fileObj">
                    <input type="file" id="add-photo" class="input-picture">
                    <label for="add-photo">Choose a file or drop it here...</label>
                    <div class="preview">
                        <img src="/svg/i-fireplace.svg" alt="">
                    </div>
                </div>
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
                selectedFile: null
            }
        },
        methods: {

        onFileChanged (event) {
            let that = this;
            this.selectedFile = event.target.files[0];
            
            const formData = new FormData();
            formData.append('image', this.selectedFile, this.selectedFile.name);

            axios({
              method: 'post',
              url: '/image-upload',
              data: formData
            }).then(function (response) {
                that.fields.picture = response;
            });
        },

        },
        computed: {
            inputTypes() {
                return ['text', 'email', 'password', 'number']
            }
        },
    }
</script>

<style scoped>

.input-picture {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
.input-picture + label {
    width: 100%;
    margin-bottom: 0;
    cursor: pointer;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    height: calc(1.6em + 0.75rem + 2px);
    display: flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    background: #fff;
}
.input-picture + label:focus,
.input-picture + label:active {
    border-color: #a1cbef;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
}
.preview {
    height: calc(1.6em + 0.60rem);
    padding: 0.375rem 0.75rem;
    background-color: #fff;
    border-radius: 0 0.25rem 0.25rem 0;
    border-left: 1px solid #ced4da;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 75px;
    position: absolute;
    top: 1px;
    right: 1px;
    z-index: 10;
}

</style>
