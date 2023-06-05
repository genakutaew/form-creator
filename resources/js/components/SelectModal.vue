<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div class="modal-container">
                <div class="modal-body">
                    <div v-for="(param, index) in field.params.options">
                        <div class="d-flex flex-row">
                            <div class="mt-1">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="param.value">
                                <div class="input-errors"
                                     v-if="v$.field.params.options.$each.$response.$data[index].value.$error">
                                    <div class="error-msg">Required</div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="param.text">
                                <div class="input-errors"
                                     v-if="v$.field.params.options.$each.$response.$data[index].text.$error">
                                    <div class="error-msg">Required</div>
                                </div>
                            </div>
                            <div class="mt-1">
                                <button class="btn btn-primary"
                                        @click.prevent="$emit('removeParam', fieldIndex, index)">Remove
                                </button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" @click.prevent="$emit('addParam', fieldIndex)">Add</button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary modal-default-button" @click.prevent="validate()">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {useVuelidate} from '@vuelidate/core'
import {required, helpers} from '@vuelidate/validators'

export default {
    props: ['fieldIndex', 'field'],
    setup() {
        return {
            v$: useVuelidate()
        }
    },
    methods: {
        validate() {
            this.v$.$validate()
            if (!this.v$.$error) {
                this.close()
            }
        },
        close() {
            this.$emit('close')
        }
    },
    validations() {
        return {
            field: {
                params: {
                    options: {
                        $each: helpers.forEach({
                            text: {required},
                            value: {required},
                        })
                    }

                }
            }
        }
    }
}
</script>
<style scoped>
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: table;
    transition: opacity 0.3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    width: 500px;
    margin: 0px auto;
    padding: 20px 30px;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
    transition: all 0.3s ease;
    font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
    margin-top: 0;
    color: #42b983;
}

.modal-body {
    margin: 20px 0;
}

.modal-default-button {
    float: right;
}

/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
}
</style>
