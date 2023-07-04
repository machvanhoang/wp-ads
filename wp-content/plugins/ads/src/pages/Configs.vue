<script setup>
import { ref, reactive, onMounted } from "vue";
import { getConfigs, saveConfigs } from "../service/configs";
import Heading from "../components/Heading.vue";
import Loading from "../components/Loading.vue";
const loading = ref(false);
const configs = reactive({
  address: null,
  email: null,
  hotline: null,
  phone: null,
  zalo: null,
  website: null,
  fanpage: null,
  slogan: null,
  iframe: null,
  google_analytics: null,
  google_mastertool: null,
  head_js: null,
  body_js: null,
});
const submitForm = async () => {
  await saveConfigs(configs, loading);
};
onMounted(async () => {
  await getConfigs(configs, loading);
});
</script>
<template>
  <div>
    <Loading :loading="loading" />
    <Heading title="Configs" />
    <div class="config-conten">
      <form action="" method="POST" @submit.prevent="submitForm" role="form">
        <div class="row">
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="address" class="form-label fw-bold">Địa chỉ:</label>
            <input
              type="text"
              class="form-control text-sm"
              id="address"
              placeholder="Address"
              v-model="configs.address"
              required
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="email" class="form-label fw-bold">Email:</label>
            <input
              type="email"
              class="form-control text-sm"
              id="email"
              placeholder="Email"
              v-model="configs.email"
              required
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="hotline" class="form-label fw-bold">Hotline:</label>
            <input
              type="text"
              class="form-control text-sm"
              id="hotline"
              placeholder="Hotline"
              v-model="configs.hotline"
              required
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="phone" class="form-label fw-bold">Điện thoại:</label>
            <input
              type="text"
              class="form-control text-sm"
              id="phone"
              placeholder="Điện thoại"
              v-model="configs.phone"
              required
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="zalo" class="form-label fw-bold">Zalo:</label>
            <input
              type="text"
              class="form-control text-sm"
              id="zalo"
              placeholder="Zalo"
              v-model="configs.zalo"
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="website" class="form-label fw-bold">Website:</label>
            <input
              type="url"
              class="form-control text-sm"
              id="website"
              placeholder="https://"
              v-model="configs.website"
              required
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="fanpage" class="form-label fw-bold">Fanpage:</label>
            <input
              type="url"
              class="form-control text-sm"
              id="fanpage"
              placeholder="https://"
              v-model="configs.fanpage"
            />
          </div>
          <div class="form-group col-md-4 col-sm-6 mb-3">
            <label for="slogan" class="form-label fw-bold">Slogan:</label>
            <input
              type="text"
              class="form-control text-sm"
              id="slogan"
              placeholder="Slogan"
              v-model="configs.slogan"
            />
          </div>
        </div>
        <div class="form-group mb-3">
          <label for="coords_iframe" class="form-label fw-bold">
            <span>Tọa độ google map iframe:</span>
            <a
              class="text-sm font-weight-normal ml-1"
              href="https://www.google.com/maps"
              target="_blank"
              title="Lấy mã nhúng google map"
              >(Lấy mã nhúng)</a
            >
          </label>
          <textarea
            class="form-control text-sm"
            name="data[options][coords_iframe]"
            id="coords_iframe"
            rows="8"
            placeholder="Tọa độ google map iframe"
            v-model="configs.iframe"
          ></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="analytics" class="form-label fw-bold"
            >Google analytics:</label
          >
          <textarea
            class="form-control text-sm"
            id="analytics"
            rows="8"
            placeholder="Google analytics"
            v-model="configs.google_analytics"
          ></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="mastertool" class="form-label fw-bold"
            >Google Webmaster Tool:</label
          >
          <textarea
            class="form-control text-sm"
            id="mastertool"
            rows="8"
            placeholder="Google Webmaster Tool"
            v-model="configs.google_mastertool"
          ></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="headjs" class="form-label fw-bold">Head JS:</label>
          <textarea
            class="form-control text-sm"
            id="headjs"
            rows="8"
            placeholder="Head JS"
            v-model="configs.head_js"
          ></textarea>
        </div>
        <div class="form-group mb-3">
          <label for="bodyjs" class="form-label fw-bold">Body JS:</label>
          <textarea
            class="form-control text-sm"
            id="bodyjs"
            rows="8"
            placeholder="Body JS"
            v-model="configs.body_js"
          ></textarea>
        </div>
        <div class="form-group">
          <button class="btn btn-primary" type="submit">Save configs</button>
        </div>
      </form>
    </div>
  </div>
</template>
