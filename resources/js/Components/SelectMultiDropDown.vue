<template>
  <div>
    <Multiselect mode="tags" v-model="selectedOptions" :close-on-select="false" :create-option="true"
      :options="options" />
  </div>
</template>
<script>
import Multiselect from '@vueform/multiselect'
export default {
  components: {
    Multiselect,
  },
  props: {
    value: Array,
    multipleOptions: Array,
  },
  data() {
    return {
      selectedOptions: this.value || [],
      options: this.multipleOptions
    }
  },
  watch: {
    selectedOptions: {
        handler(newOptions) {
          // Emit the selected options when they change
          this.$emit('selectDropdownVal', newOptions);
        },
        immediate: true,
    },
  }
}
</script>
<style src="@vueform/multiselect/themes/default.css"></style>