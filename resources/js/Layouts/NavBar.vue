<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

export default {
	name: 'NavBar',
    components: {
		Link,
        ApplicationLogo,
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
											<span class="items_cart">2 </span>
											<span class="items_cart2">item(s)</span>
											<span class="items_carts"> - $206.80</span>
										</span>
									</div>
								</div>
							</a>
							<ul class="dropdown-menu pull-right shoppingcart-box">
								<li class="content-item">
									<table class="table table-striped" style="margin-bottom:10px;">
										<tbody>
											<tr>
												<td class="text-center size-img-cart">
													<a href="product.html">
														<img src="http://bazaar.test/theme/image/catalog/demo/product/travel/10-54x54.jpg"
															alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
															title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
															class="img-thumbnail">
													</a>
												</td>
												<td class="text-left"><a href="product.html">Bougainvilleas on
														Lombard Street, San Francisco, Tokyo</a>
													<br> - <small>Size M</small>
												</td>
												<td class="text-right">x1</td>
												<td class="text-right">$120.80</td>
												<td class="text-center">
													<button type="button" title="Remove"
														class="btn btn-danger btn-xs"><i
															class="fa fa-trash-o"></i></button>
												</td>
											</tr>
										</tbody>
									</table>
									<table class="table table-striped" style="margin-bottom:10px;">
										<tbody>
											<tr>
												<td class="text-center size-img-cart">
													<a href="product.html"><img
															src="http://bazaar.test/theme/image/catalog/demo/product/travel/2-54x54.jpg"
															alt="Canada Travel One or Two European Facials at  Studio"
															title="Canada Travel One or Two European Facials at  Studio"
															class="img-thumbnail"></a>
												</td>
												<td class="text-left"><a href="product.html">Canada Travel One
														or Two European Facials at Studio</a>
													<br> - <small>Size M</small>
												</td>
												<td class="text-right">x1</td>
												<td class="text-right">$86.00</td>
												<td class="text-center">
													<button type="button" title="Remove"
														class="btn btn-danger btn-xs"><i
															class="fa fa-trash-o"></i></button>
												</td>
											</tr>
										</tbody>
									</table>
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