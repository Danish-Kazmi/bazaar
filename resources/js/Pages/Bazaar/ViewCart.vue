<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';
import { usePage } from '@inertiajs/vue3';

export default {
    name: 'ViewCart',
    components: {
        Head,
        BazaarLayout,
    },
    data() {
        return {
            carts: [],
            user: null,
            subtotal: 0,
            discount: 0,
            total: 0,
        }
    },
    computed: {
        totalPrice() {
            return this.carts.reduce((total, cart) => total + cart.product.price * cart.quantity, 0);
        },
        calculateSubtotal() {
            return this.carts.reduce((acc, cart) => {
                return acc + cart.product.price * cart.quantity;
            }, 0);
        },
        calculateDiscount() {
            if (this.user && this.user.role_id == 4) {
                return this.subtotal * 0.05; // 5% discount
            } else {
                return 0;
            }
        },
        calculateTotal() {
            return this.subtotal - this.discount;
        },
    },
    watch: {
        calculateSubtotal(newValue) {
            this.subtotal = newValue;
        },
        calculateDiscount(newValue) {
            this.discount = newValue;
        },
        calculateTotal(newValue) {
            this.total = newValue;
        },
    },
    mounted() {
        const props = usePage().props;
        this.carts = props.ziggy.cart;
        this.user = props.user;
        this.subtotal = this.calculateSubtotal;
        this.discount = this.calculateDiscount;
        this.total = this.calculateTotal;
        console.log(this.carts, 'Ziggy');
    },
    methods: {
        removeFromCart(cartId) {
            axios.delete(`/cart/${cartId}`)
                .then(response => {
                    this.carts = this.carts.filter(cart => cart.id !== cartId);
                    this.updateTotals();
                })
                .catch(error => {
                    console.error('There was an error removing the item from the cart!', error);
                });
        },
        updateCart(cart) {
            axios.post(`/cart/update`, {
                id: cart.id,
                quantity: cart.quantity,
            })
                .then(response => {
                    console.log('Cart updated', response.data);
                    this.updateTotals();
                })
                .catch(error => {
                    console.error('There was an error updating the cart!', error);
                });
        },
        updateTotals() {
            this.subtotal = this.calculateSubtotal;
            this.discount = this.calculateDiscount;
            this.total = this.calculateTotal;
        },
    },
};
</script>

<template>

    <Head title="View Cart" />

    <BazaarLayout>

        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Shopping Cart</a></li>
            </ul>

            <div class="row">
                <div id="content" class="col-sm-12">
                    <h1 class="text-[42px] font-extrabold mb-5">Shopping Cart</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="text-center">Image</td>
                                    <td class="text-left">Product Name</td>
                                    <td class="text-left">Model</td>
                                    <td class="text-left">Quantity</td>
                                    <td class="text-right">Unit Price</td>
                                    <td class="text-right">Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-for="cart in carts" :key="cart.id">
                                    <tr>
                                        <td class="text-center">
                                            <a :href="route('single_product', cart.product.id)">
                                                <img :src="cart.product.image" :alt="cart.product.product_name"
                                                    :title="cart.product.product_name" class="img-thumbnail"
                                                    style="height: 16rem !important;">
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            <a :href="route('single_product', cart.product.id)">
                                                {{ cart.product.product_name }}
                                            </a>
                                            <br>
                                            <small>{{ cart.product.product_id }}</small>
                                        </td>
                                        <td class="text-left">{{ cart.product.model }}</td>
                                        <td class="text-left">
                                            <div class="input-group btn-block" style="max-width: 200px;">
                                                <input type="text" v-model="cart.quantity" size="1"
                                                  class="form-control" @blur="updateCart(cart)">
                                                <span class="input-group-btn">
                                                    <button type="button" @click="removeFromCart(cart.id)"
                                                        data-toggle="tooltip" title="" class="btn btn-danger"
                                                        data-original-title="Remove"><i
                                                            class="fa fa-times-circle"></i></button>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="text-right">${{ cart.product.price }}</td>
                                        <td class="text-right">${{ cart.product.price * cart.quantity }}</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-sm-4 col-sm-offset-8">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr v-if="carts.length > 0">
                                        <td class="text-right"><strong>Sub-Total:</strong></td>
                                        <td class="text-right">${{ subtotal.toFixed(2) }}</td>
                                    </tr>
                                    <tr v-if="user && user.role_id == 4">
                                        <td class="text-right"><strong>(5% discount only for registered users):</strong>
                                        </td>
                                        <td class="text-right">${{ discount.toFixed(2) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Total:</strong></td>
                                        <td class="text-right">${{ total.toFixed(2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="buttons clearfix">
                        <div class="pull-left"><a :href="route('home')" class="btn btn-default">Continue Shopping</a>
                        </div>
                        <div class="pull-right"><a :href="route('checkout')" class="btn btn-primary">Checkout</a></div>
                    </div>
                </div>
            </div>
        </div>
    </BazaarLayout>
</template>
