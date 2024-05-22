<template>
  <nav class="flex md:flex-row flex-col md:justify-between items-center">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-6 collapseSidebar" @click="toggleSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="flex items-center text-muted relative ml-40">
      <svg width="18" class="absolute left-0" height="18" viewBox="0 0 21 21" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <ellipse cx="10.093" cy="9.97788" rx="8.34301" ry="8.14437" stroke="#ADB5BD" stroke-width="2"
          stroke-linecap="round" stroke-linejoin="round" />
        <path d="M15.8955 16.0654L19.1664 19.2501" stroke="#ADB5BD" stroke-width="2" stroke-linecap="round"
          stroke-linejoin="round" />
      </svg>
      <input v-model="searchQuery" class="border-b border-none bg-transparent text-muted pl-8" type="search"
        placeholder="Type something..." aria-label="Search">
    </form>
  </nav>
  <sidebar :can="can"></sidebar>
</template>
<script>
import sidebar from '@/Components/sidebar.vue';
export default {
  components: {
    sidebar
  },
  props:{
    can: Array,
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