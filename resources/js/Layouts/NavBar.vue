<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';

export default {
	name: 'NavBar',
    components: {
		Link,
        ApplicationLogo,
	},
    data() {
        return {
            carts: [],
		}
	},
	mounted() {
		this.carts = usePage().props.ziggy.cart;
		console.log(this.carts, 'Ziggy');
	},
	computed: {
		totalPrice() {
			return this.carts.reduce((total, cart) => total + cart.product.price * cart.quantity, 0);
		},
	},
	methods: {
		removeFromCart(cartId) {
			axios.delete(`/cart/${cartId}`)
				.then(response => {
					this.carts = this.carts.filter(cart => cart.id !== cartId);
				})
				.catch(error => {
					console.error('There was an error removing the item from the cart!', error);
				});
		},
	},
}
</script>

<template>

	<!-- Header Top -->
	<div class="header-top hidden-compact">
		<div class="container">
			<div class="row flex items-center">
				<div class="col-lg-3 col-xs-6 header-logo ">
					<div class="navbar-logo">
						<Link href="/">
							<ApplicationLogo class="!justify-start" />
						</Link>
					</div>
				</div>
				<div class="col-lg-7 header-sevices">
					<div class="module html--sevices ">
						<div class="clearfix sevices-menu">
							<ul>
								<li class="col-md-4 item home">
									<div class="icon"></div>
									<div class="text">
										<a>Virtual University, Lahore, Punjab</a><a>
										</a>
										<p><a>PO 54840, Pakistan</a></p>
										<a>
										</a>
									</div>
								</li>
								<li class="col-md-4 item mail">
									<div class="icon"> </div>
									<div class="text">
										<a class="name" href="#">sales@bazaar.com</a>
										<p>( +123 ) 456 7890</p>
									</div>
								</li>
								<li class="col-md-4 item delivery">
									<div class="icon"> </div>
									<div class="text">
										<a class="name" href="#">Free Delivery</a>
										<p>On order over 2000.00 rupees</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-xs-6 header-cart">
					<div class="shopping_cart">
						<div id="cart" class="btn-shopping-cart">
							<a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle"
								data-toggle="dropdown">
								<div class="shopcart">
									<span class="handle pull-left"></span>
									<div class="cart-info">
										<h2 class="title-cart">Shopping cart</h2>
										<h2 class="title-cart2 hidden">My Cart</h2>
										<span class="total-shopping-cart cart-total-full">
											<span class="items_cart">{{ carts.length }} </span>
											<span class="items_cart2"> item(s)</span>
											<span class="items_carts"> - ${{ totalPrice }}</span>
										</span>
									</div>
								</div>
							</a>
							<ul class="dropdown-menu pull-right shoppingcart-box">
								<li class="content-item">
									<template v-for="cart in carts" :key="cart.id">
										<table class="table table-striped" style="margin-bottom:10px;">
											<tbody>
												<tr>
													<td class="text-center size-img-cart">
														<a :href="route('single_product', cart.product.id)">
															<img :src="cart.product.image"
																:alt="cart.product.product_name"
																:title="cart.product.product_name"
																class="img-thumbnail">
														</a>
													</td>
													<td class="text-left">
														<a :href="route('single_product', cart.product.id)">
															{{ cart.product.product_name }}
														</a>
														<br> - <small>{{ cart.product.product_id }}</small>
													</td>
													<td class="text-right">x1</td>
													<td class="text-right">${{ cart.product.price }}</td>
													<td class="text-center">
														<button type="button" title="Remove"
															class="btn btn-danger btn-xs"
															@click="removeFromCart(cart.id)">
															<i class="fa fa-trash-o"></i>
														</button>
													</td>
												</tr>
											</tbody>
										</table>
									</template>
									<li v-if="carts.length === 0">
										<p class="text-center">Your cart is empty</p>
									</li>
								</li>
								<li>
									<div class="checkout clearfix">
										<a :href="route('view_cart')" class="btn btn-view-cart inverse"> View Cart</a>
										<a :href="route('checkout')" class="btn btn-checkout pull-right">Checkout</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Header Top -->
</template>