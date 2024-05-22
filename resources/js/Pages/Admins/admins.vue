<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import AddAdmin from '@/Pages/Admins/AddAdmin.vue';
import EditAdmin from '@/Pages/Admins/EditAdmin.vue';
import DeleteRole from '@/Components/DeleteModal.vue';
import Datatable from '@/Components/Datatable.vue';

export default {
    name: 'admins',
    props: {
        admins: Array,
        roles: Array,
        can: Array
    },
    components: {
        AuthenticatedLayout,
        Head,
        Datatable,
        AddAdmin,
        EditAdmin,
        DeleteRole,
    },
    data() {
        return {
            dataTableColumns: ['SN', 'Name', 'Phone','Role', 'Action'], // Define your column headers
            dataTableRows: this.filterUserData(this.admins ?? []),
            dataTableSettings: {
                url: '/users',
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
        filterUserData(admins) {
            // Create a new array with only the desired keys/values
            return admins.map(admin => ({
                id: admin.id,
                name: admin.name ?? '-',
                phone: admin.phone ?? '-',
                role: admin.role_name !== '' ? admin.role_name : '-',
            }));
        },
        EditfilterData(id) {
            // Create a new array with only the desired keys/values
            return this.admins.find(admin => admin.id == id);
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
            this.selectedRowData = { 'SelectedRow': del, modalTitle: 'admin', ColumNames: { ColumnFirst: 'Name' } };
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
            this.$inertia.get('/users');
        },
        afterSaveRequest(value){
            this.createModal = false;
            this.editModal = false;
            this.listModal = value;
            this.$inertia.get('/users');
        }
    }
}
</script>
<template>

    <Head title="Users" />
    <AuthenticatedLayout v-if="listModal" :bgOpacity="bgopacity" :can="can" >
        <div class="py-12">
            <div class="w-full mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <section>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            :dataTableSettings="dataTableSettings" :can="can" :addButton="'Add User'"
                            @addFormComponentModel="addFormComponentModel" 
                            @editFormComponentModel="editFormComponentModel" :editMode="true"
                            @delFormComponentModel="delFormComponentModel" :delMode="true" />
                    </section>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
    <AddAdmin v-if="createModal" :can="can" @afterSaveRequest="afterSaveRequest" @adminPreviousStage="previousStage" :roles="roles" />
    <EditAdmin v-if="editModal" :can="can" @afterSaveRequest="afterSaveRequest" @editPreviousStage="editPreviousStage" :roles="roles" :editData="editData" />
    <DeleteRole v-if="deleteModal" :can="can" :deleteModal="deleteModal" @delCancelStage="delCancelStage" :selectedRowData="selectedRowData" />
</template>