<script>
import { Head } from '@inertiajs/vue3';
import BazaarLayout from '@/Layouts/BazaarLayout.vue';

export default {
    name: 'HomePage',
    components: {
		Head,
        BazaarLayout,
	}
}
</script>

<template>
    <Head title="Welcome to the Bazaar" />

    <BazaarLayout>
	</BazaarLayout>
</template>