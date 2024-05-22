<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMultiDropDown from '@/Components/SelectMultiDropDown.vue';

export default {
    name: 'AddRole',
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        SelectMultiDropDown,
        Head,
    },
    props:{
        permissions: Array,
        can: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                role_name: '',
                permissions: [],
                errors: {
                    role_name: '',
                    permissions: '',
                }
            }),
        }
    },
    methods: {
        PreviousStage(){
            this.$emit('previousStage',true);
        },
        handleInput(values){
            this.form.permissions = values;
        },
        AddFormSubmit(){
            this.form.post('/role/store', {
                        onSuccess: () => {
                            this.$emit('afterSaveRequest', true);
                        }
                    });
        }
    }
}
</script>
<template>
    <Head title="Add Role" />
    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Add Role</h2>
                            <p class="mt-1 text-sm text-gray-600">
                                Add Your Account's Roles.
                            </p>
                        </header>
                        <form @submit.prevent="AddFormSubmit" class="mt-6 space-y-6">
                            <div class="grid grid-cols-1">
                                <div>
                                    <InputLabel for="name" value="Role Name" />
                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.role_name"
                                        required autofocus autocomplete="name" />
                                    <InputError class="mt-2" :message="form.errors.role_name" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1">
                                <InputLabel for="permissions" value="Permissions" />
                                <SelectMultiDropDown class="mt-1 block w-full" @selectDropdownVal="handleInput" :multipleOptions="permissions.map(permission => ({
                           label: permission.name,
                           value: permission.id
                         }))"  />
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                                <PrimaryButton type="button" @click="PreviousStage">Back</PrimaryButton>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>