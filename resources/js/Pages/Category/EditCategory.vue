<script>
export default {
    name: 'EditCategory',
    props: {
        parentCategories: Array,
        editCategory: Object,
    },
    data() {
        return {
            newCategoryName: this.editCategory.category_name,
            parentCategoryId: (this.editCategory.parent_category == 0)? "": this.editCategory.parent_category,
            isParentCategoryEnabled: (this.editCategory.parent_category == 0)? true: false,
        };
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        },
        toggleParentCategory() {
            this.parentCategoryId = ''; // Reset selection when disabling
        },
        submitCategoryForm() {
            const formData = {
                name: this.newCategoryName,
                parent_id: this.isParentCategoryEnabled ? null : this.parentCategoryId,
            };
            axios.post('/category/'+this.editCategory.id, formData)
                .then(response => {
                    console.log(response.data); // Handle success response
                    this.closeModal(); // Optionally close modal on success
                })
                .catch(error => {
                    console.error(error); // Handle error
                });
        },
    },
};
</script>

<template>
    <div class="w-3/5">
        <h2 class="text-xl font-bold mb-6">Edit Category</h2>
        <form @submit.prevent="submitCategoryForm" class="flex flex-col gap-4">
            <div class="mb-4">
                <label for="name" class="flex justify-between items-center text-gray-700 text-sm font-bold mb-2">
                    Category Name:
                    <span class="form-check form-check-inline">
                        <label class="form-check-label flex justify-between items-center gap-2">
                            <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"
                                v-model="isParentCategoryEnabled" @change="toggleParentCategory">
                            Parent Category
                        </label>
                    </span>
                </label>
                <input type="text" id="name" v-model="newCategoryName"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4" v-if="!isParentCategoryEnabled">
                <label for="parent_category" class="block text-gray-700 text-sm font-bold mb-2">
                    Parent Category:
                </label>
                <select v-model="parentCategoryId" id="parent_category"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="" selected disabled>Select Parent Category</option>
                    <option v-for="parentCategory in parentCategories" :key="parentCategory.id" :value="parentCategory.id">
                        {{ parentCategory.category_name }}</option>
                </select>
            </div>
            <div class="flex justify-end gap-3 mb-4">
                <button type="submit"
                    class="rounded-md px-5 py-2 bg-blue-500 text-white text-sm font-semibold hover:bg-blue-600 duration-300">Update</button>
                <button type="button" @click="closeModal()"
                    class="rounded-md px-5 py-2 bg-blue-500 text-white text-sm font-semibold hover:bg-blue-600 duration-300">Cancel</button>
            </div>
        </form>
    </div>
</template>
