<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
    name: 'about_us',
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
      <div class="title-breadcrumb">   
       About Us
      </div>
      <ul class="breadcrumb-cate">
        <li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
        <li><a :href="route('about_us')">About Us</a></li>
      </ul>
    </div>
  </div>
  <div class="container">
     <div class="row">
      <div id="content" class="col-sm-12">
       <div class="about_us">
        <div class="about_wrapper">
           <h3 class="title-page font-ct">about us</h3>
           <div class="content-page">
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis partrient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.<br><br> 
            Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.
           </div>
        </div>
       </div>
      </div>
     </div>
  </div>
  
	</BazaarLayout>
</template>