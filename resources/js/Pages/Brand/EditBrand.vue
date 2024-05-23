<script>
export default {
    name: 'EditBrand',
    props: {
        editBrand: Object,
        categories: Array
    },
    data() {
        return {
            brandName: this.editBrand.brand_name,
            brandLogo: null,
            selectedSubCategories: this.editBrand.sub_categories.map(sc => sc.id),
        };
    },
    methods: {
        submitForm() {
            const formData = new FormData();
            formData.append('_method', 'PUT');
            formData.append('brand_name', this.brandName);
            if (this.brandLogo) {
                formData.append('brand_logo', this.brandLogo);
            }
            formData.append('sub_categories', JSON.stringify(this.selectedSubCategories));

            axios.post(`/brands/${this.editBrand.id}`, formData)
                .then(response => {
                    this.$emit('closeModal');
                })
                .catch(error => {
                    console.error('Error updating brand', error);
                });
        },
        handleFileUpload(event) {
            this.brandLogo = event.target.files[0];
        },
    },
};
</script>

<template>
    <div class="w-3/5">
        <h2 class="text-xl font-bold mb-6">Edit Brand</h2>
        <form @submit.prevent="submitForm" class="flex flex-col gap-4">
            <div class="mb-4">
                <label for="name" class="flex justify-between items-center text-gray-700 text-sm font-bold mb-2">
                    Brand Name
                </label>
                <input type="text" v-model="brandName" id="brand_name" requiredclass="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="brand_logo" class="block text-gray-700 text-sm font-bold mb-2">
                    Brand Logo
                </label>
                <input type="file" @change="handleFileUpload" id="brand_logo">
            </div>
            <div>
                <label for="sub_categories" class="block text-gray-700 text-sm font-bold mb-2">
                    Subcategories
                </label>
                <select v-model="selectedSubCategories" id="sub_categories" multiple
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <template v-for="(category, id) in categories" :key="id">
                        <option disabled :value="category.id">
                            {{ category.category_name }}
                        </option>
                        <template v-if="category.sub_categories && category.sub_categories.length">
                            <template v-for="subCategory in category.sub_categories" :key="subCategory.id">
                            <option :value="subCategory.id">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ subCategory.category_name }}
                            </option>
                            </template>
                        </template>
                    </template>
                </select>
            </div>
            <div class="flex justify-end gap-3 mb-4">
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right" type="submit">Update</button>
                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right" type="button" @click="$emit('closeModal')">Cancel</button>
            </div>
        </form>
    </div>
</template>
