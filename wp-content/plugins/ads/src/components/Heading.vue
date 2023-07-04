<script setup>
import { defineProps } from "vue";
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>
<template>
  <div class="dashboard-heading">
    <h1>{{ props.title }}</h1>
  </div>
</template>