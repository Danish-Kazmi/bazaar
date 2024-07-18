<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
	name: 'Products',
	components: {
		Head,
		BazaarLayout,
	},
	props: {
        brands: Array,
        category_id: String,
		searchQuery: String
	},
	data() {
		return {
			products: [],
			total: 0,
			skip: 0,
			take: 12,
            currentPage: 1,
			totalPages: 1,
			sort: 'default',
			search: '',
            categoryId: null,
			brandId: null,
            minPrice: 0,  // Set default min price
            maxPrice: 100000, // Set default max price
		};
	},
	mounted() {
        this.categoryId = this.category_id;
		this.search = this.searchQuery;
		this.fetchProducts();
	},
	methods: {
		fetchProducts() {
			axios.get('/api/products', {
				params: {
					skip: this.skip,
					take: this.take,
					sort: this.sort,
					search: this.search,
                    category_id: this.categoryId,
					brand_id: this.brandId,
                    min_price: this.minPrice,
                    max_price: this.maxPrice,
				}
			})
			.then(response => {
				this.products = response.data.products;
				this.total = response.data.total;
				this.totalPages = Math.ceil(this.total / this.take);
			})
			.catch(error => {
				console.error('There was an error fetching the products!', error);
			});
		},
		changePage(page) {
			this.currentPage = page;
			this.skip = (this.currentPage - 1) * this.take;
			this.fetchProducts();
		},
		addToCart(productId) {
            axios.post('/cart/add', {
                item_id: productId,
                quantity: 1 // or the quantity you want to add
            })
            .then(response => {
                // this.$emit('cart-updated', response.data.cartItem); // Emit event to update cart if necessary
                alert(response.data.message); // Show success message
            })
            .catch(error => {
                console.error('There was an error adding the item to the cart!', error);
                alert('There was an error adding the item to the cart!');
            });
		},
		addToWishlist(productId) {
			// Add to wishlist logic
		},
		addToCompare(productId) {
			// Add to compare logic
		},
		changeBrand(b_id) {
			this.brandId = b_id;
			this.fetchProducts();
		},
		resetAll() {
            this.$inertia.get('/products');
		}
	}
}
</script>

<template>

	<Head title="Products" />

	<BazaarLayout>
		<!-- Main Container  -->
		<div class="breadcrumbs">
			<div class="container">
				<ul class="breadcrumb-cate">
					<li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
					<li><a href="javascript:void(0);">Products</a></li>
				</ul>
			</div>
		</div>
		<div class="container product-detail">
			<div class="row">
				<aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas">
					<span id="close-sidebar" class="fa fa-times"></span>
					<div class="module so_filter_wrap filter-horizontal">
						<h3 class="modtitle"><span>SHOP BY</span></h3>
						<div class="modcontent">
							<ul>
								<li class="so-filter-options" data-option="search">
									<div class="so-filter-heading">
										<div class="so-filter-heading-text">
											<span>Search</span>
										</div>
										<!-- <i class="fa fa-chevron-down"></i> -->
									</div>

									<div class="so-filter-content-opts">
										<div class="so-filter-content-opts-container">
											<div class="so-filter-option" data-type="search">
												<div class="so-option-container">
													<div class="input-group">
														<input type="text" class="form-control" name="text_search"
															id="text_search" v-model="search">
														<div class="input-group-btn">
															<button class="btn btn-default" type="button"
																id="submit_text_search" @click="fetchProducts">
																<i class="fa fa-search"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<!-- <li class="so-filter-options" data-option="Size">
									<div class="so-filter-heading">
										<div class="so-filter-heading-text">
											<span>Size</span>
										</div>
										<i class="fa fa-chevron-down"></i>
									</div>
									<div class="so-filter-content-opts" style="display: block;">
										<div class="so-filter-content-opts-container">
											<div class="so-filter-option opt-select  opt_enable" data-type="option"
												data-option_value="46" data-count_product="1" data-list_product="111">
												<div class="so-option-container">
													<div class="option-input">
														<span class="fa fa-square-o">
														</span>
													</div>
													<label>S</label>
													<div class="option-count ">
														<span>1</span>
														<i class="fa fa-times"></i>
													</div>
												</div>
											</div>
											<div class="so-filter-option opt-select  opt_enable" data-type="option"
												data-option_value="47" data-count_product="1" data-list_product="111">
												<div class="so-option-container">
													<div class="option-input">
														<span class="fa fa-square-o">
														</span>
													</div>
													<label>M</label>
													<div class="option-count ">
														<span>1</span>
														<i class="fa fa-times"></i>
													</div>
												</div>
											</div>
											<div class="so-filter-option opt-select  opt_enable" data-type="option"
												data-option_value="48" data-count_product="1" data-list_product="111">
												<div class="so-option-container">
													<div class="option-input">
														<span class="fa fa-square-o">
														</span>
													</div>
													<label>L</label>
													<div class="option-count ">
														<span>1</span>
														<i class="fa fa-times"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li> -->
								<li class="so-filter-options" data-option="Brand">
									<div class="so-filter-heading">
										<div class="so-filter-heading-text">
											<span>Brand</span>
										</div>
										<!-- <i class="fa fa-chevron-down"></i> -->
									</div>

									<div class="so-filter-content-opts">
										<div class="so-filter-content-opts-container">
											<template v-for="brand in brands" :key="brand.id">
												<div class="so-filter-option opt-select opt_enable"
													:data-type="Brand" :data-brand_id="brand.id" @click="changeBrand(brand.id)">
													<div class="so-option-container">
														<label style="display: flex; gap: 15px; align-items:center;">
															<img :src="`${brand.Image}`" style="width: 40px; height: 40px;">
															{{ brand.brand_name }}
														</label>
													</div>
												</div>
											</template>
										</div>
									</div>
								</li>
								<li class="so-filter-options" data-option="Price">
									<div class="so-filter-heading">
										<div class="so-filter-heading-text">
											<span>Price</span>
										</div>
										<!-- <i class="fa fa-chevron-down"></i> -->
									</div>
									<div class="so-filter-content-opts">
										<div class="so-filter-content-opts-container">
											<div class="so-filter-content-wrapper so-filter-iscroll">
												<div class="so-filter-options">
													<div class="so-filter-option so-filter-price">
														<div class="content_min_max">
															<div class="put-min put-min_max">
																$ <input type="number" class="input_min form-control" @blur="fetchProducts()"
																	v-model="minPrice" min="0" max="9999999999" style="width: 80px; max-width: 80px;">
															</div>
															<div class="put-max put-min_max">
																$ <input type="number" class="input_max form-control" @blur="fetchProducts()"
																	v-model="maxPrice" min="1" max="10000000000" style="width: 80px; max-width: 80px;">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
							<div class="clear_filter">
								<!-- <a href="javascript:void(0);" class="btn btn-default w-1/2" id="btn_applyAll">
									<span class="hidden fa fa-times" aria-hidden="true"></span> Apply
								</a> -->
								<a href="javascript:void(0);" class="btn btn-default inverse w-1/2" id="btn_resetAll" @click="resetAll()">
									<span class="hidden fa fa-times" aria-hidden="true"></span> Reset
								</a>
							</div>
						</div>
					</div>
					<div class="moduletable module so-extraslider-ltr best-seller best-seller-custom hidden">
						<h3 class="modtitle"><span>Best Sellers</span></h3>
						<div class="modcontent">
							<div id="so_extra_slider"
								class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
								<div class="extraslider-inner owl2-carousel owl2-theme owl2-loaded extra-animate"
									data-effect="none">
									<div class="item ">
										<div class="item-wrap style1 ">
											<div class="item-wrap-inner">
												<div class="media-left">
													<div class="item-image">
														<div class="item-img-info product-image-container ">
															<div class="box-label">
															</div>
															<a class="lt-image" data-product="104" href="#"
																target="_self"
																title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2)">
																<img src="theme/image/catalog/demo/product/electronic/25.jpg"
																	alt="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2)">
															</a>
														</div>
													</div>
												</div>
												<div class="media-body">
													<div class="item-info">
														<!-- Begin title -->
														<div class="item-title">
															<a :href="route('products')" target="_self"
																title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2) ">
																Toshiba Pro 21"(21:9) FHD IPS LED 1920X1080 HDMI(2)
															</a>
														</div>
														<!-- Begin ratting -->
														<div class="rating">
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
														</div>
														<!-- Begin item-content -->
														<div class="price">
															<span class="old-price product-price">$62.00</span>
															<span class="price-old">$337.99</span>
														</div>
													</div>
												</div>
												<!-- End item-info -->
											</div>
											<!-- End item-wrap-inner -->
										</div>
										<!-- End item-wrap -->
										<div class="item-wrap style1 ">
											<div class="item-wrap-inner">
												<div class="media-left">
													<div class="item-image">
														<div class="item-img-info product-image-container ">
															<div class="box-label">
															</div>
															<a class="lt-image" data-product="66" href="#"
																target="_self"
																title="Compact Portable Charger (Power Bank) with Premium">
																<img src="theme/image/catalog/demo/product/electronic/19.jpg"
																	alt="Compact Portable Charger (Power Bank) with Premium">
															</a>
														</div>
													</div>
												</div>
												<div class="media-body">
													<div class="item-info">
														<!-- Begin title -->
														<div class="item-title">
															<a :href="route('products')" target="_self"
																title="Compact Portable Charger (Power Bank) with Premium ">
																Compact Portable Charger (Power Bank) with Premium
															</a>
														</div>
														<!-- Begin ratting -->
														<div class="rating">
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
														</div>
														<!-- Begin item-content -->
														<div class="price">
															<span class="old-price product-price">$74.00</span>
															<span class="price-old">$241.99</span>
														</div>
													</div>
												</div>
												<!-- End item-info -->
											</div>
											<!-- End item-wrap-inner -->
										</div>
										<!-- End item-wrap -->
										<div class="item-wrap style1 ">
											<div class="item-wrap-inner">
												<div class="media-left">
													<div class="item-image">
														<div class="item-img-info product-image-container ">
															<div class="box-label">
															</div>
															<a class="lt-image" data-product="50" href="#"
																target="_self"
																title="Philipin Tour Group Manila/ Pattaya / Mactan ">
																<img src="theme/image/catalog/demo/product/travel/8.jpg"
																	alt="Philipin Tour Group Manila/ Pattaya / Mactan ">
															</a>
														</div>
													</div>
												</div>
												<div class="media-body">
													<div class="item-info">
														<!-- Begin title -->
														<div class="item-title">
															<a :href="route('products')" target="_self"
																title="Philipin Tour Group Manila/ Pattaya / Mactan  ">
																Philipin Tour Group Manila/ Pattaya / Mactan
															</a>
														</div>
														<!-- Begin ratting -->
														<div class="rating">
															<span class="fa fa-stack"><i
																	class="fa fa-star fa-stack-2x"></i><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star fa-stack-2x"></i><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star fa-stack-2x"></i><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
														</div>
														<!-- Begin item-content -->
														<div class="price">
															<span class="old-price product-price">$74.00</span>
															<span class="price-old">$122.00</span>
														</div>
													</div>
												</div>
												<!-- End item-info -->
											</div>
											<!-- End item-wrap-inner -->
										</div>
										<!-- End item-wrap -->
										<div class="item-wrap style1 ">
											<div class="item-wrap-inner">
												<div class="media-left">
													<div class="item-image">
														<div class="item-img-info product-image-container ">
															<div class="box-label">
															</div>
															<a class="lt-image" data-product="78" href="#"
																target="_self"
																title="Portable  Compact Charger (External Battery) t45">
																<img src="theme/image/catalog/demo/product/electronic/4.jpg"
																	alt="Portable  Compact Charger (External Battery) t45">
															</a>
														</div>
													</div>
												</div>
												<div class="media-body">
													<div class="item-info">
														<!-- Begin title -->
														<div class="item-title">
															<a :href="route('products')" target="_self"
																title="Portable  Compact Charger (External Battery) t45 ">
																Portable Compact Charger (External Battery) t45
															</a>
														</div>
														<!-- Begin ratting -->
														<div class="rating">
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
															<span class="fa fa-stack"><i
																	class="fa fa-star-o fa-stack-2x"></i></span>
														</div>
														<!-- Begin item-content -->
														<div class="price">
															<span class="old-price product-price">$74.00</span>
															<span class="price-old">$122.00</span>
														</div>
													</div>
												</div>
												<!-- End item-info -->
											</div>
											<!-- End item-wrap-inner -->
										</div>
										<!-- End item-wrap -->
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="module banner-left hidden-xs ">
						<div class="static-image-home-left banners">
							<div><a title="Static Image" href="#"><img
										src="theme/image/catalog/demo/banners/image-left.jpg" alt="Static Image"></a>
							</div>
						</div>
					</div>
				</aside>
				<div id="content" class="col-md-9 col-sm-12 col-xs-12">
					<a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i
							class="fa fa-bars"></i>Sidebar</a>
					<div class="products-category">
						<div class="form-group clearfix">
							<h3 class="title-category ">Products</h3>
						</div>
						<div class="products-category">
							<div class="product-filter filters-panel">
								<div class="row">
									<div class="short-by-show form-inline text-right col-md-12 col-sm-12">
										<div class="form-group short-by">
											<label class="control-label" for="input-sort">Sort By:</label>
											<select v-model="sort" @change="fetchProducts" class="form-control" id="input-sort">
												<option value="default" selected>Default</option>
												<option value="name_asc">Name (A - Z)</option>
												<option value="name_desc">Name (Z - A)</option>
												<option value="price_low_high">Price (Low > High)</option>
												<option value="price_high_low">Price (High > Low)</option>
												<!-- <option value="rating_high_low">Rating (Highest)</option>
												<option value="rating_low_high">Rating (Lowest)</option> -->
											</select>
										</div>
										<div class="form-group">
											<label class="control-label" for="input-limit">Show:</label>
											<select v-model="take" @change="fetchProducts" class="form-control" id="input-limit" >
												<option value="12" selected>12</option>
												<option value="25">25</option>
												<option value="50">50</option>
												<option value="75">75</option>
												<option value="100">100</option>
											</select>
										</div>
										<!-- <div class="form-group product-compare">
											<a id="compare-total" class="btn btn-default">Product Compare (0)</a>
										</div> -->
									</div>

								</div>
							</div>
							<div class="products-list grid">
								<div class="row">
									<template v-for="product in products" :key="product.id">
										<div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6 ">
											<div class="product-item-container">
												<span class="absolute px-2 py-1 z-10 bg-white text-[#ff5e00] border border-[#ff5e00] text-sm top-3 left-5 rounded-md font-semibold cursor-pointer">{{ product.Category }}</span>
												<div class="left-block">
													<div class="product-image-container second_img w-full h-[250px] items-center justify-center border shadow overflow-hidden rounded-md" style="display: flex !important">
														<a :href="route('single_product', product.id)"
															:title="product.Product_Name">
															<img :src="product.Image1"
																:alt="product.Product_Name"
																:title="product.Product_Name"
																class="img-1 img-responsive">
															<img v-if="product.Image2"
																:src="product.Image2"
																:alt="product.Product_Name"
																:title="product.Product_Name"
																class="img-2 img-responsive">
														</a>
													</div>
													<div class="box-label">
														<span class="label-product label-sale"
																v-if="product.Sale_Price">
															Sale
														</span>
													</div>
												</div>

												<div class="right-block">
													<div class="caption">
														<h4>
															<a :href="route('single_product', product.id)">
																{{ product.Product_Name }} ({{ product.Product_Code }})
															</a>
														</h4>
														<div class="total-price" :class="{ 'no-sale': !product.Sale_Price }">
															<div class="price price-left">
																<span class="price-new">
																	${{ product.Sale_Price ? product.Sale_Price : product.Price }}
																</span>
																<span class="price-old" v-if="product.Sale_Price">
																	${{ product.Price }}
																</span>
															</div>
															<div class="price-sale price-right"
																v-if="product.Sale_Price">
																<span class="discount">-{{ Math.round(((product.Price -
																	product.Sale_Price) / product.Price) * 100) }}%
																	<strong>OFF</strong>
																</span>
															</div>
														</div>
														<div class="list-block">
															<button class="addToCart btn-button" type="button"
																data-toggle="tooltip" title=""
																@click="addToCart(product.id)"
																data-original-title="Add to Cart">
																<span class="hidden">Add to Cart</span>
															</button>
															<button class="wishlist btn-button" type="button"
																data-toggle="tooltip" title=""
																@click="addToWishlist(product.id)"
																data-original-title="Add to Wish List ">
																<i class="fa fa-heart-o"></i>
															</button>
															<button class="compare btn-button" type="button"
																data-toggle="tooltip" title=""
																@click="addToCompare(product.id)"
																data-original-title="Compare this Product ">
																<i class="fa fa-retweet"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
										</div>
									</template>
								</div>
							</div>
							<div class="product-filter product-filter-bottom filters-panel">
								<div class="col-sm-6 text-left">
									<ul class="pagination">
										<li :class="{ 'active': currentPage === page }" v-for="page in totalPages" @click="changePage(page)">
											<span v-if="currentPage === page">{{ page }}</span>
											<a v-else>{{ page }}</a>
										</li>
										<li @click="changePage(currentPage + 1)" v-if="currentPage < totalPages"><a>&gt;</a></li>
										<li @click="changePage(totalPages)" v-if="currentPage < totalPages"><a>&gt;|</a></li>
									</ul>
								</div>
								<div class="col-sm-6 text-right">Showing {{ skip + 1 }} to {{ Math.min(skip + take, total) }} of {{ total }} ({{ totalPages }} Pages)</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</BazaarLayout>
</template>

<style scoped>
.products-list.list-masonry .product-layout .product-item-container .right-block .caption h4,
.products-list.grid .product-layout .product-item-container .right-block .caption h4 {
    padding-bottom: 15px;
    min-height: 60px; /* Ensure this height is sufficient for 2 lines of text */
    max-height: 60px; /* Ensure this height is sufficient for 2 lines of text */
    line-height: 1.2em; /* Adjust line height for better control */
    overflow: hidden; /* Hide any text that overflows */
    text-overflow: ellipsis; /* Add ellipsis (...) for overflowed text */
    display: -webkit-box; /* Enable the use of -webkit-line-clamp */
    -webkit-line-clamp: 2; /* Limit the text to 2 lines */
    -webkit-box-orient: vertical; /* Specify vertical orientation */
}

.products-list.grid .product-layout .product-item-container .caption .total-price {
	min-height: 50px;
}
.products-list.grid .product-layout .product-item-container .caption .total-price.no-sale {
	min-height: 50px;
	display: flex;
	align-items: center;
}
.products-list.grid .product-layout .product-item-container .caption .list-block {
	display: flex;
    justify-content: space-evenly;
	padding: 0 !important;
	margin: 0 0 10px !important;
}
.products-list.grid .product-layout .product-item-container .caption .list-block .btn-button {
	transform: none !important;
    margin-bottom: 10px;
    z-index: 5;
    opacity: 1;
    height: 35px;
    width: 35px;
    font-size: 14px;
    line-height: 35px;
    padding: 0;
    text-align: center;
    background: #ff5e00;
    border: none;
    display: inline-block;
    vertical-align: middle;
    cursor: pointer;
    border-radius: 50%;
    outline: none;
    visibility: visible;
	position: relative;
}
.products-list.grid .product-layout .product-item-container .right-block .caption .list-block .btn-button.addToCart:before {
    content: "";
    position: absolute;
    top: 8px;
    width: 18px;
    height: 18px;
    color: white;
    background: #ff5e00 url(theme/image/icon/icon-cart-2.png) no-repeat center center;
    left: 9px;
}
.products-list.grid .product-layout .product-item-container .right-block .caption .list-block .btn-button.addToCart:hover:before {
	color: #ff5e00;
    background: #fff url(theme/image/icon/icon-cart-1.png) no-repeat center center;
}
.products-list.grid .product-layout .product-item-container .right-block .caption .list-block .btn-button {
    color: white;
}
.products-list.grid .product-layout .product-item-container .right-block .caption .list-block .btn-button:hover {
    border: 1px solid #ff5e00;
    color: #ff5e00;
	background-color: #fff;
}
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
#btn_applyAll {
    padding: 8px 15px;
    font-size: 14px;
    font-weight: bold;
    text-transform: uppercase;
    color: #fff;
    border-radius: 3px;
    background: #ff5e00;
    border: #ff5e00;
}
#btn_applyAll:hover {
	background: #555;
}
.price-right .discount {
	width: 50px;
}
</style>