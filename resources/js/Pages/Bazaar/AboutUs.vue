<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
	name: 'AboutUs',
	components: {
		Head,
		BazaarLayout,
	},
}
</script>

<template>

	<Head title="About Us" />

	<BazaarLayout>

		<!-- Main Container  -->
		<div class="breadcrumbs">
			<div class="container">
				<ul class="breadcrumb-cate">
					<li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
					<li><a :href="route('about_us')">About Us</a></li>
				</ul>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div id="content" class="col-sm-1"></div>
				<div id="content" class="col-sm-10">
					<div class="about_us">
						<div class="about_wrapper">
							<h3 class="title-page font-ct" style="font-size: 2.25rem;">About <span
									class="text-[#ff5e00]">Us</span></h3>
							<div class="content-page" style="text-align: justify; text-justify: inter-word;">
								<br>
								Welcome to <span class="text-[#ff5e00]">Bazaar</span>, where our passion for e-commerce
								meets unparalleled customer service. Founded in 2024, our journey began with a simple
								goal: to provide an
								exceptional online shopping experience with a focus on quality, innovation, and customer
								satisfaction. As
								we continue to grow, our commitment to these values remains steadfast, driving us to
								offer the best e-commerce available.
								<br>
								<br>
								<br>
								Our team of experts is dedicated to curating a diverse selection of products that cater
								to your needs
								and preferences. We take pride in our meticulous selection process, ensuring that each
								item in our
								collection meets our high standards for quality and performance. From the latest trends
								to timeless
								classics, we strive to bring you only the finest e-commerce that make a difference in
								your
								life.
								<br>
								<br>
								<br>
								At <span class="text-[#ff5e00]">Bazaar</span>, we believe that great service is the
								cornerstone of a
								great shopping experience.
								Our customer support team is always ready to assist you, providing timely and
								personalized assistance to
								ensure your complete satisfaction. We listen to your feedback and continuously strive to
								improve our
								offerings and services, making sure that every interaction with us is positive and
								memorable.
								<br>
								<br>
								<br>
								Thank you for choosing <span class="text-[#ff5e00]">Bazaar</span>. We invite you to
								explore our
								extensive range of
								e-commerce and experience the difference of shopping with a company that values your
								trust.
								Whether you’re looking for something specific or just browsing, we’re here to make your
								shopping
								experience enjoyable and fulfilling. Join us today and discover why <span
									class="text-[#ff5e00]">Bazaar</span> is the preferred
								choice for e-commerce enthusiasts.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<br>
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