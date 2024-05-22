<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
    name: 'HomePage',
    components: {
		Head,
        BazaarLayout,
	},
}
</script>

<template>
    <Head title="Welcome" />

    <BazaarLayout>
        
		<section id="box-link1" class="section-style">
			<div class="container page-builder-ltr">
				<div class="row row-style row_a1">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_a1c  block block_3 title_neo1">
						<div class="module so-deals-1tr home1_deals so-deals">
							<div class="head-title">
								<h2 class="modtitle font-ct">
									<span>Hot Deals</span>
								</h2>
								<div class="cs-item-timer">
									<div class="Countdown-1"></div>
								</div>
							</div>

							<div class="container">
								<div class="row gap-3">
									<div class="col-md-4">
										<div class="transition product-layout">
											<!-- Item 1 content here -->
											<div class="item products-list grid">
												<div class="transition product-layout">
													<div class="product-item-container ">
														<div class="left-block so-quickview">
															<div class="image">
																<a href="product.html" target="_self">
																	<img src="theme/image/catalog/demo/product/travel/10-370x370.jpg"
																		alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo"
																		class="img-responsive">
																</a>
																<div class="text-location"><span>Thailand</span></div>
															</div>
															<div class="box-label">
																<span class="label-product label-sale">Sale</span>
															</div>
															<div class="button-group">
																<div class="button-inner so-quickview">
																	<a class="lt-image hidden" data-product="35"
																		href="#" target="_self"
																		title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo">
																	</a>
																	<a class="btn-button btn-quickview quickview quickview_handler"
																		href="quickview.html" title="Quick View"
																		data-title="Quick View"
																		data-fancybox-type="iframe"> <i
																			class="fa fa-search"></i> </a>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('35');"
																		data-original-title="Add to Wish List"><i
																			class="fa fa-heart"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('35');"
																		data-original-title="Compare this Product"><i
																			class="fa fa-exchange"></i></button>
																	<button class="addToCart btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('35');"
																		data-original-title="Add to Cart"> <span
																			class="hidden">Add to Cart</span></button>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html" target="_self"
																		title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo">Bougainvilleas
																		on Lombard Street, San Francisco, Tokyo</a></h4>
																<div class="total-price clearfix">
																	<div class="price price-left">
																		<span class="price-new">$108.80</span>
																		<span class="price-old">$122.00</span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">
																			-11%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="transition product-layout">
											<!-- Item 2 content here -->
											<div class="item products-list grid">
												<div class="transition product-layout">
													<div class="product-item-container ">
														<div class="left-block so-quickview">
															<div class="image">
																<a href="#" target="_self">
																	<img src="theme/image/catalog/demo/product/travel/2-370x370.jpg"
																		alt="Canada Travel One or Two European Facials at  Studio"
																		class="img-responsive">
																</a>
																<div class="text-location"><span>Ha Lan</span></div>
															</div>
															<div class="box-label">
																<span class="label-product label-sale">Sale</span>
															</div>
															<div class="button-group">
																<div class="button-inner so-quickview">
																	<a class="lt-image hidden" data-product="35"
																		href="#" target="_self"
																		title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo">
																	</a><a
																		class="btn-button btn-quickview quickview quickview_handler"
																		href="quickview.html" title="Quick View"
																		data-title="Quick View"
																		data-fancybox-type="iframe"><i
																			class="fa fa-search"></i></a>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('35');"
																		data-original-title="Add to Wish List"><i
																			class="fa fa-heart"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('35');"
																		data-original-title="Compare this Product"><i
																			class="fa fa-exchange"></i></button>
																	<button class="addToCart btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('35');"
																		data-original-title="Add to Cart"> <span
																			class="hidden">Add to Cart</span></button>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html" target="_self"
																		title="Canada Travel One or Two European Facials at  Studio">Canada
																		Travel One or Two European Facials at Studio</a>
																</h4>
																<div class="total-price clearfix">
																	<div class="price price-left">
																		<span class="price-new">$86.00</span>
																		<span class="price-old">$122.00</span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">
																			-30%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="transition product-layout">
											<!-- Item 3 content here -->
											<div class="item products-list grid">
												<div class="transition product-layout">
													<div class="product-item-container ">
														<div class="left-block so-quickview">
															<div class="image">
																<a href="product.html" target="_self">
																	<img src="theme/image/catalog/demo/product/travel/5-370x370.jpg"
																		alt="Chicago Tour Departure / Pattaya / Solimania..."
																		class="img-responsive">
																</a>
																<div class="text-location"><span>Canada</span></div>
															</div>
															<div class="box-label">
																<span class="label-product label-sale">Sale</span>
															</div>
															<div class="button-group">
																<div class="button-inner so-quickview">
																	<a class="lt-image hidden" data-product="35"
																		href="#" target="_self"
																		title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo">
																	</a><a
																		class="btn-button btn-quickview quickview quickview_handler"
																		href="quickview.html" title="Quick View"
																		data-title="Quick View"
																		data-fancybox-type="iframe"><i
																			class="fa fa-search"></i></a>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('35');"
																		data-original-title="Add to Wish List"><i
																			class="fa fa-heart"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('35');"
																		data-original-title="Compare this Product"><i
																			class="fa fa-exchange"></i></button>
																	<button class="addToCart btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('35');"
																		data-original-title="Add to Cart"> <span
																			class="hidden">Add to Cart</span></button>
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a href="product.html" target="_self"
																		title="Chicago Tour Departure / Pattaya / Solimania/ Tokyo/ Canada">Chicago
																		Tour Departure / Pattaya / Solimania...</a></h4>
																<div class="total-price clearfix">
																	<div class="price price-left">
																		<span class="price-new">$108.80</span>
																		<span class="price-old">$122.00</span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">
																			-11%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>


						</div>
						<div>
							<div class="home1-banner-2 clearfix">
								<div class="item-1 col-lg-6 col-md-6 col-sm-6 banners">
									<div>
										<a title="Static Image" href="#"><img
												src="theme/image/catalog/demo/banners/home1/bn-3.jpg"
												alt="Static Image"></a>
									</div>
								</div>
								<div class="item-2 col-lg-6 col-md-6 col-sm-6 banners">
									<div>
										<a title="Static Image" href="#"><img
												src="theme/image/catalog/demo/banners/home1/bn-4.jpg"
												alt="Static Image"></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>




		<section id="box-link3" class="section-style">
				<div class="container page-builder-ltr">
					<div class="row row-style row_a3">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_nvxr  block block_6 title_neo3">
							<div
								class="module so-listing-tabs-ltr home1-lt-style2 default-nav clearfix img-float home-lt1">
								<div class="head-title font-ct">
									<h2 class="modtitle">Fashion &amp; Accessories</h2>
								</div>
								<div class="modcontent">
									<div id="so_listing_tabs_2" class="so-listing-tabs first-load">
										<div class="ltabs-wrap">
											<div class="ltabs-tabs-container" data-delay="300" data-duration="600"
												data-effect="starwars" data-ajaxurl="" data-type_source="0" data-lg="3"
												data-md="3" data-sm="3" data-xs="2" data-margin="0">
												<div class="ltabs-tabs-wrap">
													<span class="ltabs-tab-selected">Best sellers</span>
													<span class="ltabs-tab-arrow">▼</span>
													<div class="item-sub-cat">
														<ul class="ltabs-tabs cf">
															<li class="ltabs-tab tab-sel" data-category-id="4"
																data-active-content=".items-category-4">
																<span class="ltabs-tab-label">Best sellers</span>
															</li>
															<li class="ltabs-tab" data-category-id="5"
																data-active-content=".items-category-5">
																<span class="ltabs-tab-label">New Arrivals</span>
															</li>
															<li class="ltabs-tab" data-category-id="6"
																data-active-content=".items-category-6">
																<span class="ltabs-tab-label">Most Rating</span>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<div class="wap-listing-tabs row">
												<div class="col-lg-3 banners">
													<div class="products-list grid">
														<a href="product.html" title="" target="_self">
															<img class="categories-loadimage" title="" alt=""
																src="theme/image/catalog/demo/banners/home1/md-banner-1.jpg">
														</a>
													</div>
												</div>
												<div class="col-lg-9">
													<div class="ltabs-items ltabs-items-selected items-category-4 "
														>
														<div class="ltabs-items-inner ltabs-slider row ">
															<div class="ltabs-item products-list grid col-lg-4">
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Amazing Yoga Sport Poses Most People Wouldn't Dream ">
																					<img src="theme/image/catalog/demo/product/fashion/10-270x270.jpg"
																						alt="Amazing Yoga Sport Poses Most People Wouldn't Dream ">
																				</a>
																			</div>
																			<div class="box-label">
																				<span
																					class="label-product label-sale">Sale</span>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Amazing Yoga Sport Poses Most People Wouldn't Dream "
																						target="_self">Amazing Yoga
																						Sport Poses Most People Wouldn't
																						Dre..</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$108.80</span>
																						<span
																							class="price-old">$122.00</span>
																					</div>
																					<div class="price-sale price-right">
																						<span
																							class="discount 123">-11%<strong>OFF</strong></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Amazing Yoga Sport Poses Most People Wouldn't Dream "></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Est Officia Including Shoes Beautiful Pieces Canaz">
																					<img src="theme/image/catalog/demo/product/fashion/15-270x270.png"
																						alt="Est Officia Including Shoes Beautiful Pieces Canaz">
																				</a>
																			</div>
																			<div class="box-label">
																				<span
																					class="label-product label-sale">Sale</span>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Est Officia Including Shoes Beautiful Pieces Canaz"
																						target="_self">Est Officia
																						Including Shoes Beautiful Pieces
																						Canaz</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$62.00</span>
																						<span
																							class="price-old">$337.99</span>
																					</div>
																					<div class="price-sale price-right">
																						<span
																							class="discount 123">-82%<strong>OFF</strong></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Est Officia Including Shoes Beautiful Pieces Canaz"></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="ltabs-item products-list grid col-lg-4">
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Girly Summer Outfit Ideas To Upgrade Your Wardrobe">
																					<img src="theme/image/catalog/demo/product/fashion/2-270x270.jpg"
																						alt="Girly Summer Outfit Ideas To Upgrade Your Wardrobe">
																				</a>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Girly Summer Outfit Ideas To Upgrade Your Wardrobe"
																						target="_self">Girly Summer
																						Outfit Ideas To Upgrade Your
																						Wardrob..</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$128.80</span>
																						<span class="price-old"></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Girly Summer Outfit Ideas To Upgrade Your Wardrobe"></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Cras idrisusiopsa quo voluptas nulla pariatur shoprer">
																					<img src="theme/image/catalog/demo/product/fashion/4-270x270.jpg"
																						alt="Cras idrisusiopsa quo voluptas nulla pariatur shoprer">
																				</a>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Cras idrisusiopsa quo voluptas nulla pariatur shoprer"
																						target="_self">Cras idrisusiopsa
																						quo voluptas nulla par...</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$242.00</span>
																						<span class="price-old"></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Cras idrisusiopsa quo voluptas nulla pariatur shoprer"></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="ltabs-item products-list grid col-lg-4">
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Invisible Hidden Spy Earphone Micro Wireless">
																					<img src="theme/image/catalog/demo/product/fashion/16-270x270.png"
																						alt="Invisible Hidden Spy Earphone Micro Wireless">
																				</a>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Invisible Hidden Spy Earphone Micro Wireless"
																						target="_self">Invisible Hidden
																						Spy Earphone Micro Wireless</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$122.00</span>
																						<span class="price-old"></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Invisible Hidden Spy Earphone Micro Wireless"></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div
																	class="item-inner product-layout transition product-grid">
																	<div class="product-item-container">
																		<div class="left-block">
																			<div class="image product-image-container ">
																				<a class="lt-image" href="#"
																					target="_self"
																					title="Est Officia Including Shoes Beautiful Pieces Canaz">
																					<img src="theme/image/catalog/demo/product/fashion/24-270x270.png"
																						alt="Est Officia Including Shoes Beautiful Pieces Canaz">
																				</a>
																			</div>
																			<div class="box-label">
																				<span
																					class="label-product label-sale">Sale</span>
																			</div>
																		</div>
																		<div class="right-block">
																			<div class="caption">
																				<h4>
																					<a href="product.html"
																						title="Est Officia Including Shoes Beautiful Pieces Canaz"
																						target="_self">Est Officia
																						Including Shoes Beautiful Pieces
																						Canaz</a>
																				</h4>
																				<div class="total-price clearfix">
																					<div class="price price-left">
																						<span
																							class="price-new">$98.00</span>
																						<span
																							class="price-old">$122.00</span>
																					</div>
																					<div class="price-sale price-right">
																						<span
																							class="discount 123">-20%<strong>OFF</strong></span>
																					</div>
																				</div>
																			</div>
																			<div class="button-group">
																				<div class="button-inner so-quickview">
																					<a class="lt-image hidden" href="#"
																						target="_self"
																						title="Est Officia Including Shoes Beautiful Pieces Canaz"></a>
																					<a class="btn-button btn-quickview quickview quickview_handler"
																						href="quickview.html"
																						title="Quick View"
																						data-title="Quick View"
																						data-fancybox-type="iframe">
																						<i class="fa fa-search"></i>
																					</a>
																					<button class="wishlist btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="wishlist.add('28');"
																						data-original-title="Add to Wish List">
																						<i class="fa fa-heart"></i>
																					</button>
																					<button class="compare btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="compare.add('28');"
																						data-original-title="Compare this Product">
																						<i class="fa fa-exchange"></i>
																					</button>
																					<button class="addToCart btn-button"
																						type="button"
																						data-toggle="tooltip" title=""
																						onclick="cart.add('28');"
																						data-original-title="Add to cart">
																						<span class="hidden">Add to
																							cart</span>
																					</button>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


	</BazaarLayout>
</template>