<script>
export default {
    name: 'AddProduct',
    props: {
        categories: Array,
    },
    data() {
        return {
            productUID: '',
            productName: '',
            category: '',
            brandName: '',
            model: '',
            stock: '',
            price: '',
            sale_price: '',
            productImages: [],
            brands: [], // Initialize brands array
        };
    },
    methods: {
        closeModal() {
            this.$emit('closeModal');
        },
        previewFile(event) {
            const files = event.target.files;
            if (files && files.length > 0) {
                // Clear the previous selection
                this.productImages = [];
                // Add selected files to the array
                for (let i = 0; i < files.length; i++) {
                    this.productImages.push(files[i]);
                }
            }
        },
        submitProductForm() {
            const formData = new FormData();
            formData.append('product_id', this.productUID);
            formData.append('product_name', this.productName);
            formData.append('category_id', this.category);
            formData.append('brand_id', this.brandName);
            formData.append('model', this.model);
            formData.append('stock', this.stock);
            formData.append('price', this.price);
            formData.append('sale_price', this.sale_price);
            // formData.append('image_path', this.productImage); // Append the image file
            this.productImages.forEach((image, index) => {
                formData.append(`image_path_${index}`, image);
            });
            axios.post('/product', formData)
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
        fetchBrands(categoryId) {
            axios.get(`/get_brands_by_category/${categoryId}`)
                .then(response => {
                    this.brands = response.data;
                })
                .catch(error => {
                    console.error('Error fetching brands:', error);
                });
        }
    },
    watch: {
        // Watch for changes in the selected category
        category(newCategory) {
            if (newCategory !== '') {
                // Fetch brands based on the selected category
                this.fetchBrands(newCategory);
            }
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
                    <div class="mb-4" v-if="category !== ''">
                        <label for="brand_name" class="block text-gray-700 text-sm font-bold mb-2">
                            Brand:
                        </label>
                        <select id="brand_name" v-model="brandName"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="" selected disabled>Select Brand</option>
                            <template v-for="(brand, id) in brands" :key="id">
                                <option :value="brand.id">
                                    {{ brand.brand_name }}
                                </option>
                            </template>
                        </select>
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
                    <div class="mb-4">
                        <label for="sale_price" class="block text-gray-700 text-sm font-bold mb-2">
                            Sale Price (PKR):
                        </label>
                        <input type="text" id="sale_price" v-model="sale_price"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex justify-end gap-3 mb-4">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Save</button>
                        <button type="button" @click="closeModal()"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 float-right">Cancel</button>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="mb-4">
                        <label for="productImages" class="block text-gray-700 text-sm font-bold mb-2">
                            Product Images:
                        </label>
                        <input type="file" id="productImages" @change="previewFile($event)" multiple
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <div v-if="productImages.length" class="mt-4 grid grid-cols-2 gap-4">
                            <div v-for="(image, index) in productImages" :key="index" class="relative">
                                <img :src="getObjectURL(image)" alt="Selected Image Preview" width="200">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>
