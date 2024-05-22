<template>
    <select v-model="model" ref="selectRef" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
      <option disabled :value="defaultValue">{{ defaultValue }}</option>
      <option v-for="(option, index) in options" :key="index" :value="option.value">{{ option.label }}</option>
    </select>
  </template>
  
  <script>
  import { onMounted, ref, defineExpose } from 'vue';
  
  export default {
    props: {
      options: Array,
      defaultValue: String,
      modelVal: String,
    },
    setup(props) {
      const model = ref((props.modelVal !== null && props.modelVal !== undefined) ? props.modelVal : props.defaultValue);
      const options = ref(props.options);
      const selectRef = ref(null);
  
      onMounted(() => {
        if (selectRef.value && selectRef.value.hasAttribute('autofocus')) {
          selectRef.value.focus();
        }
      });
  
      defineExpose({ focus: () => selectRef.value.focus() });
  
      return { model, options, selectRef };
    }
  };
  </script>
  