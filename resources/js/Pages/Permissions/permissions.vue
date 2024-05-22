<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddPermission from '@/Pages/Permissions/AddPermission.vue';
import EditPermission from '@/Pages/Permissions/EditPermission.vue';
import DeleteRole from '@/Components/DeleteModal.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Datatable from '@/Components/Datatable.vue';
import SelectMultiDropDown from '@/Components/SelectMultiDropDown.vue';

export default {
    name: 'permissions',
    props: {
        permissions: Array,
        can: Array,
    },
    components: {
        AuthenticatedLayout,
        InputError,
        InputLabel,
        PrimaryButton,
        TextInput,
        SelectMultiDropDown,
        Head,
        Datatable,
        AddPermission,
        EditPermission,
        DeleteRole,
    },
    data() {
        return {
            dataTableColumns: ['SN', 'Permission Name', 'Action'], // Define your column headers
            dataTableRows: this.filterUserData(this.permissions ?? []),
            dataTableSettings: {
                url: '/permissions',
                total: this.total,
                record: this.record
            },
            createModal: false,
            editModal: false,
            deleteModal: false,
            bgopacity: false,
            listModal: true,
            selectedRowData: {},
        }
    },
    methods: {
        filterUserData(permissions) {
            // Create a new array with only the desired keys/values
            return permissions.map(permission => ({
                id: permission.id,
                name: permission.name,
            }));
        },
        addFormComponentModel(value) {
            this.createModal = value;
            this.listModal = false;
        },
        editFormComponentModel(value) {
            this.editModal = value;
            this.listModal = false;
        },
        delFormComponentModel(value) {
            this.deleteModal = true;
            this.listModal = true;
            this.bgopacity = true;
            this.selectedRowData = { 'SelectedRow': value, modalTitle: 'permission', ColumNames: { ColumnFirst: 'Permission Name' } };
        },
        previousStage(value) {
            this.createModal = false;
            this.listModal = value;
        },
        editPreviousStage(value) {
            this.editModal = false;
            this.listModal = value;
        },
        delCancelStage(value) {
            this.deleteModal = false;
            this.bgopacity = false;
            this.listModal = value;
        },
        afterSaveRequest(value){
            this.createModal = false;
            this.editModal = false;
            this.listModal = value;
            this.$inertia.get('/permissions');
        }
    }
}
</script>
<template>

    <Head title="Permissions" />
    <AuthenticatedLayout v-if="listModal" :bgOpacity="bgopacity" :can="can" >
        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            :dataTableSettings="dataTableSettings" :can="can" :addButton="'Add Permission'"
                            @addFormComponentModel="addFormComponentModel" 
                            @editFormComponentModel="editFormComponentModel" :editMode="false"
                            @delFormComponentModel="delFormComponentModel" :delMode="false" />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <AddPermission v-if="createModal" :can="can" @afterSaveRequest="afterSaveRequest" @previousStage="previousStage" />
    <EditPermission v-if="editModal" :can="can" @afterSaveRequest="afterSaveRequest" @editPreviousStage="editPreviousStage" />
    <DeleteRole v-if="deleteModal" :can="can" :deleteModal="deleteModal" @delCancelStage="delCancelStage" :selectedRowData="selectedRowData" />
</template>