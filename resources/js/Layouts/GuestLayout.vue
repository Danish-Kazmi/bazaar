<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex bg-[url('/theme/image/auth-bg.jpg')] bg-center bg-cover">
        <!-- Left part with white background -->
        <div class="flex justify-center items-center w-full sm:w-1/2 mx-6">
            <!-- Your login content goes here -->
            <div class="w-full sm:max-w-lg my-6 px-6 pt-8 pb-12 bg-white shadow-md overflow-hidden rounded-lg">
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
