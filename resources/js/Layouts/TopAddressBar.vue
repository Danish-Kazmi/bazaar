<script>
export default {
	name: 'TopAddressBar',
}
</script>

<template>

	<div class="header-top hidden-compact">
		<div class="container">
			<div class="row">
				<div class="header-top-left  col-lg-6  col-md-6 hidden-sm hidden-xs">
					<div class="list-contact">
						<div class="contact-html clearfix">
							<span class="email">Marketing@topdeal.com</span>
							<span class="add">Manhattan St, Amarillo, US</span>
						</div>
					</div>
				</div>
				<div class="header-top-right collapsed-block col-lg-6 col-sm-12 col-md-6 col-xs-12">
					<div class="tabBlock" id="TabBlock-1">
						<ul class="top-link list-inline pull-right">
							<li class="account hidden" id="my_account">
								<a href="#" title="My Account" class="btn-xs dropdown-toggle" data-toggle="dropdown">
									<span>My Account</span> <span class="fa fa-angle-down"></span></a>
								<ul class="dropdown-menu ">
									<li><a href="#">My Account</a></li>
									<li><a href="#">Order History</a></li>
									<li><a href="#">Transactions</a></li>
									<li><a href="#">Downloads</a></li>
									<li class="checkout"><a href="#" class="btn-link" title="Checkout "><span>Checkout
											</span></a></li>
								</ul>
							</li>
							<li class="login">
								<a class="link-lg" :href="route('register')">Register </a> /
								<a class="link-lg" :href="route('login')">Login </a>
							</li>
							<!-- LANGUAGE CURENTY -->
							<!-- <li class="hidden">
								<div class="pull-left">
									<form action="#" method="post" enctype="multipart/form-data" id="form-language">
										<div class="btn-group">
											<button class="btn-link dropdown-toggle" data-toggle="dropdown">
												<img src="theme/image/catalog/flags/gb.png" alt="English"
													title="English">
												<span class="hidden-xs hidden-sm hidden-md">English</span>&nbsp;<i
													class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu">
												<li>
													<button class="btn-block language-select" type="button"
														name="ar-ar"><img src="theme/image/catalog/flags/ar.png"
															alt="Arabic" title="Arabic" /> Arabic</button>
												</li>
												<li>
													<button class="btn-block language-select" type="button"
														name="en-gb"><img src="theme/image/catalog/flags/gb.png"
															alt="English" title="English" /> English</button>
												</li>
											</ul>
										</div>
										<input type="hidden" name="code" value="" />
										<input type="hidden" name="redirect" value="#" />
									</form>
								</div>
							</li> -->
							<!-- <li class="currency hidden">
								<div class="pull-left">
									<form action="#" method="post" enctype="multipart/form-data" id="form-currency">
										<div class="btn-group">
											<button class="btn-link dropdown-toggle" data-toggle="dropdown">
												$<span class="hidden-xs"> US Dollar</span>
												<i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu">
												<li>
													<button class="currency-select btn-block" type="button" name="EUR">€
														Euro</button>
												</li>
												<li>
													<button class="currency-select btn-block" type="button" name="GBP">£
														Pound Sterling</button>
												</li>
												<li>
													<button class="currency-select btn-block" type="button" name="USD">$
														US Dollar</button>
												</li>
											</ul>
										</div>
										<input type="hidden" name="code" value="" />
										<input type="hidden" name="redirect" value="#" />
									</form>
								</div>
							</li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>