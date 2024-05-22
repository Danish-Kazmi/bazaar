<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectMultiDropDown from '@/Components/SelectMultiDropDown.vue';

export default {
    name: 'EditRole',
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
        editData: Object,
        roles: Array,
        permissions: Array,
        can: Array,
    },
    data() {
        return {
            form: this.$inertia.form({
                id: this.editData.id,
                role_name: this.editData.name,
                permissions: this.editData.permission_ids,
                errors: {
                    role_name: '',
                    permissions: '',
                }
            }),
        }
    },
    methods: {
        editPreviousStage(){
            this.$emit('editPreviousStage',true);
        },
        handleInput(values){
            this.form.permissions = values;
        },
        EditFormSubmit(){
            this.form.patch('/role/update', {
                        onSuccess: () => {
                            this.$emit('afterSaveRequest', true);
                        }
                    });
        }
    }
}
</script>
<template>

    <Head title="Edit Role" />
    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">Edit Role</h2>

                            <p class="mt-1 text-sm text-gray-600">
                                Update Your Account's Role.
                            </p>
                        </header>
                        <form @submit.prevent="EditFormSubmit" class="mt-6 space-y-6">
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

                                <SelectMultiDropDown class="mt-1 block w-full" :value="form.permissions"  @selectDropdownVal="handleInput" :multipleOptions="permissions.map(permission => ({
            label: permission.name,
            value: permission.id,
        }))" />
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