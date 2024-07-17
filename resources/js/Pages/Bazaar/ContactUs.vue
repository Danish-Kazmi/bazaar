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
                <ul class="breadcrumb-cate">
                    <li><a :href="route('home')"><i class="fa fa-home"></i></a></li>
                    <li><a :href="route('contact_us')">Contact Us</a></li>
                </ul>
            </div>
        </div>
        <div class="container mx-auto p-4">
            <div class="row flex justify-center">
                <div class="w-[50%] bg-white p-6 rounded-lg shadow-md">
                    <form @submit.prevent="submitContactForm" method="post" enctype="multipart/form-data"
                        class="space-y-4">
                        <fieldset>
                            <legend class="text-4xl font-semibold text-center mb-4">
                                Contact <span class="text-[#ff5e00]">Form</span>
                            </legend>
                            <p class="text-center mb-6">
                                Help Us Serve You Better – Send Us Your Questions!
                            </p>

                            <div class="form-group required">
                                <input type="text" name="name" v-model="contactForm.name" id="input-name"
                                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Your Name *" required />
                            </div>
                            <div class="form-group required">
                                <input type="email" name="email" v-model="contactForm.contactEmail" id="input-email"
                                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="E-Mail Address *" required />
                            </div>
                            <div class="form-group required">
                                <textarea name="enquiry" rows="5" v-model="contactForm.message" id="input-enquiry"
                                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                    placeholder="Enquiry *" required></textarea>
                            </div>
                        </fieldset>
                        <div class="text-center">
                            <button class="btn btn-info bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700"
                                type="submit">
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

<style scoped>
.breadcrumbs {
    margin-top: 0;
    padding: 8px 0 7px;
    margin-bottom: 30px;
    color: #ff5e00;
	background: none;
	text-align: left;
}
.breadcrumbs .breadcrumb-cate li a {
    color: #ff5e00;
}
.breadcrumbs .breadcrumb-cate li:not(:last-child):before {
    content: "|";
	color: #000;
}
</style>