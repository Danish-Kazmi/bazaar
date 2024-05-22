<template>
    <div v-show="deleteModal" id="deleteModal" v-on:click="delCancelStage"
        class="fixed inset-0 z-10 bg-black opacity-50" aria-hidden="true"></div>
    <div v-show="deleteModal" tabindex="-1" id="top_high_screen"
        class="fixed  top-[15%] md:w-[42%] w-full md:left-[30%] left-0 z-20 p-4 overflow-x-hidden overflow-y-auto">
        <div class="relative delete_message_width max-h-full">
            <div class="relative rounded-lg shadow bg-white">
                <!-- CLOSE MODAL ICON -->
                <div class="absolute right-[-3rem] p-2 transform -translate-x-full">
                    <button class="p-2 text-white rounded-md focus:outline-none focus:ring"
                        v-on:click="delCancelStage">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 5L5 19M5.00001 5L19 19" stroke="#8A92A6" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-6 text-center space-x-2 space-y-4">
                    <!-- WARNING ICON -->
                    <svg v-if="!successState" width="30" class="inline-flex" height="28" viewBox="0 0 30 28" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M13.5 15.5001C13.5 16.3285 14.1716 17.0001 15 17.0001C15.8285 17.0001 16.5 16.3285 16.5 15.5001V11.0001C16.5 10.1716 15.8285 9.50006 15 9.50006C14.1716 9.50006 13.5 10.1716 13.5 11.0001V15.5001ZM16.5 19.9833C16.5 19.1548 15.8285 18.4833 15 18.4833C14.1716 18.4833 13.5 19.1548 13.5 19.9833V20.0001C13.5 20.8285 14.1716 21.5001 15 21.5001C15.8285 21.5001 16.5 20.8285 16.5 20.0001V19.9833ZM11.066 2.9921C12.7806 -0.0940461 17.219 -0.0940461 18.9335 2.9921L28.835 20.8147C30.5012 23.8141 28.3323 27.5001 24.9012 27.5001H5.09828C1.66709 27.5001 -0.501761 23.8141 1.16456 20.8147L11.066 2.9921Z"
                            fill="#8A92A6" />
                    </svg>
                    <!-- TITLE -->
                    <h1 style="font-size: 20px;font-weight: bold;text-transform: capitalize;">Delete
                        {{ selectedRowData.modalTitle ?? '-' }}</h1>
                    <!-- DELETE CONTENT  -->
                    <h3 style="font-weight: normal;"
                        v-html="!successState ? `You are about to delete the ${selectedRowData.modalTitle ?? ' '} listed
                                            below. Click <b> 'Confirm' </b> to permanently remove this  ${selectedRowData.modalTitle ?? ' '}. ` : 'Successfully deleted'"
                        class="mb-3 text-lg text-secondary font-bold">
                    </h3>
                    <!-- DELETED ROW DATA -->
                    <div class="text-center">
                        <div class="flex justify-center">
                            <div class="flex flex-col items-end"> <!-- Left-align the text within this div -->
                                <span v-if="selectedRowData.ColumNames.ColumnFirst"><b>{{
                                    selectedRowData.ColumNames.ColumnFirst ?? '-' }}</b> :&nbsp;&nbsp;</span>
                                <span v-if="selectedRowData.ColumNames.ColumnSecond"><b>{{
                                    selectedRowData.ColumNames.ColumnSecond ?? '-' }}</b> :&nbsp;&nbsp;</span>
                            </div>
                            <!-- ========================================================== -->
                            <!-- Right-align the text within this div's -->
                            <!-- ========================================================== -->
                            <!-- FIELDS SHOW -->
                            <div class="flex flex-col items-start"
                                v-if="selectedRowData.modalTitle == 'role'">
                                <!-- Left-align the text within this div -->
                                <span>{{ selectedRowData.SelectedRow.name ?? '-' }}</span>
                            </div>
                            <div class="flex flex-col items-start"
                                v-if="selectedRowData.modalTitle == 'admin'">
                                <!-- Left-align the text within this div -->
                                <span>{{ selectedRowData.SelectedRow.name ?? '-' }}</span>
                            </div>
                            <div class="flex flex-col items-start"
                                v-if="selectedRowData.modalTitle == 'permission'">
                                <!-- Left-align the text within this div -->
                                <span>{{ selectedRowData.SelectedRow.name ?? '-' }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- CONFIRM BUTTON -->
                    <PrimaryButton v-if="!successState" v-on:click="deleteSelectRowData"
                        class="text-center flex justify-center items-center px-7 py-2.5 font-medium capitalize">Confirm
                    </PrimaryButton>
                    <!-- CANCEL BUTTON -->
                    <button v-if="!successState" v-on:click="delCancelStage" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-400 text-sm font-medium px-8 py-2 hover:text-gray-900 focus:z-10">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import PrimaryButton from '@/Components/PrimaryButton.vue';

export default {
    name: "DeleteModal",
    components: { PrimaryButton },
    props: {
        deleteModal: Boolean,
        selectedRowData: Object
    },
    data() {
        return {
            successState: false
        }
    },
    methods: {
        deleteSelectRowData() {
            //USER DELETE
            if (this.selectedRowData.modalTitle == 'admin') {
                const id = { 'id': this.selectedRowData.SelectedRow.id };
                const url = '/user/delete';
                this.DeleteRowFunction(url, id);
            }
            //ROLE DELETE
            if (this.selectedRowData.modalTitle == 'role') {
                const id = { 'id': this.selectedRowData.SelectedRow.id };
                const url = '/role/delete';
                this.DeleteRowFunction(url, id);
            }
        },
        //CLOSE MODAL
        delCancelStage() {
            this.$emit("delCancelStage", true);
        },
        //DELETE ROW FUNCTION
        DeleteRowFunction(url, id) {
            this.$inertia.post(url, id, {
                onSuccess: () => {
                    this.delCancelStage();
                }
            });
        }
    },
    mounted() {
        const screenWidth = window.innerWidth;
        const screenHeight = window.innerHeight;
        if (screenHeight >= 585) {
            const element = document.getElementById('top_high_screen');
            if (element) {
                element.style.paddingTop = '6rem';
                element.style.paddingBottom = '6rem';
            }
        }
    },
    emits: ["delCancelStage"]
};
</script>
