<script>
export default {
	name: 'NavBar',
}
</script>

<template>
	
	<div class="header-center">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-1 col-xs-3 header-menu">
					<div class="megamenu-style-dev megamenu-dev">
						<div class="responsive">
							<nav class="navbar-default">
								<div class="container-megamenu horizontal">
									<div class="navbar-header">
										<button type="button" id="show-megamenu" data-toggle="collapse"
											class="navbar-toggle">
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>
									</div>
									<div class="megamenu-wrapper">
										<span id="remove-megamenu" class="fa fa-times"></span>
										<div class="megamenu-pattern">
											<div class="container">
												<ul class="megamenu" data-transition="slide"
													data-animationtime="500">
													<li class="full-width menu-home with-sub-menu hover">
														<p class="close-menu"></p>
														<a :href="route('home')" class="clearfix">
															<strong>
																Home
															</strong>
														</a>
														
													</li>
													<li class="full-width option2 with-sub-menu hover">
														<p class="close-menu"></p>
														<a class="clearfix">
															<strong>
																Features
															</strong>
														
														</a>
													</li>
													<li class="item-style1 content-full with-sub-menu hover">
														<p class="close-menu"></p>
														<a class="clearfix">
															<strong>
																Colections
															</strong>
														
														</a>
													</li>
													<li
														class="item-style2 content-full feafute with-sub-menu hover">
														<p class="close-menu"></p>
														<a class="clearfix">
															<strong>
																Accessories
															</strong>
															
														</a>
													</li>
													<li class="deal-h5 hidden">
														<p class="close-menu"></p>
														<a href="#" class="clearfix">
															<strong>
																<img src="theme/image/catalog/demo/menu/hot-block.png"
																	alt="">Buy This Theme!
															</strong>
														</a>
													</li>
													<li class="deal-h5 hidden">
														<p class="close-menu"></p>
														<a href="#" class="clearfix">
															<strong>
																Today Deals
															</strong>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</nav>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-11 col-xs-9 header-search">
					<div id="sosearchpro" class="sosearchpro-wrapper so-search ">
						<form method="GET" action="index.php">
							<div id="search0" class="search input-group form-group">
								<div class="select_category filter_type  icon-select">
									<select class="no-border" name="category_id">
										<option value="0">All Categories </option>
										<option value="82 ">Book Stationery </option>
										<option value="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Girls New
										</option>
										<option value="56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Kitchen
										</option>
										<option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl mens
										</option>
										<option value="38 ">Laptop &amp; Notebook </option>
										<option value="52 ">Spa &amp; Massage </option>
										<option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge mange
										</option>
										<option value="53">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Necklaces
										</option>
										<option value="54">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pearl Jewelry
										</option>
										<option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Slider 925
										</option>
										<option value="24">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phones &amp;
											PDAs </option>
										<option value="59 ">Sport &amp; Entertaiment </option>
										<option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camping &amp;
											Hiking </option>
										<option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cusen mariot
										</option>
										<option value="74">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Engite nanet
										</option>
										<option value="64">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fashion
										</option>
										<option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men </option>
										<option value="60 ">Travel &amp; Vacation </option>
										<option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Best Tours
										</option>
										<option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cruises
										</option>
										<option value="73">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Destinations
										</option>
										<option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hotel &amp;
											Resort </option>
										<option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Infocus
										</option>
										<option value="18 ">Laptops &amp; Notebooks </option>
										<option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Macs </option>
										<option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Windows
										</option>
										<option value="34 ">Food &amp; Restaurant </option>
										<option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet magente
										</option>
										<option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
										</option>
										<option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
										</option>
										<option value="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
										</option>
										<option value="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
										</option>
										<option value="51">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Web Cameras
										</option>
										<option value="39 ">Shop Collection </option>
										<option value="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hanet magente
										</option>
										<option value="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Knage unget
										</option>
										<option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Latenge mange
										</option>
										<option value="58">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Punge nenune
										</option>
										<option value="17">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Qunge genga
										</option>
										<option value="57">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tange manue
										</option>
										<option value="35 ">Fashion &amp; Accessories </option>
										<option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dress Ladies
										</option>
										<option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jean </option>
										<option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Men Fashion
										</option>
										<option value="88">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; T-shirt
										</option>
										<option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Trending
										</option>
										<option value="37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Western Wear
										</option>
										<option value="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Women Fashion
										</option>
										<option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bags </option>
										<option value="33 ">Digital &amp; Electronics </option>
										<option value="83">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell Computers
										</option>
										<option value="84">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
											Accessories </option>
										<option value="85">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Computer
											Headsets </option>
										<option value="86">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Desna Jacket
										</option>
										<option value="87">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Electronics
										</option>
										<option value="89">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Headphone
										</option>
										<option value="90">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Laptops
										</option>
										<option value="78">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobiles
										</option>
										<option value="79">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sound </option>
										<option value="80">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; USB &amp; HDD
										</option>
										<option value="81">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; VGA and CPU
										</option>
										<option value="62">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video &amp;
											Camera </option>
										<option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Video You
										</option>
										<option value="75">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Wireless
											Speakers </option>
										<option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Camera New
										</option>
										<option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Case </option>
										<option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Cell &amp; Cable
										</option>
										<option value="77">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mobile &amp;
											Table </option>
										<option value="25">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bluetooth
											Speakers </option>
									</select>
								</div>
								<input class="autosearch-input form-control" type="text" value="" size="50"
									autocomplete="off" placeholder="Search" name="search">

								<span class="input-group-btn">
									<button type="submit" class="button-search btn btn-default btn-lg"
										name="submit_search"><i class="fa fa-search"></i><span
											class="hidden">Search</span></button>
								</span>
							</div>
							<input type="hidden" name="route" value="product/search">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
		

			
	<div class="header-form hidden-compact">
		
		<div class="button-user">
			<div class="user-info asd">
				<a data-toggle="modal" data-target="#so_sociallogin" href="#">Login</a>
			</div>
		</div>
	</div>


			
	<div class="modal fade in" id="so_sociallogin" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-login">
			<a href="javascript:void(0)" title="Close" class="close close-login fa fa-times-circle"
				data-dismiss="modal"></a>
			<div class="tt_popup_login"><strong>Sign in Or Register</strong></div>
			<div class="block-content">
				<div class=" col-reg registered-account">
					<div class="block-content">
						<form class="form form-login" action="#" method="post" id="login-form">
							<fieldset class="fieldset login" data-hasrequired="* Required Fields">
								<div class="field email required email-input">
									<div class="control">
										<input name="email" value="" autocomplete="off" id="email" type="email"
											class="input-text" title="Email" placeholder="E-Mail Address">
									</div>
								</div>
								<div class="field password required pass-input">
									<div class="control">
										<input name="password" type="password" autocomplete="off" class="input-text"
											id="pass" title="Password" placeholder="Password">
									</div>
								</div>

								<div class=" form-group">
									<label class="control-label">Login with your social account</label>
									<div>

										<a href="#" class="btn btn-social-icon btn-sm btn-google-plus"><i
												class="fa fa-google fa-fw" aria-hidden="true"></i></a>

										<a href="#" class="btn btn-social-icon btn-sm btn-facebook"><i
												class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>

										<a href="#" class="btn btn-social-icon btn-sm btn-twitter"><i
												class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>

										<a href="#" class="btn btn-social-icon btn-sm btn-linkdin"><i
												class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>

									</div>
								</div>

								<div class="secondary ft-link-p"><a class="action remind" href="#"><span>Forgot Your
											Password?</span></a></div>
								<div class="actions-toolbar">
									<div class="primary">
										<button type="submit" class="action login primary" name="send"
											id="send2"><span>Login</span></button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				<div class="col-reg login-customer">

					<h2>NEW HERE?</h2>
					<p class="note-reg">Registration is free and easy!</p>
					<ul class="list-log">
						<li>Faster checkout</li>
						<li>Save multiple shipping addresses</li>
						<li>View and track orders and more</li>
					</ul>
					<a class="btn-reg-popup" title="Register" href="#">Create an account</a>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>
	
</template>