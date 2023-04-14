<template >
  <v-row justify="center">
    <v-col cols="8" sm="2" order="2">
      <v-img
        :src="image_url"
        cover
        class="pa-5 border"
        :aspect-ratio="1"
      ></v-img>
    </v-col>
    <v-col cols="12" sm="8" md="8" order="3">
      
      <v-select
                v-model="docTitle"
                label="عنوان مدرک"
                density="compact"
                :items="[
                  'عکس پرسنلی',
                  'تصویر کارت ملی',
                  'تصویر صفحه یک شناسنامه',
                  'تصویر صفحه دو شناسنامه',
                  'تصویر عدم سوء پیشینه',
                ]"
              />
              
      <v-file-input @update:modelValue="imageSelected" label="اینجا کلیک کنید">
      </v-file-input>
    </v-col>
  </v-row>
  <v-row>
    <v-col align="left">
      <v-btn
        @click="upload"
        :loading="loading"
        color="primary"
        variant="tonal"
        :disabled="!file"
        >بارگزاری</v-btn
      >
    </v-col>
  </v-row>
</template>


<script>
import { useAuthStore } from "@/store/auth";

export default {
  name: "uploader",
  components: {},
  props: ["advisor_id"],
  data() {
    return {
      loading: false,
      docTitle: null,
      file: null,
      image_url: null,
      image_selected: false,
    };
  },
  computed: {
    auth() {
      return useAuthStore();
    },
    user() {
      return this.auth.user;
    },
  },
  methods: {
    cancel() {
      this.$emit("cancel");
    },
    imageSelected(files) {
      this.image_url = URL.createObjectURL(files[0]);
      this.file = files[0];
    },
    async upload() {
      this.loading = true;
      alert("حجم فایل" + this.file.size)
      let formData = new FormData();
      formData.append("file", this.file);
      formData.append("doc_title", this.docTitle);
      try{
        await axios.post(`/api/users/${this.user.id}/documents/upload`, formData, {
        headers: {
          "Content-Type": "multipart/form-data",
        },
      });
      }
      catch(err){}
      this.loading = false;
    },
  },
  mounted() {
  },
};
</script>