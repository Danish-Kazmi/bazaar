<script>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Datatable from '@/Components/DDatatable.vue';
import AddBrand from '@/Pages/Brand/AddBrand.vue';
import EditBrand from '@/Pages/Brand/EditBrand.vue';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'Brand',
    props: {
        tableRows: Array,
        total: Number,
        record: String,
        can: Object,
    },
    components: {
        Head,
        AuthenticatedLayout,
        Datatable,
        AddBrand,
        EditBrand
    },
    mounted() {
        const categories = usePage().props.categories;
        this.categories = categories;
    },
    data() {
        return {
            dataTableColumns: ['Brand Name', 'Logo', 'Subcategories', 'Actions'],
            dataTableRows: this.tableRows,
            dataTableSettings: {
                url: '/brands',
                total: this.total,
                record: this.record
            },
            showAddBrandForm: false,
            showEditBrandForm: false,
            editBrand: [],
            refreshData: false,
            categories: [],
        };
    },
    methods: {
        addBrand() {
            this.showAddBrandForm = true;
        },
        editFunction(id) {
            axios({
                url: '/brands/'+id,
                method: 'GET',
            }).then(response => {
                if (response.data.status) {
                    this.editBrand = response.data.data;
                    this.showEditBrandForm = true;
                }
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        deleteFunction(id) {
            axios({
                url: '/brands/'+id,
                method: 'DELETE',
            }).then(response => {
                this.refreshTable();
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        closeModal() {
            this.showAddBrandForm = false;
            this.showEditBrandForm = false;
            this.refreshTable();
        },
        refreshTable() {
            this.refreshData = true;
            setTimeout(() => {
                this.refreshData = false;
            }, 1000);
        }
    },
};
</script>

<template>
    <Head title="Brands" />

    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div v-if="!showAddBrandForm && !showEditBrandForm">
                        <button @click="addBrand()"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Add</button>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            @edit="editFunction" @delete="deleteFunction"
                            :dataTableSettings="dataTableSettings" :refreshTable="refreshData"/>
                    </div>
                    <AddBrand v-if="showAddBrandForm" :categories="categories" @closeModal="closeModal" />
                    <EditBrand v-if="showEditBrandForm" :editBrand="editBrand" :categories="categories" @closeModal="closeModal" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
