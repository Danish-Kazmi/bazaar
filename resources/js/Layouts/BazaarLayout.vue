<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import TopAddressBar from '@/Layouts/TopAddressBar.vue';
import NavBar from '@/Layouts/NavBar.vue';
import CategoryBar from '@/Layouts/CategoryBar.vue';
import Footer from '@/Layouts/Footer.vue';

export default {
  components: {
    ApplicationLogo,
    Link,
    TopAddressBar,
    NavBar,
    CategoryBar,
    Footer
  },
  methods: {
    scrollToTop() {
      // Scroll to the top of the page
      window.scrollTo({
        top: 0,
        behavior: "smooth" // Smooth scrolling behavior
      });
    }
  }
};
</script>

<template>
  <link rel="stylesheet" href="theme/css/bootstrap/css/bootstrap.min.css">
  <link href="theme/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="theme/js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <link href="theme/js/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="theme/css/themecss/lib.css" rel="stylesheet">
  <link href="theme/js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
  <link href="theme/js/minicolors/miniColors.css" rel="stylesheet">
  <!-- Theme CSS
       ============================================ -->
  <link href="theme/css/themecss/so_sociallogin.css" rel="stylesheet">
  <link href="theme/css/themecss/so_searchpro.css" rel="stylesheet">
  <link href="theme/css/themecss/so_megamenu.css" rel="stylesheet">
  <link href="theme/css/themecss/so-categories.css" rel="stylesheet">
  <link href="theme/css/themecss/so-listing-tabs.css" rel="stylesheet">
  <link href="theme/css/themecss/so-category-slider.css" rel="stylesheet">
  <link href="theme/css/themecss/so-newletter-popup.css" rel="stylesheet">
  <link href="theme/css/footer/footer1.css" rel="stylesheet">
  <link href="theme/css/header/header1.css" rel="stylesheet">

  <link id="color_scheme" href="theme/css/theme.css" rel="stylesheet">
  <link href="theme/css/responsive.css" rel="stylesheet">
  <link href="theme/css/quickview/quickview.css" rel="stylesheet">

  <div id="wrapper" class="wrapper-fluid banners-effect-10">
    <!-- Header Container  -->
    <header id="header" class="typeheader-1">
      <!-- Header Top -->
      <TopAddressBar />
      <!-- //Header Top -->
      <NavBar />
      <!-- //Header center -->
      <CategoryBar />
    </header>
    <!-- //Header Container  -->
    <slot />
    <!-- Footer Container -->
    <Footer :collapse="false" />
    <!-- //end Footer Container -->
  </div>
  <div class="back-to-top" @click="scrollToTop"><i class="fa fa-angle-up"></i></div>
</template>
