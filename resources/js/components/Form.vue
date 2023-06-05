<template>
    <div class="col-12">
        <input v-if="form.handler.id" type="hidden" class="form-control" name="handler[id]" v-model="form.handler.id">
        <label for="handler-type" class="form-label">Handler type</label>
        <select class="form-control"
                id="handler-type"
                name="handler[type]"
                v-model="form.handler.type"
                required>
            <option value="email">Email</option>
            <option value="redirect">Redirect</option>
        </select>
    </div>
    <div class="col-12">
        <label for="handler-payload"
               class="form-label">{{ form.handler.type === 'email' ? 'Email (Emails)' : 'Url' }}</label>
        <input
            type="text"
            class="form-control"
            id="handler-payload"
            name="handler[payload]"
            v-model="form.handler.payload"
            required>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Label</th>
                <th scope="col">Name</th>
                <th scope="col">Selector</th>
                <th scope="col">Selector type</th>
                <th scope="col">Default value</th>
                <th scope="col">Required</th>
                <th scope="col">Params</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(field, index) in form.fields" :key="field.id">
                <input type="hidden" :name="'fields['+field.id+'][id]'"
                       :value="field.id"/>
                <th scope="row">{{ field.id > 0 ? field.id : '' }}</th>
                <td>
                    <input type="text" class="form-control" :name="'fields['+field.id+'][label]'" v-model="field.label"
                           required/>
                </td>
                <td>
                    <input type="text" class="form-control" :name="'fields['+field.id+'][name]'" v-model="field.name"
                           required/>
                </td>
                <td>
                    <select
                        @change="addParams(index)"
                        class="form-control"
                        :name="'fields[' + field.id + '][selector]'"
                        v-model="field.selector"
                        required>
                        <option value="input">Input</option>
                        <option value="textarea">Textarea</option>
                        <option value="select">Select</option>
                        <option value="checkbox">Checkbox</option>
                    </select>
                </td>
                <td>
                    <select
                        @change="addParams(index)"
                        v-if="field.selector === 'input'"
                        class="form-control"
                        :name="'fields[' + field.id + '][selector_type]'"
                        v-model="field.selector_type"
                        required>
                        <option value="text">Text</option>
                        <option value="number">Number</option>
                        <option value="range">Range</option>
                        <option value="date">Date</option>
                        <option value="time">Time</option>
                    </select>
                </td>
                <td>
                    <input type="text" class="form-control" :name="'fields['+field.id+'][default_value]'"
                           v-model="field.default_value"/>
                </td>
                <td>
                    <select class="form-control" :name="'fields[' + field.id + '][required]'" v-model="field.required">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </td>
                <td>
                    <div v-if="field.selector === 'select'">
                        <input type="hidden" class="form-control"
                               :name="'fields['+field.id+'][params]'"
                               v-model="field.json_params"/>
                        <button class="btn btn-primary"
                                @click.prevent="showModal[index] = true">Edit
                        </button>
                        <select-modal
                            v-if="showModal[index]"
                            :fieldIndex="index"
                            :field="field"
                            @close="showModal[index] = false; updateParams(index)"
                            @addParam="addParam"
                            @removeParam="removeParam"/>
                    </div>
                </td>
                <td>
                    <button class="btn btn-primary" @click.prevent="remove(index)">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" @click.prevent="add()">Add field</button>
    </div>
    <div class="col-12 mt-3">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</template>

<script>
import SelectModal from './SelectModal.vue'

export default {
    components: {
        SelectModal
    },
    data() {
        return {
            form: {
                name: "",
                submit_text: "",
                fields: [],
                handler: {}
            },
            id: -1,
            showModal: [],
        }
    },
    created() {
        this.loadData()
    },
    methods: {
        loadData() {
            const data = document.getElementById('form').getAttribute('data-form');
            if (data) {
                this.form = JSON.parse(data)
                this.form.fields.forEach((field) => {
                    field.json_params = JSON.stringify(field.params ?? {});
                });
            }
        },
        add() {
            this.form.fields.push({
                id: this.id,
                label: "",
                name: "",
                selector: "",
                selector_type: "",
                default_value: null,
                required: 0,
                params: {},
            });
            this.id--;
        },
        remove(index) {
            this.form.fields.splice(index, 1);
        },
        addParams(index) {
            if (this.form.fields[index].selector === 'select') {
                this.form.fields[index].params = {"options": []};
            }
        },
        updateParams(index) {
            this.form.fields[index].json_params = JSON.stringify(this.form.fields[index].params)
        },
        addParam(fieldIndex) {
            this.form.fields[fieldIndex].params.options.push({text: '', value: ''})
        },
        removeParam(fieldIndex, index) {
            this.form.fields[fieldIndex].params.options.splice(index, 1)
        }
    }
}
</script>
