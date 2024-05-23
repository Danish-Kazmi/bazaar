<script>
export default {
    name: 'EditProduct',
    props: {
        editProduct: Object,
        categories: Array,
    },
    data() {
        return {
            productUID: '',
            productName: '',
            category: '',
            manufacturerName: '',
            model: '',
            stock: '',
            price: '',
            productImage: '',
        };
    },
    mounted() {
        this.productUID = this.editProduct.product_id;
        this.productName = this.editProduct.product_name;
        this.category = this.editProduct.category_id;
        this.manufacturerName = this.editProduct.manufacturer_name;
        this.model = this.editProduct.model;
        this.stock = this.editProduct.stock;
        this.price = this.editProduct.price;
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        },
        previewFile(event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                // Update productImage with the selected file
                this.productImage = files[0];
            }
        },
        submitProductForm() {
            const formData = {
                _method: 'put',
                product_id: this.productUID,
                product_name: this.productName,
                category_id: this.category,
                manufacturer_name: this.manufacturerName,
                model: this.model,
                stock: this.stock,
                price: this.price,
                is_image: false, // Default value
                product_image: '', // Default value
            };
            if (this.editProduct.image_path && this.productImage === '') {
                formData.is_image = false;
                formData.product_image = this.editProduct.image_path;
            } else {
                formData.is_image = true;
                formData.product_image = this.productImage;
            }
            axios.post(`/product/${this.editProduct.id}`, formData, 
                {
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                .then(response => {
                    console.log(response.data); // Handle success response
                    this.closeModal(); // Optionally close modal on success
                })
                .catch(error => {
                    console.error(error); // Handle error
                });
        },
        getObjectURL(file) {
            return URL.createObjectURL(file);
        },
    },
};
</script>

<template>
    <div>
        <h2 class="text-xl font-bold mb-6">Add Product</h2>
        <form @submit.prevent="submitProductForm">
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-3 flex flex-col gap-4">
                    <div class="mb-4">
                        <label for="productuid" class="block text-gray-700 text-sm font-bold mb-2">
                            Unique ID:
                        </label>
                        <input type="text" id="productuid" v-model="productUID"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="productname" class="block text-gray-700 text-sm font-bold mb-2">
                            Product Name:
                        </label>
                        <input type="text" id="productname" v-model="productName"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">
                            Product Category:
                        </label>
                        <select v-model="category" id="category"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected disabled>Select Product Category</option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">
                                {{ category.category_name }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="manufacturername" class="block text-gray-700 text-sm font-bold mb-2">
                            Manufacturer’s Name:
                        </label>
                        <input type="text" id="manufacturername" v-model="manufacturerName"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="model" class="block text-gray-700 text-sm font-bold mb-2">
                            Model:
                        </label>
                        <input type="text" id="model" v-model="model"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="block text-gray-700 text-sm font-bold mb-2">
                            Stock:
                        </label>
                        <input type="text" id="stock" v-model="stock"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">
                            Price (PKR):
                        </label>
                        <input type="text" id="price" v-model="price"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex justify-end gap-3 mb-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Update</button>
                        <button type="button" @click="closeModal()"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Cancel</button>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="mb-4">
                        <label for="productImage" class="block text-gray-700 text-sm font-bold mb-2">
                            Product Image:
                        </label>
                        <input type="file" id="productImage" @change="previewFile($event)"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <div v-if="productImage || editProduct.image_path" class="mt-4">
                            <img :src="productImage ? getObjectURL(productImage) : editProduct.image_path" alt="Selected Image Preview" width="200">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
