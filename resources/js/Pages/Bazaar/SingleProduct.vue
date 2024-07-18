<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
	name: 'SingleProduct',
	components: {
		Head,
		BazaarLayout,
	},
	props: {
		product: Object,
	},
	data() {
		return {
			reviews: 0,
			totalReviews: 0,
			currentImage: 'storage/product_images/demo.jpeg',
			review: {
				text: '',
				rating: '',
				product_id: '',
				images: [], // Array to store selected images
			}
		}
	},
	mounted() {
		this.currentImage = this.product.images.length > 0 ? this.product.images[0].path : 'storage/product_images/demo.jpeg';
		this.review.product_id = this.product.id;
		this.getReviews();
	},
	methods: {
		handleFileUpload(event) {
			const files = event.target.files;
			for (let i = 0; i < files.length; i++) {
				this.review.images.push(files[i]);
			}
		},
		getReviews() {
			axios.get(`/review/${this.review.product_id}`)
			.then(response => {
				this.rating = response.data.averageRating;
				this.totalReviews = response.data.reviews;
				console.log(response.data);
			})
			.catch(error => {
				console.error(error);
			});
		},
		submitReview() {
			let formData = new FormData();
			formData.append('review_description', this.review.text);
			formData.append('rating', this.review.rating);
			formData.append('product_id', this.review.product_id);
			for (let i = 0; i < this.review.images.length; i++) {
				formData.append('images[]', this.review.images[i]);
			}

			axios.post('/review', formData, {
				headers: {
				'Content-Type': 'multipart/form-data'
				}
			})
			.then(response => {
				console.log(response.data);
				this.getReviews();
			})
			.catch(error => {
				console.error(error);
			});
		},
		changeCurrentImage(newUrl) {
			this.currentImage = newUrl;
		}
	},
}
</script>

<template>

	<Head title="Single Product" />

	<BazaarLayout>

		<!-- Main Container  -->
		<div class="breadcrumbs">
			<div class="container">
				<ul class="breadcrumb-cate">
					<li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
					<li><a href="javascript:void(0);">{{ product.product_name }}</a></li>
				</ul>
			</div>
		</div>
		<div class="container product-detail">
			<div class="row">
				<div id="content" class="col-md-12 col-sm-12 col-xs-12">
					<div class="product-view product-detail">
						<div class="product-view-inner clearfix">
							<div class="content-product-left  col-md-5 col-sm-6 col-xs-12">
								<div class="so-loadeding"></div>
								<div id="thumb-slider" class="thumb-vertical-outer">
									<span class="btn-more prev-thumb nt"><i class="fa fa-chevron-up"></i></span>
									<span class="btn-more next-thumb nt"><i class="fa fa-chevron-down"></i></span>
									<ul class="thumb-vertical">
										<template v-for="image in product.images" :key="image.id">
											<li class="image-additional">
												<a data-index="0" class="img thumbnail"
													href="javascript:void(0);" @click="changeCurrentImage(image.path)"
													:title="product.product_name">
													<img :src="`${image.path}`" 
														:title="product.product_name" 
														:alt="product.product_name" />
												</a>
											</li>
										</template>
									</ul>
								</div>
								<div class="large-image class-honizol h-[350px] items-center justify-center border shadow overflow-hidden rounded-md" style="display: flex;">
									<img class="product-image-zoom" style="height: -webkit-fill-available;"
										:src="`${currentImage}`"
										:data-zoom-image="`http://bazaar.test/${currentImage}`"
										:title="product.product_name"
										:alt="product.product_name">
								</div>
							</div>
							<div class="content-product-right col-md-7 col-sm-6 col-xs-12">
								<div class="countdown_box">
									<div class="countdown_inner">
										<div class="Countdown-1">
										</div>
									</div>
								</div>
								<div class="title-product">
									<h1>{{ product.product_name }}</h1>
								</div>
								<div class="box-review">
									<div class="rating">
										<div class="rating-box">
										<span class="fa fa-stack" v-for="n in 5" :key="n">
											<i class="fa fa-star-o fa-stack-1x"></i>
											<i class="fa fa-star fa-stack-1x" v-if="n <= this.rating"></i>
										</span>
										</div>
									</div>
									<a class="reviews_button"
										onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">{{ this.totalReviews }}
										reviews</a> / <a class="write_review_button"
										onclick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a
										review</a>
								</div>
								<div class="product_page_price price" itemscope="" itemtype="http://data-vocabulary.org/Offer">
									<span v-if="product.sale_price" class="price-new">
										<span id="price-special">${{ product.sale_price }}</span>
									</span>
									<span v-if="product.sale_price" class="price-old">
										<span id="price-old">${{ product.price }}</span>
									</span>
									<span v-else class="price-new">
										<span id="price-special">${{ product.price }}</span>
									</span>
								</div>

								<div class="product-box-desc">
									<div class="inner-box-desc">
										<div class="brand"><span>Category: </span><a href="javascript:void(0);">{{ product.category.category_name ?? '' }}</a>, <a href="javascript:void(0);">{{ product.category.parent_category.category_name ?? '' }}</a></div>
										<div class="brand"><span>Brand: </span><a href="#">{{ product.brand.brand_name }}</a></div>
										<div class="model"><span>Product Code: </span>{{ product.product_id }}</div>
										<div class="stock"><span>Availability:</span>
											<i :class="{ 'text-[#63c54c]': product.stock > 0, 'text-red-500': product.stock <= 0 }">
												<i class="fa fa-check-square-o" v-if="product.stock > 0"></i>
												<i class="fa fa-times" v-else></i>
												{{ product.stock > 0 ? 'In Stock' : 'Out of Stock' }}
											</i>
										</div>
									</div>
								</div>
								<div class="short_description form-group">
									<h3>OverView</h3>
								</div>
								<div id="product">
									<div class="box-cart clearfix">
										<div class="form-group box-info-product">
											<div class="option quantity">
												<div class="input-group quantity-control" unselectable="on"
													style="user-select: none;">
													<input class="form-control" type="text" name="quantity" value="1">
													<input type="hidden" name="product_id" value="108">
													<span
														class="input-group-addon product_quantity_down fa fa-caret-down"></span>
													<span
														class="input-group-addon product_quantity_up fa fa-caret-up"></span>
												</div>
											</div>
											<div class="cart">
												<input type="button" value="Add to Cart"
													class="addToCart btn btn-mega btn-lg " data-toggle="tooltip"
													title="" onclick="cart.add('30');"
													data-original-title="Add to cart">
											</div>
											<div class="add-to-links wish_comp">
												<ul class="blank">
													<li class="wishlist">
														<a onclick="wishlist.add(108);"><i class="fa fa-heart"></i></a>
													</li>
													<li class="compare">
														<a onclick="compare.add(108);"><i class="fa fa-random"></i></a>
													</li>
												</ul>
											</div>
										</div>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="product-attribute module">
						<div class="row content-product-midde clearfix">
							<div class="col-xs-12">
								<div class="producttab ">
									<div class="tabsslider  ">
										<ul class="nav nav-tabs font-sn">
											<li class="active"><a data-toggle="tab"
													href="#tab-description">Description</a></li>
											<li><a href="#tab-review" data-toggle="tab">Reviews (0)</a></li>
										</ul>
										<div class="tab-content ">
											<div class="tab-pane active" id="tab-description">
												<div style="text-align: justify; text-justify: inter-word;">
													{{ product }}
												</div>
											</div>
											<div class="tab-pane" id="tab-review">
												<form class="form-horizontal" id="form-review" @submit.prevent="submitReview">
													<div id="review">
														<p>There are no reviews for this product.</p>
													</div>
													<h2>Write a review</h2>
													<div class="form-group required">
														<div class="col-sm-12">
															<label class="control-label" for="input-review">Your Review</label>
															<textarea v-model="review.text" rows="5" id="input-review" class="form-control"></textarea>
															<div class="help-block">
																<span class="text-danger">Note:</span> Maximum Words 100-200!
															</div>
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<label class="control-label">Rating</label>
															&nbsp;&nbsp;&nbsp; Bad&nbsp;
															<input type="radio" v-model="review.rating" value="1">
															&nbsp;
															<input type="radio" v-model="review.rating" value="2">
															&nbsp;
															<input type="radio" v-model="review.rating" value="3">
															&nbsp;
															<input type="radio" v-model="review.rating" value="4">
															&nbsp;
															<input type="radio" v-model="review.rating" value="5">
															&nbsp;Good
														</div>
													</div>
													<div class="form-group required">
														<div class="col-sm-12">
															<label class="control-label">Rating</label>
															&nbsp;&nbsp;&nbsp; Bad&nbsp;
															<input type="radio" name="rating" value="1">
															&nbsp;
															<input type="radio" name="rating" value="2">
															&nbsp;
															<input type="radio" name="rating" value="3">
															&nbsp;
															<input type="radio" name="rating" value="4">
															&nbsp;
															<input type="radio" name="rating" value="5">
															&nbsp;Good
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-12">
															<label class="control-label" for="input-images">Upload Images</label>
															<input type="file" multiple @change="handleFileUpload" class="form-control" id="input-images">
														</div>
													</div>
													<div class="buttons clearfix" style="visibility: hidden; display: block;">
														<div class="pull-right">
															<button type="submit" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="content-product-bottom bottom-product clearfix hidden">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#product-related">Related Products</a></li>
							<li><a data-toggle="tab" href="#product-upsell">UPSELL PRODUCTS</a></li>
						</ul>
						<div class="tab-content">
							<div id="product-related" class="tab-pane fade in active">
								<div class="clearfix module horizontal">
									<div class="products-category">
										<div class="products-list grid">
											<div class="row">
												<div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img  ">
																<a :href="route('products')"
																	title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium ">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/26.jpg "
																		alt="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																		title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																		class="img-1 img-responsive">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/30.jpg"
																		alt="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																		title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																		class="img-2 img-responsive">
																</a>
															</div>
															<div class="countdown_box">
																<div class="countdown_inner">
																</div>
															</div>
															<div class="box-label">
																<span class="label-product label-sale">
																	Sale
																</span>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a :href="route('products')">Lorem Ipsum dolor at
																		vero eos et iusto odi with Premium </a></h4>
																<div class="total-price">
																	<div class="price price-left">
																		<span class="price-new">$98.00 </span> <span
																			class="price-old">$122.00 </span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">-20%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>
																<div class="description item-desc hidden">
																	<p>The 30-inch Apple Cinema HD Display delivers an
																		amazing 2560 x 1600 pixel resolution. Designed
																		specifically for the creative professional, this
																		display provides more space for easier access to
																		all the.. </p>
																</div>
																<div class="list-block hidden">
																	<button class="addToCart" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('30 ', '1 ');"
																		data-original-title="Add to Cart "><span>Add to
																			Cart </span></button>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('30 ');"
																		data-original-title="Add to Wish List "><i
																			class="fa fa-heart-o"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('30 ');"
																		data-original-title="Compare this Product "><i
																			class="fa fa-retweet"></i></button>
																</div>
															</div>
															<div class="button-group">
																<a class="quickview iframe-link visible-lg btn-button"
																	data-fancybox-type="iframe" href="quickview.html">
																	<i class="fa fa-search"></i> </a>
																<button class="wishlist btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="wishlist.add('105');"
																	data-original-title="Add to Wish List"><i
																		class="fa fa-heart-o"></i></button>
																<button class="compare btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="compare.add('105');"
																	data-original-title="Compare this Product"><i
																		class="fa fa-retweet"></i></button>
																<button class="addToCart btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="cart.add('105', '2');"
																	data-original-title="Add to Cart"><span
																		class="hidden">Add to Cart </span></button>
															</div>
														</div>
													</div>
												</div>
												<div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img  ">
																<a :href="route('products')"
																	title="Computer Science saepe eveniet ut et volu redae ">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/23.jpg "
																		alt="Computer Science saepe eveniet ut et volu redae "
																		title="Computer Science saepe eveniet ut et volu redae "
																		class="img-1 img-responsive">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/15.jpg"
																		alt="Computer Science saepe eveniet ut et volu redae "
																		title="Computer Science saepe eveniet ut et volu redae "
																		class="img-2 img-responsive">
																</a>
																<div class="box-label">
																	<span class="label-product label-sale">
																		Sale
																	</span>
																</div>
															</div>
															<div class="countdown_box">
																<div class="countdown_inner">
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a :href="route('products')">Computer Science saepe
																		eveniet ut et volu redae </a></h4>
																<div class="total-price">
																	<div class="price price-left">
																		<span class="price-new">$119.60 </span> <span
																			class="price-old">$122.00 </span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">-2%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>

																<div class="description item-desc hidden">
																	<p>Born to be worn.

																		Clip on the worlds most wearable music player
																		and take up to 240 songs with you anywhere.
																		Choose from five colors including four new hues
																		to make your musical fashion statement... </p>
																</div>
																<div class="list-block hidden">
																	<button class="addToCart" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('30 ', '1 ');"
																		data-original-title="Add to Cart "><span>Add to
																			Cart </span></button>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('30 ');"
																		data-original-title="Add to Wish List "><i
																			class="fa fa-heart-o"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('30 ');"
																		data-original-title="Compare this Product "><i
																			class="fa fa-retweet"></i></button>
																</div>
															</div>
															<div class="button-group">
																<a class="quickview iframe-link visible-lg btn-button"
																	data-fancybox-type="iframe"> <i
																		class="fa fa-search"></i> </a>
																<button class="wishlist btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="wishlist.add('58');"
																	data-original-title="Add to Wish List"><i
																		class="fa fa-heart-o"></i></button>
																<button class="compare btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="compare.add('58');"
																	data-original-title="Compare this Product"><i
																		class="fa fa-retweet"></i></button>
																<button class="addToCart btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="cart.add('58', '1');"
																	data-original-title="Add to Cart"><span
																		class="hidden">Add to Cart </span></button>
															</div>
														</div>

													</div>
												</div>
												<div class="clearfix visible-sm-block"></div>
												<div class="product-layout  col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
													<div class="product-item-container">
														<div class="left-block">
															<div class="product-image-container  second_img  ">
																<a title="Compact Portable Charger External ">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/22.jpg "
																		alt="Compact Portable Charger External "
																		title="Compact Portable Charger External "
																		class="img-1 img-responsive">
																	<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/23.jpg"
																		alt="Compact Portable Charger External "
																		title="Compact Portable Charger External "
																		class="img-2 img-responsive">
																</a>
																<div class="box-label">
																	<span class="label-product label-sale">
																		Sale
																	</span>
																</div>
															</div>
															<div class="countdown_box">
																<div class="countdown_inner">
																</div>
															</div>
														</div>
														<div class="right-block">
															<div class="caption">
																<h4><a :href="route('products')">Compact Portable
																		Charger External </a></h4>
																<div class="total-price">
																	<div class="price price-left">
																		<span class="price-new">$962.00 </span> <span
																			class="price-old">$1,202.00 </span>
																	</div>
																	<div class="price-sale price-right">
																		<span class="discount">-20%
																			<strong>OFF</strong>
																		</span>
																	</div>
																</div>
																<div class="description item-desc hidden">
																	<p>Born to be worn.

																		Clip on the worlds most wearable music player
																		and take up to 240 songs with you anywhere.
																		Choose from five colors including four new hues
																		to make your musical fashion statement... </p>
																</div>
																<div class="list-block hidden">
																	<button class="addToCart" type="button"
																		data-toggle="tooltip" title=""
																		onclick="cart.add('30 ', '1 ');"
																		data-original-title="Add to Cart "><span>Add to
																			Cart </span></button>
																	<button class="wishlist btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="wishlist.add('30 ');"
																		data-original-title="Add to Wish List "><i
																			class="fa fa-heart-o"></i></button>
																	<button class="compare btn-button" type="button"
																		data-toggle="tooltip" title=""
																		onclick="compare.add('30 ');"
																		data-original-title="Compare this Product "><i
																			class="fa fa-retweet"></i></button>
																</div>
															</div>
															<div class="button-group">
																<a class="quickview iframe-link visible-lg btn-button"
																	data-fancybox-type="iframe" href="quickview.html">
																	<i class="fa fa-search"></i> </a>
																<button class="wishlist btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="wishlist.add('61');"
																	data-original-title="Add to Wish List"><i
																		class="fa fa-heart-o"></i></button>
																<button class="compare btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="compare.add('61');"
																	data-original-title="Compare this Product"><i
																		class="fa fa-retweet"></i></button>
																<button class="addToCart btn-button" type="button"
																	data-toggle="tooltip" title=""
																	onclick="cart.add('61', '1');"
																	data-original-title="Add to Cart"><span
																		class="hidden">Add to Cart </span></button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
							<div id="product-upsell" class="tab-pane fade in">
								<div class="products-list grid">
									<div class="row">
										<div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container  second_img  ">
														<a :href="route('products')"
															title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium ">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/26.jpg "
																alt="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																class="img-1 img-responsive">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/30.jpg"
																alt="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																title="Lorem Ipsum dolor at vero eos et iusto odi  with Premium "
																class="img-2 img-responsive">
														</a>
													</div>
													<div class="countdown_box">
														<div class="countdown_inner">
														</div>
													</div>
													<div class="box-label">
														<span class="label-product label-sale">
															Sale
														</span>
													</div>
												</div>

												<div class="right-block">
													<div class="caption">
														<h4><a :href="route('products')">Lorem Ipsum dolor at vero eos
																et iusto odi with Premium </a></h4>
														<div class="total-price">
															<div class="price price-left">
																<span class="price-new">$98.00 </span> <span
																	class="price-old">$122.00 </span>
															</div>
															<div class="price-sale price-right">
																<span class="discount">-20%
																	<strong>OFF</strong>
																</span>
															</div>
														</div>
														<div class="description item-desc hidden">
															<p>The 30-inch Apple Cinema HD Display delivers an amazing
																2560 x 1600 pixel resolution. Designed specifically for
																the creative professional, this display provides more
																space for easier access to all the.. </p>
														</div>
														<div class="list-block hidden">
															<button class="addToCart" type="button"
																data-toggle="tooltip" title=""
																onclick="cart.add('30 ', '1 ');"
																data-original-title="Add to Cart "><span>Add to Cart
																</span></button>
															<button class="wishlist btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="wishlist.add('30 ');"
																data-original-title="Add to Wish List "><i
																	class="fa fa-heart-o"></i></button>
															<button class="compare btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="compare.add('30 ');"
																data-original-title="Compare this Product "><i
																	class="fa fa-retweet"></i></button>
														</div>
													</div>
													<div class="button-group">
														<a class="quickview iframe-link visible-lg btn-button"
															data-fancybox-type="iframe" href="quickview.html"> <i
																class="fa fa-search"></i> </a>
														<button class="wishlist btn-button" type="button"
															data-toggle="tooltip" title=""
															onclick="wishlist.add('105');"
															data-original-title="Add to Wish List"><i
																class="fa fa-heart-o"></i></button>
														<button class="compare btn-button" type="button"
															data-toggle="tooltip" title="" onclick="compare.add('105');"
															data-original-title="Compare this Product"><i
																class="fa fa-retweet"></i></button>
														<button class="addToCart btn-button" type="button"
															data-toggle="tooltip" title=""
															onclick="cart.add('105', '2');"
															data-original-title="Add to Cart"><span class="hidden">Add
																to Cart </span></button>
													</div>
												</div>
											</div>
										</div>
										<div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container  second_img  ">
														<a :href="route('products')"
															title="Computer Science saepe eveniet ut et volu redae ">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/23.jpg "
																alt="Computer Science saepe eveniet ut et volu redae "
																title="Computer Science saepe eveniet ut et volu redae "
																class="img-1 img-responsive">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/15.jpg"
																alt="Computer Science saepe eveniet ut et volu redae "
																title="Computer Science saepe eveniet ut et volu redae "
																class="img-2 img-responsive">
														</a>
														<div class="box-label">
															<span class="label-product label-sale">
																Sale
															</span>
														</div>
													</div>
													<div class="countdown_box">
														<div class="countdown_inner">
														</div>
													</div>
												</div>
												<div class="right-block">
													<div class="caption">
														<h4><a :href="route('products')">Computer Science saepe eveniet
																ut et volu redae </a></h4>
														<div class="total-price">
															<div class="price price-left">
																<span class="price-new">$119.60 </span> <span
																	class="price-old">$122.00 </span>
															</div>
															<div class="price-sale price-right">
																<span class="discount">-2%
																	<strong>OFF</strong>
																</span>
															</div>
														</div>

														<div class="description item-desc hidden">
															<p>Born to be worn.

																Clip on the worlds most wearable music player and take
																up to 240 songs with you anywhere. Choose from five
																colors including four new hues to make your musical
																fashion statement... </p>
														</div>
														<div class="list-block hidden">
															<button class="addToCart" type="button"
																data-toggle="tooltip" title=""
																onclick="cart.add('30 ', '1 ');"
																data-original-title="Add to Cart "><span>Add to Cart
																</span></button>
															<button class="wishlist btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="wishlist.add('30 ');"
																data-original-title="Add to Wish List "><i
																	class="fa fa-heart-o"></i></button>
															<button class="compare btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="compare.add('30 ');"
																data-original-title="Compare this Product "><i
																	class="fa fa-retweet"></i></button>
														</div>
													</div>
													<div class="button-group">
														<a class="quickview iframe-link visible-lg btn-button"
															data-fancybox-type="iframe"> <i class="fa fa-search"></i>
														</a>
														<button class="wishlist btn-button" type="button"
															data-toggle="tooltip" title="" onclick="wishlist.add('58');"
															data-original-title="Add to Wish List"><i
																class="fa fa-heart-o"></i></button>
														<button class="compare btn-button" type="button"
															data-toggle="tooltip" title="" onclick="compare.add('58');"
															data-original-title="Compare this Product"><i
																class="fa fa-retweet"></i></button>
														<button class="addToCart btn-button" type="button"
															data-toggle="tooltip" title=""
															onclick="cart.add('58', '1');"
															data-original-title="Add to Cart"><span class="hidden">Add
																to Cart </span></button>
													</div>
												</div>

											</div>
										</div>
										<div class="clearfix visible-sm-block"></div>
										<div class="product-layout  col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<div class="product-item-container">
												<div class="left-block">
													<div class="product-image-container  second_img  ">
														<a title="Compact Portable Charger External ">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/22.jpg "
																alt="Compact Portable Charger External "
																title="Compact Portable Charger External "
																class="img-1 img-responsive">
															<img src="http://bazaar.test/theme/image/catalog/demo/product/electronic/23.jpg"
																alt="Compact Portable Charger External "
																title="Compact Portable Charger External "
																class="img-2 img-responsive">
														</a>
														<div class="box-label">
															<span class="label-product label-sale">
																Sale
															</span>
														</div>
													</div>
													<div class="countdown_box">
														<div class="countdown_inner">
														</div>
													</div>
												</div>
												<div class="right-block">
													<div class="caption">
														<h4><a :href="route('products')">Compact Portable Charger
																External </a></h4>
														<div class="total-price">
															<div class="price price-left">
																<span class="price-new">$962.00 </span> <span
																	class="price-old">$1,202.00 </span>
															</div>
															<div class="price-sale price-right">
																<span class="discount">-20%
																	<strong>OFF</strong>
																</span>
															</div>
														</div>
														<div class="description item-desc hidden">
															<p>Born to be worn.

																Clip on the worlds most wearable music player and take
																up to 240 songs with you anywhere. Choose from five
																colors including four new hues to make your musical
																fashion statement... </p>
														</div>
														<div class="list-block hidden">
															<button class="addToCart" type="button"
																data-toggle="tooltip" title=""
																onclick="cart.add('30 ', '1 ');"
																data-original-title="Add to Cart "><span>Add to Cart
																</span></button>
															<button class="wishlist btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="wishlist.add('30 ');"
																data-original-title="Add to Wish List "><i
																	class="fa fa-heart-o"></i></button>
															<button class="compare btn-button" type="button"
																data-toggle="tooltip" title=""
																onclick="compare.add('30 ');"
																data-original-title="Compare this Product "><i
																	class="fa fa-retweet"></i></button>
														</div>
													</div>
													<div class="button-group">
														<a class="quickview iframe-link visible-lg btn-button"
															data-fancybox-type="iframe" href="quickview.html"> <i
																class="fa fa-search"></i> </a>
														<button class="wishlist btn-button" type="button"
															data-toggle="tooltip" title="" onclick="wishlist.add('61');"
															data-original-title="Add to Wish List"><i
																class="fa fa-heart-o"></i></button>
														<button class="compare btn-button" type="button"
															data-toggle="tooltip" title="" onclick="compare.add('61');"
															data-original-title="Compare this Product"><i
																class="fa fa-retweet"></i></button>
														<button class="addToCart btn-button" type="button"
															data-toggle="tooltip" title=""
															onclick="cart.add('61', '1');"
															data-original-title="Add to Cart"><span class="hidden">Add
																to Cart </span></button>
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
		<!-- //Main Container -->
	</BazaarLayout>
</template>

<style scoped>
.breadcrumbs {
	margin-top: 0;
	padding: 8px 0 7px;
	margin-bottom: 30px;
	color: #ff5e00;
	background: none;
	text-align: left;
}

.breadcrumbs .breadcrumb-cate li a {
	color: #ff5e00;
}

.breadcrumbs .breadcrumb-cate li:not(:last-child):before {
	content: "|";
	color: #000;
}
</style>