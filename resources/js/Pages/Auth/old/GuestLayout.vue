<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <!-- <div class="bg-[url('/site/guest-bg.jpg')] bg-center bg-cover bg- min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
        >
            <div class="flex flex-col sm:justify-center items-center">
                <Link href="/">
                    <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                </Link>
            </div>
            <slot />
        </div>
    </div> -->
    <div class="min-h-screen flex bg-[url('/site/guest-bg2.jpg')] bg-center bg-cover">
        <!-- Left part with white background -->
        <div class="flex justify-center items-center w-full sm:w-1/2 mx-6">
            <!-- Your login content goes here -->
            <div class="w-full sm:max-w-md my-6 px-6 pt-8 pb-12 bg-white shadow-md overflow-hidden rounded-lg">
                <div class="flex flex-col sm:justify-center items-center mb-6">
                    <Link href="/">
                        <ApplicationLogo class="w-20 h-20 fill-current text-gray-500" />
                    </Link>
                </div>
                <slot />
            </div>
        </div>
    </div>

</template>
