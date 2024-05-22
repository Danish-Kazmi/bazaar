<script>
import PrimaryButton from '@/Components/PrimaryButton.vue';
export default {
    name: "Datatable",
    components: {
        PrimaryButton
    },
    props: {
        dataTableColumns: Array,
        dataTableRows: Array,
        dataTableSettings: Object,
        addButton: String,
        editMode: Boolean,
        delMode: Boolean,
        can: Boolean,
    },
    data() {
        return {
            tableRows: this.dataTableRows,
            allOptionValue: 'All',
            selectedLength: parseInt(this.dataTableSettings.record) || 'All', // Default value
            currentPage: 1, // Current page
            totalPages: 1,
            searchMainTableData: '', // search data
        }
    },
    mounted() {
        this.calculateTotalPages();
    },
    computed: {
        displayedPages() {
            const totalButtons = 3;
            const start = Math.max(1, this.currentPage - 1);
            const end = Math.min(start + totalButtons - 1, this.totalPages);
            let paginationArray = Array.from({ length: end - start + 1 }, (_, index) => start + index);
            if (end < this.totalPages) {
                paginationArray.push('...');
            }
            return paginationArray;
        },
    },
    methods: {
        addFormComponent() {
            this.$emit('addFormComponentModel', true);
        },
        editFormComponent(val) {
            this.$emit('editFormComponentModel', val);
        },
        delFormComponent(val) {
            this.$emit('delFormComponentModel', val);
        },
        calculateTotalPages() {
            if (this.selectedLength !== 'All') {
                this.totalPages = Math.ceil(parseInt(this.total) / parseInt(this.selectedLength));
                this.totalPages = (this.totalPages < 1) ? 1 : this.totalPages;
            } else {
                this.totalPages = 1;
            }
        },
        ChangePageLength() {
            let skip = 0;
            let take = 0;
            let search = this.searchMainTableData;
            if (this.selectedLength !== 'All') {
                skip = (this.currentPage - 1) * this.selectedLength;
                while (skip > this.total) {
                    this.currentPage--;
                    skip -= this.selectedLength;
                }
                take = parseInt(this.selectedLength);
            } else {
                this.currentPage = 1;
                skip = 0;
                take = 'All';
            }
            this.calculateTotalPages();
            const data = {
                skip,
                take,
                search
            };
            axios({
                url: this.dataTableSettings.url,
                method: 'GET',
                params: data,
            }).then(response => {
                if (response.data.status == true) {
                    this.tableRows = response.data.tableRows;
                    this.total = response.data.total;
                }
            }).catch(error => {
                console.error('Error downloading ', error);
            });
        },
        goToPage(pageNumber) {
            this.currentPage = Math.min(Math.max(pageNumber, 1), this.totalPages);
            this.ChangePageLength();
        },
        searchMainTable() {
            this.currentPage = 1;
            this.ChangePageLength();
        },
    },
    watch: {
        dataTableSettings: {
            handler() {
                this.total = this.dataTableSettings.total,
                    this.record = this.dataTableSettings.record
            },
            immediate: true,
        },
        total: {
            handler() {
                this.calculateTotalPages();
            },
            immediate: true,
        }
    }
}
</script>
<template>
    <div class="md:mb-6 mb-20">
        <div class="w-full">
            <div class="md:flex block items-center justify-between md:space-y-0 space-y-6">
                <div class="relative flex items-center text-gray-400 focus-within:text-gray-600">
                    <svg class="w-5 h-5 absolute ml-3 pointer-events-none" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" name="search" v-model="searchMainTableData" @input="searchMainTable()"
                        placeholder="Search here..." autocomplete="off" aria-label="Search here..."
                        class="w-full pr-3 pl-10 py-1 placeholder-gray-500 text-black rounded-2xl border-none ring-2 ring-gray-300 focus:ring-gray-500 focus:ring-2">
                </div>
                <PrimaryButton v-if="can.create" type="button" class="float-right" @click="addFormComponent">
                    {{ addButton }}
                </PrimaryButton>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right ">
            <thead class="text-xs uppercase bg-[#373739] text-white">
                <tr>
                    <th v-for="(column, index) in dataTableColumns" scope="col" class="px-3 py-2">{{ column }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in tableRows" :key="index" class="bg-white border-b">
                    <td v-for="(value, key) in row" :key="key" class="px-3 py-2">{{ value }}</td>
                    <td class="px-3 py-2 flex items-center gap-3">
                        <div class="flex items-center gap-3" v-if="(editMode && can.edit) || (delMode && can.delete)">
                            <i v-if="editMode && can.edit"  class="fe fe-edit-2 cursor-pointer" @click="editFormComponent(row.id)"></i>
                            <i v-if="delMode && can.delete" class="fe fe-trash cursor-pointer" @click="delFormComponent(row.id)"></i>
                        </div>
                        <span v-else>--</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="flex flex-col md:flex-row justify-between mt-5">
        <div class="flex text-xs gap-x-3 items-center text-[#505E6B]">
            <span>Show</span>
            <select @change="ChangePageLength($event)" name="" id="" v-model="selectedLength"
                class="border-[#8A92A6] text-sm text-[#505E6B] rounded focus:outline-none focus:border-[#8A92A6] pr-[1.6rem] py-1">
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="75">75</option>
                <option value="100">100</option>
                <option :value="allOptionValue">All</option>
            </select>
            of {{ total }} entries
        </div>
        <div class="bg-white p-4 flex self-end md:self-center items-center flex-wrap">
            <nav aria-label="Page navigation">
                <ul class="inline-flex ">
                    <li>
                        <button @click="goToPage(currentPage - 1)" :disabled="currentPage === 1"
                            class="h-8 px-2 text-primary transition-colors duration-150 rounded-l-lg focus:shadow-outline hover:bg-[#EAF4F6]">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                    <li v-for="pageNumber in displayedPages" :key="pageNumber">
                        <button v-if="(pageNumber != '...' && pageNumber == currentPage)"
                            class="h-8 px-3 transition-colors duration-150 bg-[#373739]"
                            :class="{ 'text-white bg-primary border-0 border-primary focus:shadow-outline': currentPage === pageNumber, 'text-primary focus:shadow-outline hover:bg-[#EAF4F6]': currentPage !== pageNumber }">
                            {{ pageNumber }}
                        </button>
                        <button @click="goToPage(pageNumber)" v-else-if="pageNumber != '...'"
                            class="h-8 px-3 transition-colors duration-150"
                            :class="{ 'text-white border-0 bg-primary focus:shadow-outline': currentPage === pageNumber, 'text-primary focus:shadow-outline hover:bg-[#EAF4F6]': currentPage !== pageNumber }">
                            {{ pageNumber }}
                        </button>
                        <button @click="goToPage(pageNumber)" v-else disabled
                            class="h-8 px-3 transition-colors duration-150"
                            :class="{ 'text-white border-0 focus:shadow-outline': currentPage === pageNumber, 'text-primary focus:shadow-outline hover:bg-[#EAF4F6]': currentPage !== pageNumber }">
                            {{ pageNumber }}
                        </button>
                    </li>
                    <li>
                        <button @click="goToPage(currentPage + 1)" :disabled="currentPage === totalPages"
                            class="h-8 px-2 text-primary transition-colors duration-150 bg-white rounded-r-lg focus:shadow-outline hover:bg-[#EAF4F6]">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>