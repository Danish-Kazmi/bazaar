<script>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Datatable from '@/Components/DDatatable.vue';
import AddProduct from '@/Pages/Product/AddProduct.vue';
import EditProduct from '@/Pages/Product/EditProduct.vue';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'Product',
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
        AddProduct,
        EditProduct,
    },
    mounted() {
        const categories = usePage().props.categories;
        this.categories = categories;
    },
    data() {
        return {
            dataTableColumns: ['Product Image', 'Product Code', 'Name', 'Category', 'Brand', 'Model', 'Sale Price', 'Price', 'Current Stock', 'New Arrival', 'Owner', 'Actions'],
            dataTableRows: this.tableRows,
            dataTableSettings: {
                url: '/product',
                total: this.total,
                record: this.record
            },
            showAddProductForm: false,
            showEditProductForm: false,
            editProduct: [],
            refreshData: false,
            categories: [],
        };
    },
    methods: {
        addProduct() {
            this.showAddProductForm = true;
        },
        editFunction(id) {
            axios({
                url: '/product/' + id + '/edit',
                method: 'GET',
            }).then(response => {
                if (response.data.status) {
                    this.editProduct = response.data.data;
                    this.showEditProductForm = true;
                }
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        deleteFunction(id) {
            axios({
                url: '/product/' + id,
                method: 'DELETE',
            }).then(response => {
                this.refreshTable();
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        closeModal() {
            this.showAddProductForm = false;
            this.showEditProductForm = false;
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
    <Head title="Products" />

    <AuthenticatedLayout :can="can">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div v-if="!showAddProductForm && !showEditProductForm">
                        <button @click="addProduct()"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Add</button>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            @edit="editFunction" @delete="deleteFunction"
                            :dataTableSettings="dataTableSettings" :refreshTable="refreshData"/>
                    </div>
                    <AddProduct v-if="showAddProductForm" :categories="categories" @closeModal="closeModal" />
                    <EditProduct v-if="showEditProductForm" :editProduct="editProduct" :categories="categories" @closeModal="closeModal" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
