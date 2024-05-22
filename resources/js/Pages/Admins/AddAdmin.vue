<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import ckeditor from '@/Components/ckeditor.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectDropDown from '@/Components/SelectDropDown.vue';
import { Link, useForm, usePage } from '@inertiajs/vue3';

export default {
    name: 'AddAdmin',
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        ckeditor,
        PrimaryButton,
        TextInput,
        SelectDropDown,
        Head,
    },
    props: {
        roles: Array,
        can: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                name: '',
                email: '',
                phone: '',
                roles: [],
                message: '',
                errors: {
                    name: '',
                    email: '',
                    phone: '',
                    roles: '',
                    message: '',
                }
            }),
        }
    },
    methods: {
        addUserPreviousStage() {
            this.$emit('adminPreviousStage', true);
        },
        ContentRecord(message) {
            this.form.message = message;
        },
        AddFormSubmit(){
            this.form.post('/user/store', {
                        onSuccess: () => {
                            this.$emit('afterSaveRequest', true);
                        }
                    });
        }
    }
};
</script>
<template>

    <Head title="Add User" />
    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">User's Information</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Add Your Account's Profile Information.
                            </p>
                        </header>
                        <form @submit.prevent="AddFormSubmit" class="mt-6 space-y-6">
                            <div class="grid grid-cols-2 gap-4">
                                <div class="relative">
                                    <InputLabel for="name" value="Name" />

                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                        required autofocus autocomplete="name" />

                                    <InputError class="mt-2 absolute" :message="form.errors.name" />
                                </div>
                                <div class="relative">
                                    <InputLabel for="email" value="Email" />

                                    <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email"
                                        required autocomplete="username" />

                                    <InputError class="mt-2 absolute" :message="form.errors.email" />
                                </div>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div class="relative">
                                    <InputLabel for="phone" value="Phone" />

                                    <TextInput id="phone" type="number" class="mt-1 block w-full" v-model="form.phone"
                                        required autofocus autocomplete="phone" placeholder="+ 92 345 6789010" />

                                    <InputError class="mt-2 absolute" :message="form.errors.phone" />
                                </div>
                                <div class="relative">
                                    <InputLabel for="Role" value="Role" />
                                    <SelectDropDown id="roles" class="mt-1 block w-full" required autofocus
                                        autocomplete="roles" v-model="form.roles" :defaultValue="'Select Role'"
                                        :options="roles.map(role => ({
                                        label: role.name,
                                        value: role.id
                                        }))" />
                        
                                    <InputError class="mt-2 absolute" :message="form.errors.roles" />
                                </div>
                            </div>
                            <div class="grid grid-cols-1 gap-4">
                                <div class="relative">
                                    <InputLabel for="message" value="Message" />
                                    <ckeditor @receiveContentData="ContentRecord" :hasTextContent="form.message" />
                                    <InputError class="mt-2 absolute" :message="form.errors.message" />
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                                <PrimaryButton type="button" @click="addUserPreviousStage">Back</PrimaryButton>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>