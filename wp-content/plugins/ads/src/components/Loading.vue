<script setup>
import { defineProps } from "vue";
const props = defineProps({
  loading: {
    type: Boolean,
    required: true,
  },
});
</script>
<template>
  <div :class="{ 'loader-wrapper': true, active: loading }">
    <div class="loader">
      <div class="preloader">
        <div class="spinner-layer">
          <div class="circle-clipper float-left">
            <div class="circle"></div>
          </div>
          <div class="circle-clipper float-right">
            <div class="circle"></div>
          </div>
        </div>
      </div>
      <p>Please wait...</p>
    </div>
  </div>
</template>