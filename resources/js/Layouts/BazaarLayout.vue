<script>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
import TopAddressBar from '@/Layouts/TopAddressBar.vue';
import NavBar from '@/Layouts/NavBar.vue';
import Footer from '@/Layouts/Footer.vue';

export default {
  components: {
    ApplicationLogo,
    Link,
    TopAddressBar,
    NavBar,
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
	<div id="wrapper" class="wrapper-fluid banners-effect-10">
			<!-- Header Container  -->
			<header id="header" class="typeheader-1">
				<!-- Header Top -->
                <TopAddressBar />
				<!-- //Header Top -->
                <NavBar />

			</header>
			<!-- //Header Container  -->
			<slot />
			<!-- Footer Container -->
            <Footer :collapse="false" />
			<!-- //end Footer Container -->
		</div>
	<div class="back-to-top" @click="scrollToTop"><i class="fa fa-angle-up"></i></div>
</template>
