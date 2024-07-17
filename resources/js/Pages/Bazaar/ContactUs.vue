<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
    name: 'ContactUs',
    components: {
		Head,
        BazaarLayout,
	},
    data() {
        return {
            contactForm: this.$inertia.form({
                name: '',
                contactEmail: '',
                message: '',
                error: {
                    name: '',
                    contactEmail: '',
                    message: '',
                }
            })
        }
    },
    methods: {
        submitContactForm() {
            this.contactForm.post('/contact-us', {
                        onSuccess: () => {
                        }
                    });
        },
    }
}
</script>

<template>
    <Head title="Contact Us" />

    <BazaarLayout>
        
        
	<!-- Main Container  -->
	<div class="breadcrumbs">
	    <div class="container">
	        <div class="title-breadcrumb">

	            Contact Us

	        </div>
	        <ul class="breadcrumb-cate">
	            <li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
	            <li><a :href="route('contact_us')">Contact Us</a></li>
	        </ul>
	    </div>
	</div>
	<div class="container mx-auto p-4">
    <div class="row flex justify-center">
        <div class="w-[50%] bg-white p-6 rounded-lg shadow-md">
            <form @submit.prevent="submitContactForm" method="post" enctype="multipart/form-data" class="space-y-4">
                <fieldset>
                    <legend class="text-2xl font-semibold text-center mb-4">
                        Contact Form
                    </legend>
                    <p class="text-center mb-6">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                    </p>

                    <div class="form-group required">
                        <input type="text" name="name" v-model="contactForm.name" id="input-name" class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Your Name *" required />
                    </div>
                    <div class="form-group required">
                        <input type="email" name="email" v-model="contactForm.contactEmail" id="input-email" class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="E-Mail Address *" required />
                    </div>
                    <div class="form-group required">
                        <textarea name="enquiry" rows="5" v-model="contactForm.message" id="input-enquiry" class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enquiry *" required></textarea>
                    </div>
                </fieldset>
                <div class="text-center">
                    <button class="btn btn-info bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700" type="submit">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>		
	<!-- //Main Container -->
		
	</BazaarLayout>
</template>