<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
		<!-- Basic page needs
			============================================ -->
    <title inertia>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
    <!-- Mobile specific metas
        ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon
        ============================================ -->
    <link rel="shortcut icon" type="image/png" href="/theme/ico/favicon-16x16.png" />
    
	<!-- Google web fonts
				 ============================================ -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" type="text/css">
	<style type="text/css">
    body {
			font-family: Roboto, sans-serif;
		}
	</style>

    <style>
        a:hover {
            text-decoration: none;
        }
        body {
        font-family: Roboto, sans-serif;
        }
    </style>
    <!-- Scripts -->
    @routes
    @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    @inertiaHead
</head>

<body class="common-home res layout-1">
    @inertia
    <script src="https://unpkg.com/vue-multiselect@2.1.6"></script>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- End Color Scheme
			============================================ -->
		<!-- Include Libs & Plugins
			============================================ -->
		<!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="http://bazaar.test/theme/js/jquery-2.2.4.min.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/so_megamenu.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/owl-carousel/owl.carousel.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/slick-slider/slick.js"  ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/libs.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/unveil/jquery.unveil.js"></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/countdown/jquery.countdown.min.js"></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/datetimepicker/moment.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/datetimepicker/bootstrap-datetimepicker.min.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/jquery-ui/jquery-ui.min.js"  ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/modernizr/modernizr-2.6.2.min.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/minicolors/jquery.miniColors.min.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/jquery.nav.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/quickview/jquery.magnific-popup.min.js" ></script>
	<!-- Theme files
				 ============================================ -->
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/application.js" defer></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/homepage.js" defer></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/custom_h1.js" defer></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/addtocart.js" ></script>
	<script type="text/javascript" src="http://bazaar.test/theme/js/themejs/nouislider.js" defer></script>
</body>

</html>
