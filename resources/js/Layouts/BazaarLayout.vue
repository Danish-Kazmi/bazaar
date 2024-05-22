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
};
</script>

<template>
	<div class="common-home ltr layout-5">
		<div id="wrapper" class="wrapper-fluid banners-effect-10">
			<!-- Header Container  -->
			<header id="header" class=" typeheader-5">
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
		<div class="back-to-top"><i class="fa fa-angle-up"></i></div>
    </div>
</template>
