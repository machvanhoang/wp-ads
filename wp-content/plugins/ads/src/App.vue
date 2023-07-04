<script setup>
import Navbar from "./components/Navbar.vue";
</script>
<template>
  <div class="container-fluid">
    <div class="row">
      <Navbar />
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4" id="main-content">
        <RouterView />
      </main>
    </div>
  </div>
</template>
<style scoped>
#main-content {
  padding-left: 2.5rem !important;
}
</style>
