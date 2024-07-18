<template>
    <div>
        <h2>Reviews for {{ product.product_name }}</h2>
        <div v-if="reviews.length === 0">
            <p>There are no reviews for this product.</p>
        </div>
        <div v-else>
            <div v-for="review in reviews" :key="review.id" class="card">
                <div class="card-body">
                    <h5 class="card-title">User: {{ review.user.name }}</h5>
                    <p class="card-text">Rating: {{ review.rating }}</p>
                    <p class="card-text">Review: {{ review.review_description }}</p>
                    <div v-if="review.review_images.length > 0">
                        <p><strong>Images:</strong></p>
                        <div class="review-images">
                            <img v-for="image in review.review_images" :key="image.id" :src="getImageUrl(image.image_path)" alt="Review Image" class="img-thumbnail">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ProductReviews',
    props: {
        productId: Number,
    },
    data() {
        return {
            product: {},
            reviews: []
        };
    },
    mounted() {
        this.getProductReviews();
    },
    methods: {
        getProductReviews() {
            axios.get(`/admin/reviews/${this.productId}`)
                .then(response => {
                    this.product = response.data.product;
                    this.reviews = response.data.reviews;
                })
                .catch(error => {
                    console.error('Error fetching reviews:', error);
                });
        },
        getImageUrl(imagePath) {
            return `http://bazaar.test/storage/review_images/GJpjg7n5EK7vayDcRpR6FTKlGpomvovQlkRZaDbq.jpg`;
        }
    }
};
</script>

<style>
.review-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}
.review-images img {
    max-width: 200px;
    height: auto;
}
</style>
