<script setup>
import { ref, onMounted } from "vue";
import { getSocial, saveSocial } from "../service/social";
import Heading from "../components/Heading.vue";
import Loading from "../components/Loading.vue";
const facebook = ref(null);
const instagram = ref(null);
const twitter = ref(null);
const youtube = ref(null);
const loading = ref(false);
const submitForm = async () => {
  await saveSocial(facebook, instagram, twitter, youtube, loading);
};
onMounted(async () => {
  await getSocial(facebook, instagram, twitter, youtube, loading);
});
</script>
<template>
  <div>
    <Loading :loading="loading" />
    <Heading title="Social" />
    <form action="" @submit.prevent="submitForm()" method="POST" role="form">
      <div class="mb-3">
        <label for="facebook" class="form-label fw-bold">Facebook</label>
        <input
          type="url"
          class="form-control"
          v-model="facebook"
          id="facebook"
          placeholder=""
        />
      </div>
      <div class="mb-3">
        <label for="instagram" class="form-label fw-bold">Instagram</label>
        <input
          type="url"
          class="form-control"
          v-model="instagram"
          id="instagram"
          placeholder=""
        />
      </div>
      <div class="mb-3">
        <label for="twitter" class="form-label fw-bold">Twitter</label>
        <input
          type="url"
          class="form-control"
          v-model="twitter"
          id="twitter"
          placeholder=""
        />
      </div>
      <div class="mb-3">
        <label for="youtube" class="form-label fw-bold">Youtube</label>
        <input
          type="url"
          class="form-control"
          v-model="youtube"
          id="youtube"
          placeholder=""
        />
      </div>
      <button class="btn btn-primary" type="submit">Save</button>
    </form>
  </div>
</template>
