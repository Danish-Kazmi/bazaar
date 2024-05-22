<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddRole from '@/Pages/Roles/AddRole.vue';
import EditRole from '@/Pages/Roles/EditRole.vue';
import DeleteRole from '@/Components/DeleteModal.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Datatable from '@/Components/Datatable.vue';
import SelectMultiDropDown from '@/Components/SelectMultiDropDown.vue';

export default {
    name: 'roles',
    props: {
        roles: Array,
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
        AddRole,
        EditRole,
        DeleteRole,
    },
    data() {
        return {
            dataTableColumns: ['SN', 'Role Name', 'Permissions', 'Action'], // Define your column headers
            dataTableRows: this.filterUserData(this.roles ?? []),
            dataTableSettings: {
                url: '/roles',
                total: this.total,
                record: this.record
            },
            createModal: false,
            editModal: false,
            deleteModal: false,
            bgopacity: false,
            listModal: true,
            selectedRowData: {},
            editData: {},
        }
    },
    methods: {
        filterUserData(roles) {
            // Create a new array with only the desired keys/values
            return roles.map(role => ({
                id: role.id,
                name: role.name,
                permissions: role.permissions_count,
            }));
        },
        EditfilterData(id) {
            // Create a new array with only the desired keys/values
            return this.roles.find(role => role.id == id);
        },
        addFormComponentModel(value) {
            this.createModal = value;
            this.listModal = false;
        },
        editFormComponentModel(value) {
            const edit = this.EditfilterData(value);
            this.editData = edit;
            this.editModal = value;
            this.listModal = false;
        },
        delFormComponentModel(value) {
            const del = this.EditfilterData(value);
            this.deleteModal = true;
            this.listModal = true;
            this.bgopacity = true;
            this.selectedRowData = { 'SelectedRow': del, modalTitle: 'role', ColumNames: { ColumnFirst: 'Role Name' } };
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
            this.$inertia.get('/roles');
        },
        afterSaveRequest(value){
            this.createModal = false;
            this.editModal = false;
            this.listModal = value;
            this.$inertia.get('/roles');
        }
    }
}
</script>
<template>

    <Head title="Roles" />
    <AuthenticatedLayout v-if="listModal" :bgOpacity="bgopacity" :can="can">
        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            :dataTableSettings="dataTableSettings" :can="can" :addButton="'Add Role'"
                            @addFormComponentModel="addFormComponentModel"
                            @editFormComponentModel="editFormComponentModel" :editMode="true"
                            @delFormComponentModel="delFormComponentModel" :delMode="true" />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <AddRole v-if="createModal" :can="can" @afterSaveRequest="afterSaveRequest" @previousStage="previousStage" :permissions="permissions" />
    <EditRole v-if="editModal" :can="can" @afterSaveRequest="afterSaveRequest" @editPreviousStage="editPreviousStage" :permissions="permissions" :editData="editData" :roles="roles" />
    <DeleteRole v-if="deleteModal" :can="can" :deleteModal="deleteModal" @delCancelStage="delCancelStage" :selectedRowData="selectedRowData" />
</template>