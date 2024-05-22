<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMultiDropDown from '@/Components/SelectMultiDropDown.vue';

export default {
    name: 'EditPermission',
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
        can: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                permission_name: '',
                errors: {
                    permission_name: '',
                }
            }),
        }
    },
    methods: {
        editPreviousStage(){
            this.$emit('editPreviousStage',true);
        }
    }
}
</script>
<template>

    <Head title="Roles" />
    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Edit Permission</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Update Your Account's Permission.
                            </p>
                        </header>
                        <form @submit.prevent="roleForm" class="mt-6 space-y-6">
                            <div class="grid grid-cols-1">
                                <div>
                                    <InputLabel for="name" value="Role Name" />

                                    <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.role_name"
                                        required autofocus autocomplete="name" />

                                    <InputError class="mt-2" :message="form.errors.role_name" />
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <PrimaryButton :disabled="form.processing">Update</PrimaryButton>
                                <PrimaryButton type="button" @click="editPreviousStage">Back</PrimaryButton>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>