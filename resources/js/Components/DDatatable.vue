<script>
export default {
    name: "DDatatable",
    props: {
        dataTableColumns: Array,
        dataTableRows: Array,
        dataTableSettings: Object,
        refreshTable: Boolean,
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
        editButton(id) {
            this.$emit('edit', id);
        },
        deleteButton(id) {
            this.$emit('delete', id);
        },
        reviewButton(id) {
            this.$emit('reviews', id);
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
        refreshTable: {
            handler(newVal) {
                if (newVal) {
                    this.ChangePageLength();
                }
            },
            immediate: true, // Trigger on initial load
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
    <div class="mb-6">
        <div class="w-full max-w-xs">
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
        </div>
    </div>
    <div class="relative overflow-x-auto rounded-md">
        <table class="w-full text-sm text-left rtl:text-right ">
            <thead class="text-xs uppercase bg-[#373739] text-white">
                <tr>
                    <th v-for="(column, index) in dataTableColumns" scope="col" class="whitespace-nowrap px-3 py-4 text-sm">{{ column }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in tableRows" :key="index" class="bg-white border-b">
                    <td v-for="(value, key) in row" :key="key" class="truncate px-3 py-2">
                        <template v-if="key == 'reviews'">
                            <button @click="reviewButton(value)"
                                class="px-2 py-2 text-primary transition-colors duration-150 bg-white rounded-r-lg focus:shadow-outline hover:bg-[#EAF4F6]">
                                See Reviews
                            </button>
                        </template>
                        <template v-else-if="key == 'buttons'">
                            <button @click="editButton(value)"
                                class="px-2 py-2 text-primary transition-colors duration-150 bg-white rounded-l-lg focus:shadow-outline hover:bg-[#EAF4F6]">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.8498 5.18641L13.5477 5.46086C13.7096 5.04927 13.7096 4.59167 13.5477 4.18009C13.4655 3.97082 13.3425 3.80513 13.2205 3.66437C13.107 3.53346 12.9614 3.38784 12.8028 3.22931L12.7867 3.21322L12.7706 3.19708C12.6121 3.03855 12.4665 2.89292 12.3356 2.77946C12.1948 2.65745 12.0291 2.5345 11.8199 2.45222C11.4083 2.29038 10.9507 2.29038 10.5391 2.45222C10.3298 2.5345 10.1641 2.65745 10.0234 2.77946C9.89249 2.89293 9.74687 3.03857 9.58835 3.19711L9.57223 3.21322L4.57933 8.20612C4.56677 8.21868 4.5541 8.2313 4.54135 8.24401C4.38509 8.39964 4.21708 8.56699 4.09806 8.77719C3.97905 8.98739 3.92199 9.21756 3.86893 9.43162C3.8646 9.44909 3.86029 9.46645 3.85598 9.48369L3.47451 11.0096C3.47189 11.0201 3.46921 11.0307 3.4665 11.0416C3.42867 11.1924 3.38229 11.3772 3.36665 11.5372C3.34897 11.7179 3.34739 12.0744 3.63649 12.3635C3.92558 12.6526 4.28209 12.651 4.4628 12.6333C4.62275 12.6177 4.80761 12.5713 4.9584 12.5335C4.96923 12.5307 4.97989 12.5281 4.99035 12.5255L6.51627 12.144C6.5335 12.1397 6.55086 12.1354 6.56833 12.131C6.78239 12.078 7.01256 12.0209 7.22277 11.9019C7.43297 11.7829 7.60032 11.6149 7.75595 11.4586C7.76865 11.4459 7.78128 11.4332 7.79384 11.4206L12.7867 6.42773L12.8028 6.41164C12.9614 6.25311 13.107 6.10748 13.2205 5.97657C13.3425 5.83581 13.4655 5.67012 13.5477 5.46086L12.8498 5.18641Z"
                                        stroke="#8A92A6" stroke-width="1.5" />
                                    <path
                                        d="M9.33334 3.99996L11.3333 2.66663L13.3333 4.66663L12 6.66663L9.33334 3.99996Z"
                                        fill="#8A92A6" />
                                </svg>
                            </button>
                            <button @click="deleteButton(value)"
                                class="px-2 py-2 text-primary transition-colors duration-150 bg-white rounded-r-lg focus:shadow-outline hover:bg-[#EAF4F6]">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="Interface / Trash_Empty">
                                        <path id="Vector"
                                            d="M4.00002 4V11.8667C4.00002 12.6134 4.00002 12.9865 4.14535 13.2717C4.27318 13.5226 4.477 13.727 4.72788 13.8548C5.01282 14 5.38602 14 6.13129 14H9.86875C10.614 14 10.9867 14 11.2716 13.8548C11.5225 13.727 11.727 13.5226 11.8548 13.2717C12 12.9868 12 12.614 12 11.8687V4M4.00002 4H5.33335M4.00002 4H2.66669M5.33335 4H10.6667M5.33335 4C5.33335 3.37874 5.33335 3.06827 5.43485 2.82324C5.57017 2.49654 5.82957 2.23682 6.15627 2.10149C6.4013 2 6.7121 2 7.33335 2H8.66669C9.28794 2 9.59857 2 9.8436 2.10149C10.1703 2.23682 10.4298 2.49654 10.5651 2.82324C10.6666 3.06827 10.6667 3.37875 10.6667 4M10.6667 4H12M12 4H13.3334"
                                            stroke="#8A92A6" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>
                            </button>
                        </template>
                        <template v-else-if="key == 'image'"><div class="w-28 h-28 flex items-center justify-center border shadow overflow-hidden rounded-md"><img :src="value" alt="product-image" class="w-full "></div></template>
                        <template v-else class="">{{ value }}</template>
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

<style scoped>
.truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 150px;
}
</style>