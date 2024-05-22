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
    <link rel="shortcut icon" type="image/png" href="theme/ico/favicon-16x16.png" />
    <!-- Libs CSS
        ============================================ -->
    <link rel="stylesheet" href="theme/css/bootstrap/css/bootstrap.min.css">
    <link href="theme/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="theme/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="theme/js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="theme/css/themecss/lib.css" rel="stylesheet">
    <link href="theme/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="theme/js/minicolors/miniColors.css" rel="stylesheet">
    <link href="theme/js/slick-slider/slick.css" rel="stylesheet">
    <!-- Theme CSS
        ============================================ -->
    <link href="theme/css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="theme/css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="theme/css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="theme/css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="theme/css/footer/footer2.css" rel="stylesheet">
    <link href="theme/css/header/header5.css" rel="stylesheet">
    <link id="color_scheme" href="theme/css/home5.css" rel="stylesheet">
    <link href="theme/css/responsive.css" rel="stylesheet">
    <link href="theme/css/quickview/quickview.css" rel="stylesheet">
    <!-- Google web fonts
        ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/feather.css">
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.6/dist/vue-multiselect.min.css">
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

<body class="font-sans antialiased">
    @inertia
    <script src="https://unpkg.com/vue-multiselect@2.1.6"></script>
    
		<!-- End Color Scheme
			============================================ -->
		<!-- Include Libs & Plugins
			============================================ -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script type="text/javascript" src="theme/js/jquery-2.2.4.min.js"></script>
		<script type="text/javascript" src="theme/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="theme/js/themejs/so_megamenu.js"></script>
		<script type="text/javascript" src="theme/js/owl-carousel/owl.carousel.js"></script>
		<script type="text/javascript" src="theme/js/slick-slider/slick.js"></script>
		<script type="text/javascript" src="theme/js/themejs/libs.js"></script>
		<script type="text/javascript" src="theme/js/unveil/jquery.unveil.js"></script>
		<script type="text/javascript" src="theme/js/countdown/jquery.countdown.min.js"></script>
		<script type="text/javascript" src="theme/js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
		<script type="text/javascript" src="theme/js/datetimepicker/moment.js"></script>
		<script type="text/javascript" src="theme/js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript" src="theme/js/jquery-ui/jquery-ui.min.js"></script>
		<script type="text/javascript" src="theme/js/modernizr/modernizr-2.6.2.min.js"></script>
		<script type="text/javascript" src="theme/js/minicolors/jquery.miniColors.min.js"></script>
		<script type="text/javascript" src="theme/js/jquery.nav.js"></script>
		<script type="text/javascript" src="theme/js/quickview/jquery.magnific-popup.min.js"></script>
		<!-- Theme files
			============================================ -->
		<script type="text/javascript" src="theme/js/themejs/application.js"></script>
		<script type="text/javascript" src="theme/js/themejs/homepage.js"></script>
		<script type="text/javascript" src="theme/js/themejs/custom_h2.js"></script>
		<script type="text/javascript" src="theme/js/themejs/addtocart.js"></script>
</body>

</html>
