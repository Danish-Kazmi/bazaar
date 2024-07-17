<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';

export default {
	name: 'Footer',
	props: {
		collapse: Boolean
	},
    components: {
		Link,
        ApplicationLogo,
	},
}
</script>

<template>
	<!-- Footer Container -->
	<footer class="footer-container typefooter-1">
		<div class="footer-has-toggle" id="collapse-footer">
			<div class="so-page-builder">
				<div class="container-fluid page-builder-ltr">
					<div class="row row_sh6r  footer--top  row-color ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_971a  float_none container">
							<div class="row row_dmol  ">
								<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_hcbx block--newletter">
									<div class="module news-letter">
										<div class="so-custom-default newsletter"
											style="width:100%     ; background-color: #f0f0f0 ; ">
											<div class="btn-group title-block">
												<div class="popup-title page-heading">
													<i class="fa fa-paper-plane-o"></i> Sign up to Newsletter
												</div>
												<div class="newsletter_promo">And receive <span>5%</span>discount on
													every order</div>
											</div>
											<div class="modcontent block_content">
												<form method="post" id="signup" name="signup"
													class="form-group form-inline signup send-mail">
													<div class="input-group form-group required">
														<div class="input-box">
															<input type="email" placeholder="Your email address..."
																value="" class="form-control" id="txtemail"
																name="txtemail" size="55">
														</div>
														<div class="input-group-btn subcribe">
															<button class="btn btn-primary" type="submit"
																onclick="return subscribe_newsletter();" name="submit">
																<i class="fa fa-envelope hidden"></i>
																<span>Subscribe</span>
															</button>
														</div>
													</div>
												</form>
											</div>
											<!--/.modcontent-->
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_h1e7 block--social">
									<div class="footer-social">
										<h3 class="block-title">Follow us</h3>
										<div class="socials">
											<a href="https://www.facebook.com" class="facebook"
												target="_blank">
												<i class="fa fa-facebook"></i>
												<p>on</p>
												<span class="name-social">Facebook</span>
											</a>
											<a href="https://twitter.com" class="twitter" target="_blank">
												<i class="fa fa-twitter"></i>
												<p>on</p>
												<span class="name-social">Twitter</span>
											</a>
											<a href="https://www.instagram.com" class="instagram" target="_blank">
												<i class="fa fa-instagram" aria-hidden="true"></i>
												<p>on</p>
												<span class="name-social">Instagram</span>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="container-fluid page-builder-ltr">
					<div class="row row_z1do  footer--center  row-color ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_x6fe  float_none container">
							<div class="row row_wprs  ">
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_yb5e footer--link">
									<h3 class="title-footer">
										spa & massage
									</h3>
									<ul class="links">
										<li>
											<a href="#">Makeup</a>
										</li>
										<li>
											<a href="#"> Skin Care</a>
										</li>
										<li>
											<a href="#"> Hair Care</a>
										</li>
										<li>
											<a href="#"> Tools & Accessories</a>
										</li>
										<li>
											<a href="#"> Perfume & Cologne</a>
										</li>
										<li>
											<a href="#"> More to Explore</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_1tke footer--link">
									<h3 class="title-footer">
										fashion & accessories
									</h3>
									<ul class="links">
										<li>
											<a href="#">Clothing</a>
										</li>
										<li>
											<a href="#"> Shoes</a>
										</li>
										<li>
											<a href="#"> Jewelry</a>
										</li>
										<li>
											<a href="#"> Watches</a>
										</li>
										<li>
											<a href="#"> Handbags & Walletss</a>
										</li>
										<li>
											<a href="#"> Accessories</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_ldmi footer--link">
									<h3 class="title-footer">
										travel & vacation
									</h3>
									<ul class="links">
										<li>
											<a href="#">Top 10 Hotels</a>
										</li>
										<li>
											<a href="#"> Travel Tour</a>
										</li>
										<li>
											<a href="#"> Bundle Deal</a>
										</li>
										<li>
											<a href="#"> Top Fights</a>
										</li>
										<li>
											<a href="#"> Vacation Retals</a>
										</li>
										<li>
											<a href="#"> Cruise</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_uoai footer--link">
									<h3 class="title-footer">
										electronics
									</h3>
									<ul class="links">
										<li>
											<a href="#">Home Audio & Theater</a>
										</li>
										<li>
											<a href="#"> Camera</a>
										</li>
										<li>
											<a href="#"> Photo & Video</a>
										</li>
										<li>
											<a href="#"> Cell Phones</a>
										</li>
										<li>
											<a href="#"> Headphones</a>
										</li>
										<li>
											<a href="#"> Video Games</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_77lh footer--link">
									<h3 class="title-footer">
										sport & Entertaiment
									</h3>
									<ul class="links">
										<li>
											<a href="#">Yoga & Fitness</a>
										</li>
										<li>
											<a href="#"> Games</a>
										</li>
										<li>
											<a href="#"> Cinema</a>
										</li>
										<li>
											<a href="#"> Studio</a>
										</li>
										<li>
											<a href="#"> Music</a>
										</li>
										<li>
											<a href="#"> Shopping</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid page-builder-ltr">
					<div class="row row_mvtd  footer--center2  row-color ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_6fdl  float_none container">
							<div class="row row_hwmc  ">
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_6ps1 footer--link">
									<h3 class="title-footer">
										food & restaurant
									</h3>
									<ul class="links">
										<li>
											<a href="#">Fast Food</a>
										</li>
										<li>
											<a href="#"> Buffet</a>
										</li>
										<li>
											<a href="#"> Café</a>
										</li>
										<li>
											<a href="#"> Drink</a>
										</li>
										<li>
											<a href="#"> Cake</a>
										</li>
										<li>
											<a href="#"> Restaurant</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_qprt footer--link">
									<h3 class="title-footer">
										health & beauty
									</h3>
									<ul class="links">
										<li>
											<a href="#">Makeup</a>
										</li>
										<li>
											<a href="#"> Skin Care</a>
										</li>
										<li>
											<a href="#"> Hair Care</a>
										</li>
										<li>
											<a href="#"> Tools & Accessories</a>
										</li>
										<li>
											<a href="#"> Perfume & Cologne</a>
										</li>
										<li>
											<a href="#"> More to Explore</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_jzhl footer--link">
									<h3 class="title-footer">
										Book Stationery
									</h3>
									<ul class="links">
										<li>
											<a href="#">Award Winners</a>
										</li>
										<li>
											<a href="#"> Bargain Books</a>
										</li>
										<li>
											<a href="#"> Best Books of 2016</a>
										</li>
										<li>
											<a href="#"> Best Books of the Month</a>
										</li>
										<li>
											<a href="#"> Books in Spanish</a>
										</li>
										<li>
											<a href="#"> Children Books</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_kefr footer--link">
									<h3 class="title-footer">
										Real house
									</h3>
									<ul class="links">
										<li>
											<a href="#">Makeup</a>
										</li>
										<li>
											<a href="#"> Skin Care</a>
										</li>
										<li>
											<a href="#"> Hair Care</a>
										</li>
										<li>
											<a href="#"> Tools & Accessories</a>
										</li>
										<li>
											<a href="#"> Perfume & Cologne</a>
										</li>
										<li>
											<a href="#"> More to Explore</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-15 col-md-15 col-sm-4 col-xs-6 col_mtmx footer--link">
									<h3 class="title-footer">
										Mom & baby care
									</h3>
									<ul class="links">
										<li>
											<a href="#">Award Winners</a>
										</li>
										<li>
											<a href="#"> Bargain Books</a>
										</li>
										<li>
											<a href="#"> Best Books of 2016</a>
										</li>
										<li>
											<a href="#"> Best Books of the Month</a>
										</li>
										<li>
											<a href="#"> Books in Spanish</a>
										</li>
										<li>
											<a href="#"> Children Books</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div> -->
				<div class="container-fluid page-builder-ltr" style="border-top: 3px solid #ff5e00;">
					<div class="row row_qof8  footer--center3  row-color ">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_up4v  float_none ">
							<div class="row row_fymn  ">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_1yf0">
									<div class="contactinfo" style="padding-top: 15px">
										<Link href="/">
											<ApplicationLogo />
										</Link>
										<p style="margin-top: 15px">They key is to have every key, the key to open every door. We will never see
											them</p>
										<div class="content-footer">
											<div class="address">
												<label><i class="fa fa-map-marker" aria-hidden="true"></i></label>
												<span>Virtual University, Lahore, Punjab, PO 54840, Pakistan</span>
											</div>
											<div class="phone">
												<label><i class="fa fa-phone" aria-hidden="true"></i></label>
												<span>( +123 )4 567 890</span>
											</div>
											<div class="email">
												<label><i class="fa fa-envelope"></i></label>
												<a href="#">support@bazaar.com</a>
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
		<div class="footer-toggle hidden-lg hidden-md">
			<a class="showmore collapsed" data-toggle="collapse" href="#collapse-footer" aria-expanded="false"
				aria-controls="collapse-footer">
				<span class="toggle-more"><i class="fa fa-angle-double-down"></i>Show More</span>
				<span class="toggle-less"><i class="fa fa-angle-double-up"></i>Show less</span>
			</a>
		</div>
		<div class="footer-bottom ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 copyright text-center">
						<span>Bazaar © 2016 - 2018. All Rights Reserved. Designed by
							<a href="https://vulms.vu.edu.pk" target="_blank">Virtual University</a>
						</span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- //end Footer Container -->
</template>