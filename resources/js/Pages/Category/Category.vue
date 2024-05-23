<script>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Datatable from '@/Components/DDatatable.vue';
import AddCategory from '@/Pages/Category/AddCategory.vue';
import EditCategory from '@/Pages/Category/EditCategory.vue';

export default {
    name: 'Category',
    props: {
        tableRows: Array,
        total: Number,
        record: String,
        parentCategories: Array,
    },
    components: {
        Head,
        AuthenticatedLayout,
        Datatable,
        AddCategory,
        EditCategory
    },
    data() {
        return {
            dataTableColumns: ['Category Name', 'Parent Category', 'Actions'],
            dataTableRows: this.tableRows,
            dataTableSettings: {
                url: '/category',
                total: this.total,
                record: this.record
            },
            showAddCategoryForm: false,
            showEditCategoryForm: false,
            editCategory: [],
            refreshData: false,
        };
    },
    methods: {
        addCategory() {
            this.showAddCategoryForm = true;
        },
        editFunction(id) {
            axios({
                url: '/category/'+id,
                method: 'GET',
            }).then(response => {
                if (response.data.status) {
                    this.editCategory = response.data.data;
                    this.showEditCategoryForm = true;
                }
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        deleteFunction(id) {
            axios({
                url: '/category/'+id,
                method: 'DELETE',
            }).then(response => {
                this.refreshTable();
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        closeModal() {
            this.showAddCategoryForm = false;
            this.showEditCategoryForm = false;
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
    <Head title="Categories" />

    <AuthenticatedLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div v-if="!showAddCategoryForm && !showEditCategoryForm">
                        <button @click="addCategory()"
                            class="rounded-md px-5 py-2 bg-blue-500 text-white text-sm font-semibold hover:bg-blue-600 duration-300 float-right">Add</button>
                        <Datatable :dataTableColumns="dataTableColumns" :dataTableRows="dataTableRows"
                            @edit="editFunction" @delete="deleteFunction"
                            :dataTableSettings="dataTableSettings" :refreshTable="refreshData"/>
                    </div>
                    <AddCategory v-if="showAddCategoryForm" :parentCategories="parentCategories" @closeModal="closeModal" />
                    <EditCategory v-if="showEditCategoryForm" :editCategory="editCategory" :parentCategories="parentCategories" @closeModal="closeModal" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
