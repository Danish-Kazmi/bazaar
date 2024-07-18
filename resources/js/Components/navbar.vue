<template>
  <nav class="flex md:flex-row flex-col md:justify-between items-center md:ml-52">
    <button type="button" class="block md:hidden navbar-toggler text-muted mt-2 p-0 mr-6 collapseSidebar" @click="toggleSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <Link v-if="!can.list.product && !can.list.brand" :href="route('home')" class="inline-flex items-center px-3 py-2 gap-x-3 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
        Visit Store
    </Link>
  </nav>
  <sidebar :can="can"></sidebar>
</template>
<script>
import sidebar from '@/Components/sidebar.vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    sidebar,
    Link
  },
  props: {
    can: Object,
  },
  data() {
    return {
      searchQuery: '',
    };
  },
  methods: {
    toggleMode() {
      // Add your mode switch logic here
    },
    toggleSidebar() {
      // Add your sidebar toggle logic here
    },
  }
}
</script>