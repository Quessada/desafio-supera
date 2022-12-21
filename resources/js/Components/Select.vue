<template>
    <select
      class="form-control"
      @change="$emit('update:modelValue', $event.target.value)"
      ref="select"
    >
      <option
        v-for="(data, key) in options"
        :key="key"
        :value="key"
        :selected="data === modelValue"
      >
        {{ data }}
      </option>
    </select>
  </template>
  
  <script>
  export default {
    props: ["modelValue", "options"],
  
    emits: ["update:modelValue"],
  
    methods: {
      focus() {
        this.$refs.select.focus();
      },
    },
  };
  </script>